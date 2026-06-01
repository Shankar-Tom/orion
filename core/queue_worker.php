<?php
include 'core/DB.php';


$jobs = DB::table('jobs')->where('status', '=', 'pending')->orderBy('id', 'asc')->limit(1)->get();
foreach ($jobs as $job) {
    DB::table('jobs')->where('id', '=', $job['id'])->update([
        'status' => 'processing'
    ]);
    try {

        $payload = json_decode(
            $job['payload'],
            true
        );

        $jobClass = $payload['job'];

        require_once "Jobs/$jobClass.php";

        (new $jobClass)->handle(
            $payload['data']
        );

        DB::table('jobs')->where('id', '=', $job['id'])->update([
            'status' => 'completed'
        ]);
    } catch (Exception $e) {

        DB::table('jobs')->where('id', '=', $job['id'])->update([
            'status' => 'failed',
            'attempts' => $jobs['attempts'] + 1
        ]);
    }
}
