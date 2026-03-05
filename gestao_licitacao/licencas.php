<?php
// --- CONFIGURAÇÃO E CONEXÃO ---
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

// Lógica de Conexão Robusta
global $pdo, $conn;
if (!isset($pdo) && isset($conn)) $pdo = $conn;

if ((!isset($pdo) || $pdo === null) && class_exists('Database')) {
    try {
        $db = new Database();
        if (method_exists($db, 'getConnection')) $pdo = $db->getConnection();
        elseif (method_exists($db, 'connect')) $pdo = $db->connect();
        elseif (isset($db->conn)) $pdo = $db->conn;
    } catch (Exception $e) {}
}

if ((!isset($pdo) || $pdo === null) && defined('DB_HOST')) {
    try {
        $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8", DB_USER, DB_PASS);
    } catch (PDOException $e) {}
}

if (!isset($pdo) || $pdo === null) {
    die('<div style="padding: 20px; color: red; background: #ffeeee; border: 1px solid red; margin: 20px;">Erro Crítico: Sem conexão com o banco.</div>');
}

// --- PROCESSAMENTO (Upload / Delete) ---
$uploadDir = 'uploads/licencas/';
if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
$msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'salvar') {
    $titulo = $_POST['titulo'] ?? '';
    $data_vencimento = $_POST['data_vencimento'] ?? '';
    
    if (isset($_FILES['arquivo']) && $_FILES['arquivo']['error'] === 0) {
        $ext = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION);
        $novoNome = uniqid() . "." . $ext;
        $destino = $uploadDir . $novoNome;
        
        if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $destino)) {
            try {
                $stmt = $pdo->prepare("INSERT INTO licencas_certidoes (titulo, arquivo_path, data_vencimento) VALUES (?, ?, ?)");
                if ($stmt->execute([$titulo, $destino, $data_vencimento])) {
                    $msg = '<div class="msg-success"><i class="fa fa-check"></i> Documento salvo com sucesso!</div>';
                }
            } catch (Exception $e) {
                $msg = '<div class="msg-error">Erro ao salvar no banco.</div>';
            }
        } else {
            $msg = '<div class="msg-error">Erro no upload do arquivo.</div>';
        }
    }
}

if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $stmt = $pdo->prepare("SELECT arquivo_path FROM licencas_certidoes WHERE id = ?");
    $stmt->execute([$id]);
    $file = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($file) {
        if (file_exists($file['arquivo_path'])) unlink($file['arquivo_path']);
        $pdo->prepare("DELETE FROM licencas_certidoes WHERE id = ?")->execute([$id]);
        $msg = '<div class="msg-success"><i class="fa fa-trash"></i> Documento excluído.</div>';
    }
}

// --- BUSCA DADOS ---
$stmt = $pdo->query("SELECT * FROM licencas_certidoes ORDER BY data_vencimento ASC");
$licencas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- CSS CUSTOMIZADO (Design Limpo e Profissional) -->
<style>
    /* Reset básico para esta área */
    .licencas-wrapper {
        font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
        background-color: #f8f9fa;
        padding: 20px;
        min-height: 80vh;
    }

    /* Cabeçalho */
    .page-header-custom {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        border-bottom: 2px solid #e9ecef;
        padding-bottom: 15px;
    }
    .page-title {
        font-size: 24px;
        color: #333;
        margin: 0;
        font-weight: 600;
    }
    .page-subtitle {
        color: #6c757d;
        font-size: 14px;
        margin-top: 5px;
    }

    /* Container Branco (Card) */
    .content-box {
        background: #ffffff;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        padding: 25px;
        margin-bottom: 30px;
        border: 1px solid #e9ecef;
    }

    .box-header {
        font-size: 18px;
        color: #495057;
        font-weight: 600;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    /* Formulário */
    .form-grid {
        display: grid;
        grid-template-columns: 2fr 1fr 1fr auto;
        gap: 15px;
        align-items: end;
    }
    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
        color: #555;
        font-size: 13px;
    }
    .custom-input {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #ced4da;
        border-radius: 6px;
        font-size: 14px;
        transition: border-color 0.15s ease-in-out;
        box-sizing: border-box; /* Garante que padding não quebre layout */
    }
    .custom-input:focus {
        border-color: #80bdff;
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
    }
    .btn-save {
        background-color: #28a745;
        color: white;
        border: none;
        padding: 10px 25px;
        border-radius: 6px;
        cursor: pointer;
        font-weight: 600;
        font-size: 14px;
        height: 42px; /* Altura igual aos inputs */
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .btn-save:hover { background-color: #218838; }

    /* Tabela */
    .table-container {
        overflow-x: auto;
    }
    .custom-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 14px;
    }
    .custom-table th {
        background-color: #f1f3f5;
        color: #495057;
        font-weight: 600;
        text-align: left;
        padding: 15px;
        border-bottom: 2px solid #dee2e6;
        text-transform: uppercase;
        font-size: 12px;
        letter-spacing: 0.5px;
    }
    .custom-table td {
        padding: 15px;
        border-bottom: 1px solid #e9ecef;
        color: #333;
        vertical-align: middle;
    }
    .custom-table tr:hover {
        background-color: #f8f9fa;
    }

    /* Badges e Ações */
    .status-badge {
        padding: 5px 10px;
        border-radius: 50px;
        font-size: 12px;
        font-weight: 600;
        display: inline-block;
        min-width: 80px;
        text-align: center;
    }
    .badge-success { background-color: #d4edda; color: #155724; }
    .badge-warning { background-color: #fff3cd; color: #856404; }
    .badge-danger { background-color: #f8d7da; color: #721c24; }

    .action-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        border-radius: 4px;
        color: white;
        text-decoration: none;
        margin-right: 4px;
        transition: opacity 0.2s;
        border: none;
    }
    .action-btn:hover { opacity: 0.8; color: white; }
    .btn-view { background-color: #17a2b8; }
    .btn-down { background-color: #6c757d; }
    .btn-del { background-color: #dc3545; }

    /* Mensagens */
    .msg-success { padding: 15px; background: #d4edda; color: #155724; border-radius: 6px; margin-bottom: 20px; border: 1px solid #c3e6cb; }
    .msg-error { padding: 15px; background: #f8d7da; color: #721c24; border-radius: 6px; margin-bottom: 20px; border: 1px solid #f5c6cb; }

    /* Responsivo */
    @media (max-width: 900px) {
        .form-grid { grid-template-columns: 1fr; gap: 10px; }
        .btn-save { width: 100%; justify-content: center; margin-top: 10px; }
    }
</style>

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
            $page_title = 'Gestão de Licenças e Certidões';
            include 'header.php'; 
        ?>

<div class="licencas-wrapper">
    <!-- Cabeçalho da Página -->
    <div class="page-header-custom">
        <div>
            <span>Controle de vencimentos e arquivos anexos</span>
        </div>
        <a href="dashboard.php" class="btn btn-primary bg-blue-900 hover:bg-blue-800">&larr; Voltar ao Painel</a>
    </div>

    <?= $msg ?>

    <!-- Seção de Cadastro -->
    <div class="content-box">
        <div class="box-header">
            <i class="fa fa-plus-circle" style="color: #28a745;"></i> Novo Documento
        </div>
        
        <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="action" value="salvar">
            
            <div class="form-grid">
                <!-- Título -->
                <div class="form-group">
                    <label>Título / Descrição</label>
                    <input type="text" name="titulo" class="custom-input" required placeholder="Ex: CND Federal - Receita">
                </div>
                
                <!-- Data -->
                <div class="form-group">
                    <label>Data de Vencimento</label>
                    <input type="date" name="data_vencimento" class="custom-input" required>
                </div>
                
                <!-- Arquivo -->
                <div class="form-group">
                    <label>Arquivo (PDF/Img)</label>
                    <input type="file" name="arquivo" class="custom-input" required accept=".pdf,.jpg,.jpeg,.png">
                </div>

                <!-- Botão -->
                <div class="form-group">
                    <label>&nbsp;</label> <!-- Espaço vazio para alinhar -->
                    <button type="submit" class="btn-save">
                        <i class="fa fa-save"></i> Salvar
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Seção de Listagem -->
    <div class="content-box">
        <div class="box-header">
            <i class="fa fa-list-ul" style="color: #17a2b8;"></i> Documentos Cadastrados
        </div>

        <div class="table-container">
            <table class="custom-table">
                <thead>
                    <tr>
                        <th width="40%">Documento</th>
                        <th width="15%">Vencimento</th>
                        <th width="25%">Situação</th>
                        <th width="20%">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(count($licencas) > 0): ?>
                        <?php foreach($licencas as $doc): 
                            $hoje = new DateTime(); $hoje->setTime(0,0,0);
                            $venc = new DateTime($doc['data_vencimento']); $venc->setTime(0,0,0);
                            $diff = $hoje->diff($venc);
                            $dias = (int)$diff->format('%r%a');

                            // Lógica de Status
                            $badge = '<span class="status-badge badge-success">Vigente</span>';
                            $textoExtra = '';

                            if ($dias < 0) {
                                $badge = '<span class="status-badge badge-danger">VENCIDO</span>';
                                $textoExtra = '<span style="color:red; font-size:12px; display:block;">Há ' . abs($dias) . ' dias</span>';
                            } elseif ($dias <= 10) {
                                $badge = '<span class="status-badge badge-warning">Atenção</span>';
                                $textoExtra = '<span style="color:#856404; font-size:12px; display:block;">Vence em ' . $dias . ' dias</span>';
                            } else {
                                $textoExtra = '<span style="color:#aaa; font-size:12px; display:block;">Faltam ' . $dias . ' dias</span>';
                            }
                        ?>
                        <tr>
                            <td>
                                <strong><?= htmlspecialchars($doc['titulo']) ?></strong>
                            </td>
                            <td>
                                <?= date('d/m/Y', strtotime($doc['data_vencimento'])) ?>
                            </td>
                            <td>
                                <?= $badge ?>
                                <?= $textoExtra ?>
                            </td>
                            <td>
                                <a href="<?= htmlspecialchars($doc['arquivo_path']) ?>" target="_blank" class="action-btn btn-view" title="Visualizar"><i class="fa fa-eye"></i></a>
                                <a href="<?= htmlspecialchars($doc['arquivo_path']) ?>" download class="action-btn btn-down" title="Baixar"><i class="fa fa-download"></i></a>
                                <a href="?delete=<?= $doc['id'] ?>" class="action-btn btn-del" onclick="return confirm('Tem certeza que deseja excluir?');" title="Excluir"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" style="text-align: center; padding: 40px; color: #999;">
                                Nenhuma licença ou certidão cadastrada até o momento.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>