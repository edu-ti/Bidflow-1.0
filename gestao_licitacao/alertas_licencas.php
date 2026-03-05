<?php
ob_start(); 
ini_set('display_errors', 0);
ini_set('log_errors', 1);

require_once 'auth.php';
require_once 'Database.php';
require_once 'config.php';


// 1. GERENCIAMENTO DE SESSÃO E MENSAGENS
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// --- CONEXÃO ROBUSTA ---
global $pdo, $conn;
if (!isset($pdo) && isset($conn)) $pdo = $conn;
if ((!isset($pdo) || $pdo === null) && class_exists('Database')) {
    try { $db = new Database(); $pdo = (method_exists($db, 'getConnection')) ? $db->getConnection() : ((isset($db->conn)) ? $db->conn : null); } catch (Exception $e) {}
}
if ((!isset($pdo) || $pdo === null) && defined('DB_HOST')) {
    try { $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8", DB_USER, DB_PASS); } catch (PDOException $e) {}
}

if (!$pdo) {
    die('<div class="alert alert-danger">Erro de conexão com banco de dados.</div>');
}

// Ação: Marcar como lida
if (isset($_GET['marcar_lida'])) {
    $id = (int)$_GET['marcar_lida'];
    // Atualiza na tabela ESPECÍFICA de licenças
    $stmt = $pdo->prepare("UPDATE alertas_licencas SET lida = 1 WHERE id = ?");
    $stmt->execute([$id]);
    echo "<script>window.location='alertas_licencas.php';</script>";
    exit;
}

// Buscar alertas
$sql = "SELECT * FROM alertas_licencas ORDER BY lida ASC, data_criacao DESC LIMIT 50";
$stmt = $pdo->query($sql);
$notificacoes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Licenças e Certidões</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/style.css?v=2.35">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/consignado.css?v=1.0"> 
</head>
<body class="bg-[#d9e3ec] p-4 sm:p-8">
    <div class="container mx-auto bg-white p-4 sm:p-8 rounded-lg shadow-lg">
        <?php 
            $page_title = '';
            include 'header.php'; 
        ?>

<div class="container-fluid" style="margin-top: 20px;">
    <div class="row">
        <div class="col-md-12">
            <hr><br>
            <h3 class="page-header"><i class="fa fa-bell-o"></i> Alertas de Vencimento (Licenças e Certidões)</h3><br>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <?php if (count($notificacoes) > 0): ?>
                <div class="list-group">
                    <?php foreach ($notificacoes as $notif): ?>
                        <?php 
                            $classeItem = $notif['lida'] ? 'list-group-item-default' : 'list-group-item-warning';
                            $icone = $notif['lida'] ? 'fa-check-circle-o' : 'fa-exclamation-circle';
                            $estiloLida = $notif['lida'] ? 'opacity: 0.6;' : 'font-weight: bold;';
                        ?>
                        <div class="list-group-item <?= $classeItem ?>" style="display: flex; justify-content: space-between; align-items: center; <?= $estiloLida ?>">
                            <div>
                                <i class="fa <?= $icone ?>"></i> 
                                <span style="margin-left: 10px;"><?= htmlspecialchars($notif['mensagem']) ?></span>
                                <br>
                                <small style="margin-left: 28px; color: #777; font-weight: normal;">
                                    <?= date('d/m/Y \à\s H:i', strtotime($notif['data_criacao'])) ?>
                                </small>
                            </div>
                            
                            <?php if (!$notif['lida']): ?>
                                <a href="?marcar_lida=<?= $notif['id'] ?>" class="btn btn-xs btn-primary">
                                    Marcar como lida
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="alert alert-info text-center"><br>
                    <i class="fa fa-thumbs-up"></i> Tudo certo! Nenhum alerta pendente.
                </div>
            <?php endif; ?>
            
            <div class="text-center" style="margin-top: 20px;">
                <a href="licencas.php" class="btn btn-primary bg-blue-900 hover:bg-blue-800">&larr; Voltar para Licenças
                </a>
            </div>
        </div>
    </div>
</div>