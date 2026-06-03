<?php

return [
    'action' => 'create',
    'name' => 'schema_manager',
    'migration' => 'create_schema_manager_table_2026_06_03_052302',
    'columns' => [
        'id' => 'int(11) NOT NULL AUTO_INCREMENT',
        'created_at' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP',
        'updated_at' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
    ],
    'primary' => 'id',
];
