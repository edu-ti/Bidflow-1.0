<?php
require_once 'Database.php';

try {
    $db = new Database();
    $pdo = $db->connect();

    $sql = "CREATE TABLE IF NOT EXISTS minhas_licitacoes (
        id INT AUTO_INCREMENT PRIMARY KEY,
        portal VARCHAR(100) NOT NULL,
        empresa VARCHAR(150) NOT NULL,
        codigo VARCHAR(100) NOT NULL,
        palavras_chave TEXT,
        observacao TEXT,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        INDEX idx_empresa (empresa),
        INDEX idx_codigo (codigo)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";

    $pdo->exec($sql);
    echo "Table 'minhas_licitacoes' created or already exists.\n";

} catch (Exception $e) {
    echo "Error creating table: " . $e->getMessage() . "\n";
}
?>