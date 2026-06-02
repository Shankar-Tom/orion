<?php

return [
    'action' => 'create',
    'name' => 'Admin',
    'migration' => 'create_Admin_table2026_06_02_001731',
    'columns' => [
        'id' => 'int(11) NOT NULL AUTO_INCREMENT',
        'name' => 'varchar(255) NOT NULL',
        'email' => 'varchar(255) NOT NULL UNIQUE',
        'password' => 'varchar(255) NOT NULL',
        'created_at' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP',
        'updated_at' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
    ],
    'primary' => 'id',
    'foreign_keys' => [
        [
            'column' => 'role_id',
            'references' => 'roles',
            'on' => 'id',
            'on_delete' => 'CASCADE',
            'on_update' => 'CASCADE',
        ]
    ],
];
