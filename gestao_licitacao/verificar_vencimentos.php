<?php
// Este script deve ser rodado via CRON JOB diariamente
// Exemplo cron: 0 8 * * * /usr/bin/php /caminho/do/projeto/verificar_vencimentos.php

require_once 'config.php';
// Tenta carregar o PHPMailer do seu projeto
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

global $pdo;

// 1. Buscar licenças que vencem em exatos 5 dias E que ainda não foram notificadas
$diasAlerta = 5;
$sql = "SELECT * FROM licencas_certidoes 
        WHERE DATEDIFF(data_vencimento, CURDATE()) = :dias 
        AND notificado = 0";

$stmt = $pdo->prepare($sql);
$stmt->execute(['dias' => $diasAlerta]);
$documentos = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($documentos) > 0) {
    foreach ($documentos as $doc) {
        
        $titulo = $doc['titulo'];
        $dataVenc = date('d/m/Y', strtotime($doc['data_vencimento']));
        
        // A. Criar Notificação no Sistema
        $msgSistema = "ALERTA: O documento '$titulo' irá vencer em 5 dias ($dataVenc). Providencie a renovação.";
        $stmtNotif = $pdo->prepare("INSERT INTO notificacoes (mensagem) VALUES (?)");
        $stmtNotif->execute([$msgSistema]);
        
        // B. Enviar E-mail
        // Configurações de e-mail devem estar no config.php ou hardcoded aqui
        // Estou usando um exemplo genérico baseada na existência do PHPMailer no seu file list
        $mail = new PHPMailer(true);

        try {
            // Configurações do Servidor (AJUSTE COM SEUS DADOS SMTP)
            $mail->isSMTP();
            $mail->Host       = 'smtp.hostinger.com'; // AJUSTE AQUI
            $mail->SMTPAuth   = true;
            $mail->Username   = 'contato@frpe.app.br'; // AJUSTE AQUI
            $mail->Password   = 'g3st@0Frpe';         // AJUSTE AQUI
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 465;
            
            // Remetente e Destinatário
            $mail->setFrom('sistema@frpe.app.br', 'Sistema de Licitações');
            $mail->addAddress('licitacao@frpe.com.br', 'Administrador'); // E-mail que receberá o alerta

            // Conteúdo
            $mail->isHTML(true);
            $mail->Subject = "ALERTA DE VENCIMENTO: $titulo";
            $mail->Body    = "
                <h2>Aviso de Vencimento Próximo</h2>
                <p>O documento <strong>$titulo</strong> vencerá em <strong>$diasAlerta dias</strong> ($dataVenc).</p>
                <p>Por favor, acesse o sistema para verificar e atualizar.</p>
                <br>
                <p><i>Sistema de Gestão de Licitações</i></p>
            ";

            $mail->send();
            echo "Email enviado para: $titulo <br>";

        } catch (Exception $e) {
            echo "Erro ao enviar email: {$mail->ErrorInfo}";
            // Mesmo com erro de email, vamos marcar como notificado para não tentar enviar infinitamente se for erro de config?
            // Depende da regra de negócio. Aqui vou optar por NÃO marcar se der erro, para tentar amanhã de novo.
            continue; 
        }

        // C. Marcar como notificado no banco para não mandar email duplicado
        $update = $pdo->prepare("UPDATE licencas_certidoes SET notificado = 1 WHERE id = ?");
        $update->execute([$doc['id']]);
    }
} else {
    echo "Nenhum documento vencendo em $diasAlerta dias hoje.";
}
?>