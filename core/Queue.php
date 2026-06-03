<?php

namespace Core;

use Core\DB;

class Queue
{
    public static function dispatch($jobClass, $data = [])
    {
        $payload = json_encode([
            'job' => $jobClass,
            'data' => $data
        ]);

        DB::table('jobs')->insert([
            'payload' => $payload
        ]);
    }
}
