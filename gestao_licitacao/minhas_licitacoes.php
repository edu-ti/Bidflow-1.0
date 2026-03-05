<?php
// ==============================================
// ARQUIVO: minhas_licitacoes.php
// LISTAGEM E CADASTRO DE LICITAÇÕES
// ==============================================
ob_start();
ini_set('display_errors', 0);
ini_set('log_errors', 1);

require_once 'auth.php';
require_once 'Database.php';

// Garante que a tabela existe
require_once 'setup_minhas_licitacoes_table.php';

$db = new Database();
$pdo = $db->connect();

// Lógica de Salvamento e Exclusão
$msg = '';
$msgClass = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'add') {
            $portal = trim($_POST['portal'] ?? '');
            $empresa = trim($_POST['empresa'] ?? '');
            $codigo = trim($_POST['codigo'] ?? '');
            $palavras_chave = trim($_POST['palavras_chave'] ?? '');
            $observacao = trim($_POST['observacao'] ?? '');

            if ($portal && $empresa && $codigo) {
                try {
                    $stmt = $pdo->prepare("INSERT INTO minhas_licitacoes (portal, empresa, codigo, palavras_chave, observacao) VALUES (?, ?, ?, ?, ?)");
                    $stmt->execute([$portal, $empresa, $codigo, $palavras_chave, $observacao]);
                    $msg = "Licitação cadastrada com sucesso!";
                    $msgClass = "bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded shadow-sm";
                } catch (PDOException $e) {
                    $msg = "Erro ao cadastrar: " . $e->getMessage();
                    $msgClass = "bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded shadow-sm";
                }
            } else {
                $msg = "Preencha todos os campos obrigatórios.";
                $msgClass = "bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-4 rounded shadow-sm";
            }
        } elseif ($_POST['action'] === 'delete') {
            $delete_id = intval($_POST['delete_id']);
            if ($delete_id > 0) {
                try {
                    $stmt = $pdo->prepare("DELETE FROM minhas_licitacoes WHERE id = ?");
                    $stmt->execute([$delete_id]);
                    $msg = "Licitação removida com sucesso!";
                    $msgClass = "bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded shadow-sm";
                } catch (PDOException $e) {
                    $msg = "Erro ao remover: " . $e->getMessage();
                    $msgClass = "bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded shadow-sm";
                }
            }
        } elseif ($_POST['action'] === 'bulk_delete') {
            $ids = explode(',', $_POST['delete_ids']);
            $ids = array_filter(array_map('intval', $ids));
            if (!empty($ids)) {
                try {
                    $placeholders = implode(',', array_fill(0, count($ids), '?'));
                    $stmt = $pdo->prepare("DELETE FROM minhas_licitacoes WHERE id IN ($placeholders)");
                    $stmt->execute($ids);
                    $msg = count($ids) . " licitação(ões) removida(s) com sucesso!";
                    $msgClass = "bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded shadow-sm";
                } catch (PDOException $e) {
                    $msg = "Erro ao remover em massa: " . $e->getMessage();
                    $msgClass = "bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded shadow-sm";
                }
            }
        }
    }
}

// Buscar Licitações
$licitacoes = [];
try {
    $stmt = $pdo->query("SELECT * FROM minhas_licitacoes ORDER BY id DESC");
    $licitacoes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erro ao buscar licitações: " . $e->getMessage();
}

$page_title = 'Minhas Licitações';
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $page_title ?> - Monitoramento
    </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/style.css?v=2.35">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-[#d9e3ec] p-4 sm:p-8">

    <div class="container mx-auto bg-white p-6 sm:p-8 rounded-lg shadow-lg min-h-[80vh] relative">
        <?php include 'header.php'; ?>

        <?php if ($msg): ?>
            <div class="<?= $msgClass ?>">
                <?= htmlspecialchars($msg) ?>
            </div>
        <?php endif; ?>

        <!-- Cabeçalho Principal da Página -->
        <div class="flex items-center gap-2 mb-4 text-[#0A2540]">
            <i class="fas fa-list-ul text-lg"></i>
            <h1 class="text-xl font-bold">Minhas Licitações</h1>
            <div class="ml-auto text-sm font-bold text-[#0A2540] flex items-center gap-1 cursor-pointer">
                <i class="fas fa-filter text-xs"></i> Filtros
            </div>
        </div>

        <!-- Barra de Ações -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 pb-2 gap-4">
            <div class="flex items-center shadow-sm rounded">
                <button type="button" onclick="document.getElementById('addModal').classList.remove('hidden')"
                    class="bg-[#20c997] hover:bg-[#1ba87e] text-white px-4 py-1.5 text-sm font-bold border border-[#20c997] transition-colors rounded-l">
                    <i class="fas fa-plus mr-1"></i> Adicionar
                </button>
                <button type="button"
                    class="bg-[#d9534f] hover:bg-[#c9302c] text-white px-4 py-1.5 text-sm font-bold border border-[#d9534f] transition-colors">
                    <i class="fas fa-times mr-1"></i> Remover
                </button>
                <div
                    class="relative group border-y border-r border-gray-300 bg-[#f8fafd] hover:bg-gray-100 transition-colors">
                    <button type="button" class="text-gray-500 px-4 py-1.5 text-sm font-medium flex items-center gap-1">
                        Ações <i class="fas fa-caret-down text-xs"></i>
                    </button>
                    <!-- Dropdown Ações invisível por padrão -->
                    <div
                        class="absolute left-0 mt-0 w-32 bg-white border border-gray-200 shadow-md rounded-sm py-1 hidden group-hover:block z-20">
                        <a href="#"
                            class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 flex items-center gap-2 font-medium">
                            <i class="far fa-file-alt text-gray-400"></i> Relatório
                        </a>
                    </div>
                </div>
                <button type="button"
                    class="bg-white hover:bg-gray-50 text-gray-700 px-3 py-1.5 text-sm font-medium border-y border-r border-gray-300 transition-colors rounded-r">
                    <i class="fas fa-star text-gray-700"></i>
                </button>
            </div>

            <div class="w-full md:w-64">
                <input type="text"
                    class="w-full border border-gray-300 rounded py-1.5 px-3 text-sm text-gray-600 focus:outline-none focus:border-blue-400 placeholder-gray-400"
                    placeholder="Pesquisar (número ou órgão)">
            </div>
        </div>

        <!-- Tabela -->
        <div class="bg-white rounded-lg border border-gray-200 shadow-sm overflow-hidden mb-8">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-[#f8fafd] text-[#0A2540] text-sm font-bold border-b border-gray-200">
                            <th class="py-3 px-4 w-10 text-center">
                                <input type="checkbox" class="w-3.5 h-3.5 rounded border-gray-300 text-blue-900 focus:ring-blue-900 shadow-sm" id="selectAll">
                            </th>
                            <th class="py-3 px-4">Portal</th>
                            <th class="py-3 px-4">Empresa</th>
                            <th class="py-3 px-4">Código da OC / Num do pregão</th>
                            <th class="py-3 px-4">Palavras-chave</th>
                            <th class="py-3 px-4">Adicionado em</th>
                            <th class="py-3 px-4 text-center">Ação</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm text-gray-600 divide-y divide-gray-100">
                        <?php if (count($licitacoes) === 0): ?>
                            <tr>
                                <td colspan="7" class="py-8 text-center text-gray-400">
                                    Nenhuma licitação cadastrada ainda.
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($licitacoes as $lic): ?>
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="py-3 px-4 text-center">
                                        <input type="checkbox" class="row-chk w-3.5 h-3.5 rounded border-gray-300 text-blue-900 focus:ring-blue-900 shadow-sm" value="<?= $lic['id'] ?>">
                                    </td>
                                    <td class="py-3 px-4">
                                        <?= htmlspecialchars($lic['portal']) ?>
                                    </td>
                                    <td class="py-3 px-4 font-medium text-gray-800">
                                        <?= htmlspecialchars($lic['empresa']) ?>
                                    </td>
                                    <td class="py-3 px-4 text-blue-600 font-semibold">
                                        <?= htmlspecialchars($lic['codigo']) ?>
                                    </td>
                                    <td class="py-3 px-4">
                                        <?php
                                        $kws = array_map('trim', explode(',', $lic['palavras_chave']));
                                        foreach ($kws as $kw) {
                                            if ($kw) {
                                                echo '<span class="inline-block bg-[#f1f5f9] border border-gray-200 text-gray-600 text-[11px] font-bold px-2 py-0.5 rounded mr-1 mb-1">' . htmlspecialchars($kw) . '</span>';
                                            }
                                        }
                                        ?>
                                    </td>
                                    <td class="py-3 px-4">
                                        <?= date('d/m/Y', strtotime($lic['created_at'])) ?>
                                    </td>
                                    <td class="py-3 px-4 text-center">
                                        <form method="POST" class="inline"
                                            onsubmit="return confirm('Deseja realmente remover esta licitação?');">
                                            <input type="hidden" name="action" value="delete">
                                            <input type="hidden" name="delete_id" value="<?= $lic['id'] ?>">
                                            <button type="submit" class="text-gray-400 hover:text-red-500 transition-colors"
                                                title="Remover">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- MODAL -->
    <div id="addModal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl overflow-hidden flex flex-col max-h-[90vh]">
            <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center">
                <h2 class="text-xl font-bold text-[#0A2540]">Cadastro de licitação</h2>
                <button type="button" onclick="document.getElementById('addModal').classList.add('hidden')"
                    class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times text-lg"></i>
                </button>
            </div>

            <div class="p-6 overflow-y-auto">
                <form method="POST" id="addForm" class="space-y-4">
                    <input type="hidden" name="action" value="add">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Portal -->
                        <div>
                            <label class="block text-sm font-bold text-[#0A2540] mb-1">Portal <span
                                    class="text-red-500">*</span></label>
                            <select name="portal" required
                                class="w-full border border-gray-300 rounded py-2 px-3 text-sm text-gray-700 focus:border-blue-500 focus:outline-none">
                                <option value="" disabled selected>Selecione o Portal</option>
                                <option value="Banrisul">Banrisul</option>
                                <option value="BLL - Bolsa de Licitações e Leilões">BLL - Bolsa de Licitações e Leilões
                                </option>
                                <option value="BNC - Bolsa Nacional de Compras">BNC - Bolsa Nacional de Compras</option>
                                <option value="Compras Amazonas">Compras Amazonas</option>
                                <option value="Compras BR">Compras BR</option>
                                <option value="Compras Mato Grosso">Compras Mato Grosso</option>
                                <option value="Compras Minas Gerais">Compras Minas Gerais</option>
                                <option value="ComprasNet">ComprasNet</option>
                                <option value="ComprasNet Goiás">ComprasNet Goiás</option>
                                <option value="Compras Pernambuco Integrado">Compras Pernambuco Integrado</option>
                                <option value="Compras Públicas">Compras Públicas</option>
                                <option value="ComprasRS">ComprasRS</option>
                                <option value="Compras Santa Catarina">Compras Santa Catarina</option>
                                <option value="Licitações-e">Licitações-e</option>
                                <option value="Licitanet">Licitanet</option>
                                <option value="Licitar Digital">Licitar Digital</option>
                                <option value="Procergs">Procergs</option>
                                <option value="Publinexo">Publinexo</option>
                                <option value="Siga Rio de Janeiro">Siga Rio de Janeiro</option>
                            </select>
                        </div>

                        <!-- Empresa -->
                        <div>
                            <label class="block text-sm font-bold text-[#0A2540] mb-1">Empresa <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="empresa" required
                                class="w-full border border-gray-300 rounded py-2 px-3 text-sm text-gray-700 focus:border-blue-500 focus:outline-none"
                                placeholder="Selecione a Empresa">
                        </div>
                    </div>

                    <!-- Código -->
                    <div>
                        <label class="block text-sm font-bold text-[#0A2540] mb-1">Código da OC / Num do pregão <span
                                class="text-red-500">*</span></label>
                        <div class="flex">
                            <input type="text" name="codigo" required
                                class="w-full border border-gray-300 rounded-l py-2 px-3 text-sm text-gray-700 focus:border-blue-500 focus:outline-none bg-[#f1f5f9] min-h-[38px] z-10">
                            <button type="button"
                                class="bg-[#5e6388] border border-[#5e6388] text-white px-4 py-2 rounded-r text-sm focus:outline-none hover:bg-[#4e5270] transition-colors whitespace-nowrap font-medium min-h-[38px]">
                                <i class="fas fa-file-alt mr-1"></i> Buscar no Portal
                            </button>
                        </div>
                    </div>

                    <!-- Palavras-chave -->
                    <div>
                        <label class="block text-sm font-bold text-[#0A2540] mb-1">Palavras-chave</label>
                        <p class="text-xs text-gray-500 mb-2">Termos monitorados separados por vírgula</p>
                        <textarea name="palavras_chave" rows="2"
                            class="w-full border border-gray-300 rounded py-2 px-3 text-sm text-gray-700 bg-[#f8fafd] placeholder-gray-400 focus:border-blue-500 focus:outline-none"
                            placeholder="Digite aqui as palavras-chave (opcional)"></textarea>
                    </div>

                    <!-- Observação -->
                    <div>
                        <label class="block text-sm font-bold text-[#0A2540] mb-1">Observação</label>
                        <p class="text-xs text-gray-500 mb-2">Adicione detalhes que considerar importante</p>
                        <textarea name="observacao" rows="3"
                            class="w-full border border-gray-300 rounded py-2 px-3 text-sm text-gray-700 focus:border-blue-500 focus:outline-none placeholder-gray-400"
                            placeholder="Digite aqui observações gerais (opcional)"></textarea>
                    </div>
                </form>
            </div>

            <!-- Botões Modal -->
            <div class="px-6 py-4 border-t border-gray-100 flex justify-end gap-3 bg-white">
                <button type="button" onclick="document.getElementById('addModal').classList.add('hidden')"
                    class="px-5 py-2 border border-gray-300 rounded text-sm text-gray-600 bg-white hover:bg-gray-50 transition-colors text-center w-24">Cancelar</button>
                <button type="submit" form="addForm"
                    class="px-5 py-2 rounded text-sm text-white bg-[#5e6388] hover:bg-[#4e5270] transition-colors text-center w-24">
                    Salvar
                </button>
            </div>
        </div>
    </div>

</body>

</html>