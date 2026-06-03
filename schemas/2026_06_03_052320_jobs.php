<?php

return [
    'action' => 'create',
    'name' => 'jobs',
    'migration' => 'create_jobs_table2026_06_03_052320',
    'columns' => [
        'id' => 'int(11) NOT NULL AUTO_INCREMENT',
        'created_at' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP',
        'updated_at' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
    ],
    'primary' => 'id',
];
