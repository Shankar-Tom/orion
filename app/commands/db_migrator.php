<?php
include_once 'core/DB.php';

$db = new DB();
echo "Starting migrations...\n";

$migrations = scandir('migrations');


foreach ($migrations as $migration) {
    if ($migration == '.' || $migration == '..') {
        continue;
    }

    $migrationData = include 'migrations/' . $migration;
    $action = $migrationData['action'];
    $tableName = $migrationData['name'];
    $columns = $migrationData['columns'];
    $primary = $migrationData['primary'];
    $migrationName = $migrationData['migration'];
    $query = '';
    $checkIfExists = null;


    if (tableExists('Migration') == false) {
        $db->query("CREATE TABLE Migration (id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(255) NOT NULL, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP , updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)");
    } else {
        $checkIfExists = $db->table('Migration')->where('name', '=', $migrationName)->first();
    }
    if (!$checkIfExists) {
        if ($action == 'create') {
            $columnDefinitions = [];
            foreach ($columns as $key => $value) {
                $columnDefinitions[] = "{$key} {$value}";
            }

            $query = "CREATE TABLE IF NOT EXISTS {$tableName} (" . implode(', ', $columnDefinitions) . ", PRIMARY KEY ({$primary}))";
        }

        echo $query . "\n";


        $result = $db->query($query);
        if ($tableName !== 'Migration' && $result) {
            updateMigrationTable($migrationName);
        }
    }
}


function updateMigrationTable($migrationName)
{
    global $db;
    return $db->table('Migration')->insert(['name' => $migrationName]);
}

function tableExists($tableName)
{
    global $db;
    return $db->query("SHOW TABLES LIKE '{$tableName}'")->num_rows > 0;
}

echo "Migrations completed!\n";
