<?php
// ==============================================
// ARQUIVO: radar_config.php
// CONFIGURAÇÕES DO MONITOR
// ==============================================
ob_start();
ini_set('display_errors', 0);
ini_set('log_errors', 1);

require_once 'auth.php';
require_once 'Database.php';

// Carregar Configurações Existentes
$configFile = 'monitor_config.json';
$defaultConfig = [
    'alerts' => [
        'empresa' => true,
        'sound_empresa' => 'apito',
        'keywords' => true,
        'sound_keywords' => 'pop',
        'general' => true,
        'sound_general' => 'none'
    ],
    'keywords' => [
        ['term' => 'iminência', 'active' => true],
        ['term' => 'recurso', 'active' => true],
        ['term' => 'desempate', 'active' => true],
        ['term' => 'anexo', 'active' => true],
        ['term' => 'originais', 'active' => true]
    ],
    'continuous_alert' => 'none',
    'auto_delete_days' => 0,
    'report_email' => ''
];

$config = $defaultConfig;
if (file_exists($configFile)) {
    $loaded = json_decode(file_get_contents($configFile), true);
    if ($loaded) {
        $config = array_replace_recursive($defaultConfig, $loaded);
    }
}

// Helpers
function isChecked($val)
{
    return $val ? 'checked' : '';
}
function isSelected($current, $val)
{
    return $current === $val ? 'selected' : '';
}

// Mensagens de Feedback
$msg = '';
if (isset($_GET['msg'])) {
    $type = $_GET['type'] ?? 'success';
    $msgClass = $type === 'success'
        ? 'bg-green-100 border-l-4 border-green-500 text-green-700'
        : 'bg-red-100 border-l-4 border-red-500 text-red-700';
    $msg = '<div class="' . $msgClass . ' p-4 mb-6 rounded shadow-sm">' . htmlspecialchars($_GET['msg']) . '</div>';
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configurações - Monitoramento de Licitações</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/style.css?v=2.35">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/consignado.css?v=1.0">
</head>

<body class="bg-[#d9e3ec] p-4 sm:p-8">

    <div class="container mx-auto bg-white p-6 sm:p-8 rounded-lg shadow-lg min-h-[80vh]">
        <?php
        $page_title = 'Monitoramento de Licitações';
        include 'header.php';
        ?>

        <!-- Cabeçalho -->
        <div class="flex flex-col md:flex-row justify-between items-center mb-8 pb-4 border-b border-gray-100">
            <div class="mb-4 md:mb-0">
                <h1 class="text-2xl font-bold text-gray-700">Configurações de Monitoramento</h1>
                <p class="text-gray-500 mt-1 text-sm">Gerencie alertas, palavras-chave e notificações</p>
            </div>
            <div class="flex gap-2">
                <a href="minhas_licitacoes.php" class="btn bg-[#5e6388] hover:bg-[#4e5270] text-white shadow-sm">
                    <i class="fas fa-list"></i> Minhas Licitações
                </a>
                <a href="radar.php" class="btn btn-primary bg-blue-900 hover:bg-blue-800 text-white shadow-sm">
                    <i class="fas fa-satellite-dish mr-2"></i> Ir para Radar
                </a>
                <a href="dashboard.php"
                    class="btn btn-outline-secondary border-gray-300 text-gray-600 hover:bg-gray-50">
                    &larr; Voltar
                </a>
            </div>
        </div>

        <?= $msg ?>

        <form method="POST" action="radar_config_save.php" id="configForm">
            <input type="hidden" name="action" value="save_config">
            <input type="hidden" name="company_terms" value="<?= htmlspecialchars($config['company_terms'] ?? '') ?>">

            <div class="bg-white rounded-lg p-6 mb-8 w-full max-w-4xl border border-gray-100 shadow-sm relative">

                <h2
                    class="text-xl font-bold text-[#0A2540] border-b border-gray-100 pb-3 mb-6 flex justify-between items-center">
                    Configurações de Monitoramento
                    <i class="far fa-question-circle text-gray-400 text-lg cursor-pointer"></i>
                </h2>

                <!-- Alertas -->
                <h3 class="font-bold text-lg text-[#0A2540] mb-4">Alertas:</h3>

                <!-- Empresa -->
                <div class="flex items-center gap-3 mb-4">
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="alert_empresa" class="sr-only peer"
                            <?= isChecked($config['alerts']['empresa']) ?>>
                        <div
                            class="w-12 h-6 bg-gray-300 rounded-full peer peer-checked:after:translate-x-full after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#0A2540]">
                            <span
                                class="absolute left-1.5 top-1.5 text-[10px] text-white font-bold opacity-0 peer-checked:opacity-100">On</span>
                        </div>
                    </label>
                    <span class="bg-red-600 text-white text-xs font-bold px-2 py-1 rounded shadow-sm">Empresa</span>
                    <i class="far fa-question-circle text-gray-400 text-sm"></i>

                    <select name="sound_empresa"
                        class="ml-[3.5rem] text-sm border-gray-200 bg-[#f8fafd] rounded-md py-1.5 px-3 text-gray-600 w-36 focus:ring-1 focus:ring-blue-500 focus:border-blue-500 transition-shadow">
                        <option value="apito" <?= isSelected($config['alerts']['sound_empresa'], 'apito') ?>>🔊 Apito
                        </option>
                        <option value="pop" <?= isSelected($config['alerts']['sound_empresa'], 'pop') ?>>🎵 Pop</option>
                        <option value="none" <?= isSelected($config['alerts']['sound_empresa'], 'none') ?>>🔕 Mudo
                        </option>
                    </select>
                </div>

                <!-- Palavras Chave -->
                <div class="flex items-center gap-3 mb-4">
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="alert_keywords" class="sr-only peer"
                            <?= isChecked($config['alerts']['keywords']) ?>>
                        <div
                            class="w-12 h-6 bg-gray-300 rounded-full peer peer-checked:after:translate-x-full after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#0A2540]">
                            <span
                                class="absolute left-1.5 top-1.5 text-[10px] text-white font-bold opacity-0 peer-checked:opacity-100">On</span>
                        </div>
                    </label>
                    <span
                        class="bg-gray-500 text-white text-xs font-bold px-2 py-1 rounded shadow-sm">Palavras-Chave</span>
                    <i class="far fa-question-circle text-gray-400 text-sm"></i>

                    <select name="sound_keywords"
                        class="ml-[1.4rem] text-sm border-gray-200 bg-[#f8fafd] rounded-md py-1.5 px-3 text-gray-600 w-36 focus:ring-1 focus:ring-blue-500 focus:border-blue-500 transition-shadow">
                        <option value="pop" <?= isSelected($config['alerts']['sound_keywords'], 'pop') ?>>🎵 Pop</option>
                        <option value="apito" <?= isSelected($config['alerts']['sound_keywords'], 'apito') ?>>🔊 Apito
                        </option>
                        <option value="none" <?= isSelected($config['alerts']['sound_keywords'], 'none') ?>>🔕 Mudo
                        </option>
                    </select>
                </div>

                <!-- Cores -->
                <div
                    class="bg-[#f0f4fc] text-xs font-medium text-gray-600 py-1.5 px-3 rounded-md mb-2 w-full max-w-[420px]">
                    Ordem de prioridade de cor das palavras-chave
                </div>
                <div class="flex flex-col gap-1.5 mb-6 max-w-[420px] text-white font-bold text-sm tracking-wide">
                    <div class="bg-[#eab308] py-1.5 px-3 rounded shadow-sm">1 - Amarelo</div>
                    <div class="bg-[#d97706] py-1.5 px-3 rounded shadow-sm">2 - Laranja</div>
                    <div class="bg-[#0ea5e9] py-1.5 px-3 rounded shadow-sm">3 - Azul claro</div>
                    <div class="bg-[#0369a1] py-1.5 px-3 rounded shadow-sm">4 - Azul escuro</div>
                    <div class="bg-[#6b7280] py-1.5 px-3 rounded shadow-sm">5 - Cinza</div>
                </div>

                <!-- Geral -->
                <div class="flex items-center gap-3 mb-12">
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="alert_general" class="sr-only peer"
                            <?= isChecked($config['alerts']['general']) ?>>
                        <div
                            class="w-12 h-6 bg-gray-300 rounded-full peer peer-checked:after:translate-x-full after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#0A2540]">
                            <span
                                class="absolute left-1.5 top-1.5 text-[10px] text-white font-bold opacity-0 peer-checked:opacity-100">On</span>
                        </div>
                    </label>
                    <span class="bg-emerald-600 text-white text-xs font-bold px-4 py-1 rounded shadow-sm">Geral</span>
                    <i class="far fa-question-circle text-gray-400 text-sm"></i>

                    <select name="sound_general"
                        class="ml-[2.5rem] text-sm border-gray-200 bg-[#f8fafd] rounded-md py-1.5 px-3 text-gray-600 w-36 focus:ring-1 focus:ring-blue-500 focus:border-blue-500 transition-shadow">
                        <option value="pop" <?= isSelected($config['alerts']['sound_general'], 'pop') ?>>🎵 Pop</option>
                        <option value="apito" <?= isSelected($config['alerts']['sound_general'], 'apito') ?>>🔊 Apito
                        </option>
                        <option value="none" <?= isSelected($config['alerts']['sound_general'], 'none') ?>>🔕 Mudo
                        </option>
                    </select>
                </div>

                <!-- Palavras-chave -->
                <h3 class="font-bold text-lg text-[#0A2540] mb-3">Palavras-chave:</h3>

                <div class="flex items-center gap-2 mb-3">
                    <button type="button"
                        class="border border-gray-300 rounded-md text-gray-600 px-3 py-1.5 text-sm hover:bg-gray-50 flex items-center shadow-sm">
                        <i class="fas fa-palette mr-2 text-gray-400"></i> Alterar cor
                    </button>
                    <button type="button"
                        class="border border-red-200 text-red-500 rounded-md px-3 py-1.5 text-sm hover:bg-red-50 flex items-center shadow-sm"
                        onclick="deleteSelected()">
                        <i class="far fa-trash-alt mr-2"></i> Excluir
                    </button>
                </div>

                <div class="mb-2">
                    <input type="text" id="newKeywordInput"
                        class="w-full max-w-lg border border-gray-200 rounded-md py-2 px-3 text-sm text-gray-600 shadow-sm focus:border-blue-400 focus:ring-1 focus:ring-blue-400"
                        placeholder="Adicionar palavra-chave" onkeypress="handleKeywordEnter(event)">
                </div>

                <div class="border border-gray-200 rounded-md max-w-lg mb-10 overflow-hidden shadow-sm flex flex-col pt-2"
                    id="kwListContainer">
                    <div class="bg-[#f1f5f9] px-4 py-2 flex items-center border-b border-gray-200 rounded-t-lg mx-1">
                        <input type="checkbox"
                            class="w-3.5 h-3.5 rounded border-gray-300 text-blue-900 focus:ring-blue-900 shadow-sm"
                            id="selectAllKw">
                        <span class="ml-3 text-xs font-bold text-[#0A2540]">Palavras-chave</span>
                    </div>
                    <div class="max-h-60 overflow-y-auto" id="keywordItems">
                        <?php foreach ($config['keywords'] as $idx => $kw):
                            $colorCode = match ($kw['color'] ?? '5') {
                                '1' => 'bg-[#eab308]',
                                '2' => 'bg-[#d97706]',
                                '3' => 'bg-[#0ea5e9]',
                                '4' => 'bg-[#0369a1]',
                                default => 'bg-[#6b7280]'
                            };
                            ?>
                            <div
                                class="kw-item px-4 py-2 flex items-center bg-[#f8fafd] border-b border-white hover:bg-gray-100 transition-colors mx-1">
                                <input type="checkbox"
                                    class="kw-chk w-3.5 h-3.5 rounded border-gray-300 text-blue-900 shadow-sm focus:ring-blue-900 mr-3">
                                <span
                                    class="px-2 py-[2px] rounded text-white text-[11px] font-bold <?= $colorCode ?> shadow-sm"><?= htmlspecialchars($kw['term']) ?></span>

                                <input type="hidden" name="keywords_term[]" value="<?= htmlspecialchars($kw['term']) ?>">
                                <input type="hidden" name="keywords_color[]" value="<?= $kw['color'] ?? '5' ?>">
                                <input type="hidden" name="keywords_active[]" value="1">
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Alertas Contínuos -->
                <h3 class="font-bold text-lg text-[#0A2540] mb-3 flex items-center gap-2">
                    Alertas Contínuos: <i class="far fa-question-circle text-gray-400 text-base"></i>
                </h3>
                <div class="flex gap-2 mb-12">
                    <input type="hidden" name="continuous_alert" id="continuous_val"
                        value="<?= $config['continuous_alert'] ?>">

                    <button type="button" onclick="setContinuous('none', this)"
                        class="px-6 py-1 rounded-full text-xs font-bold tracking-wide <?= $config['continuous_alert'] == 'none' ? 'bg-[#111827] text-white shadow' : 'bg-[#f1f5f9] text-gray-600 hover:bg-gray-200 border border-gray-200' ?>">Nenhum</button>
                    <button type="button" onclick="setContinuous('empresa', this)"
                        class="px-6 py-1 rounded-full text-xs font-bold tracking-wide <?= $config['continuous_alert'] == 'empresa' ? 'bg-[#111827] text-white shadow' : 'bg-[#f1f5f9] text-gray-600 hover:bg-gray-200 border border-gray-200' ?>">Empresa</button>
                    <button type="button" onclick="setContinuous('todos', this)"
                        class="px-6 py-1 rounded-full text-xs font-bold tracking-wide <?= $config['continuous_alert'] == 'todos' ? 'bg-[#111827] text-white shadow' : 'bg-[#f1f5f9] text-gray-600 hover:bg-gray-200 border border-gray-200' ?>">Todos</button>
                </div>

                <!-- Exclusão Automática -->
                <h3 class="font-bold text-lg text-[#0A2540] mb-3">Exclusão Automática:</h3>
                <div class="flex flex-col mb-10">
                    <span class="text-sm text-[#0A2540] mb-2 flex items-center gap-1.5 font-medium">
                        Tempo para exclusão: <i class="far fa-question-circle text-gray-400 text-sm"></i>
                    </span>
                    <div class="flex items-center gap-4">
                        <div class="relative w-48 h-6 flex items-center">
                            <input type="range" name="auto_delete_days" min="0" max="60" step="15"
                                value="<?= $config['auto_delete_days'] ?>"
                                class="w-full h-1.5 bg-[#e2e8f0] rounded-lg appearance-none cursor-pointer accent-[#111827]"
                                id="sliderDays">
                            <div class="absolute w-full flex justify-between px-1 pointer-events-none -bottom-1">
                                <span class="w-[2px] h-1.5 bg-[#94a3b8]"></span>
                                <span class="w-[2px] h-1.5 bg-[#94a3b8]"></span>
                                <span class="w-[2px] h-1.5 bg-[#94a3b8]"></span>
                                <span class="w-[2px] h-1.5 bg-[#94a3b8]"></span>
                                <span class="w-[2px] h-1.5 bg-[#94a3b8]"></span>
                            </div>
                        </div>
                        <span id="range_display"
                            class="bg-[#f0f4fc] text-[#0A2540] text-xs font-bold px-4 py-1.5 rounded border border-blue-50 min-w-[70px] text-center">
                            <?= $config['auto_delete_days'] == 0 ? 'Nunca' : $config['auto_delete_days'] . ' dias' ?>
                        </span>
                    </div>
                </div>

                <!-- Relatório por e-mail -->
                <h3 class="font-bold text-lg text-[#0A2540] mb-3 flex items-center gap-2">
                    Relatório por e-mail: <i class="far fa-question-circle text-gray-400 text-base"></i>
                </h3>
                <div class="mb-10 max-w-[480px]">
                    <div class="mb-2">
                        <input type="email" name="report_email"
                            class="w-full bg-[#f8fafd] border border-[#e2e8f0] rounded-md py-2.5 px-3 text-sm text-gray-600 shadow-sm focus:border-blue-400 focus:outline-none transition-shadow"
                            value="<?= htmlspecialchars($config['report_email']) ?>" placeholder="Digite aqui o e-mail">
                    </div>
                    <p class="text-[11px] text-[#334155] leading-relaxed">
                        <strong>Garanta o recebimento:</strong> inclua o e-mail <strong>editais@effecti.com.br</strong>
                        em sua lista de remetentes confiáveis. Este procedimento impede que nossos e-mails sejam
                        falsamente interpretados como spam.
                    </p>
                </div>

                <!-- Botões Salvar e Cancelar -->
                <div class="border-t border-gray-100 pt-6 flex items-center gap-3">
                    <button type="submit"
                        class="bg-[#111827] hover:bg-black text-white px-5 py-2 rounded font-bold text-xs shadow hover:shadow-md transition-all flex items-center gap-2">
                        <i class="fas fa-save"></i> Salvar
                    </button>
                    <button type="button" onclick="window.history.back()"
                        class="bg-white text-gray-500 border border-gray-200 hover:bg-gray-50 px-5 py-2 rounded font-bold text-xs shadow-sm flex items-center gap-2 transition-colors">
                        <i class="fas fa-undo"></i> Cancelar
                    </button>
                </div>
            </div>
        </form>
    </div>

    <script>
        function setContinuous(val, btn) {
            document.getElementById('continuous_val').value = val;
            const container = btn.parentElement;
            const buttons = container.querySelectorAll('button');
            buttons.forEach(b => {
                b.className = "px-6 py-1 rounded-full text-xs font-bold tracking-wide bg-[#f1f5f9] text-gray-600 hover:bg-gray-200 border border-gray-200";
            });
            btn.className = "px-6 py-1 rounded-full text-xs font-bold tracking-wide bg-[#111827] text-white shadow";
        }

        function handleKeywordEnter(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                let val = e.target.value.trim();
                if (val) {
                    let container = document.getElementById('keywordItems');
                    let div = document.createElement('div');
                    div.className = "kw-item px-4 py-2 flex items-center bg-[#f8fafd] border-b border-white hover:bg-gray-100 transition-colors mx-1";
                    div.innerHTML = `
                        <input type="checkbox" class="kw-chk w-3.5 h-3.5 rounded border-gray-300 text-blue-900 focus:ring-blue-900 mr-3 shadow-sm">
                        <span class="px-2 py-[2px] rounded text-white text-[11px] font-bold bg-[#6b7280] shadow-sm">${val}</span>
                        <input type="hidden" name="keywords_term[]" value="${val}">
                        <input type="hidden" name="keywords_color[]" value="5">
                        <input type="hidden" name="keywords_active[]" value="1">
                    `;
                    container.appendChild(div);
                    e.target.value = '';
                }
            }
        }

        function deleteSelected() {
            document.querySelectorAll('.kw-item').forEach(item => {
                let chk = item.querySelector('.kw-chk');
                if (chk && chk.checked) {
                    item.remove();
                }
            });
            document.getElementById('selectAllKw').checked = false;
        }

        document.getElementById('selectAllKw').addEventListener('change', function () {
            let checked = this.checked;
            document.querySelectorAll('.kw-chk').forEach(chk => {
                chk.checked = checked;
            });
        });

        document.getElementById('sliderDays').addEventListener('input', function () {
            document.getElementById('range_display').innerText = this.value == 0 ? 'Nunca' : this.value + ' dias';
        });

        // Impede submit form ao dar o enter no input
        document.getElementById('newKeywordInput').addEventListener('keydown', function (e) {
            if (e.key === 'Enter') {
                e.preventDefault();
            }
        });
    </script>
</body>

</html>