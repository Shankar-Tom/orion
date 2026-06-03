<?php

$tableName = $argv[1] ?? null;
$action = $argv[2] ?? 'create';

if (!$tableName) {
    echo "Please provide a table name.\n";
    exit(1);
}

echo "Creating table: " . $tableName . " with action: " . $action . "\n";

$tableContent = "<?php

return [
    'action' => '" . $action . "',
    'name' => '" . strtolower($tableName) . "',
    'migration' => '" . $action . "_" . strtolower($tableName) . "_table_" . date('Y_m_d_His') . "',
    'columns' => [
        'id' => 'int(11) NOT NULL AUTO_INCREMENT',
        'created_at' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP',
        'updated_at' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
    ],
    'primary' => 'id',
];
";

file_put_contents('schemas/' . date('Y_m_d_His') . '_' . $action . '_' . strtolower($tableName) . '.php', $tableContent);

echo "Table created successfully.\n";
