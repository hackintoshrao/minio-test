<?php

require __DIR__.'/vendor/autoload.php';

use Aws\S3\S3Client;

$config = [
    "driver" => "s3",
    "region" => "us-east-1",
    "bucket" => "videos",
    "endpoint" => "https://minio.codecasts.com.br",
    "version" => "2006-03-01",
    "credentials" => [
        "key" => "4D0SJ9V12VAWDHTH7LIC",
        "secret" => "BPSMtJTcQZOJATBW48iXs0RaIkOY7/c268HN0l3W",
    ],
];

$s3 = new S3Client($config);

$cmd = $s3->getCommand('GetObject', [
    'Bucket' => 'videos',
    'Key'    => 'CODECASTS-less-variaveis-pt-1174.mp4'
]);

$request = $s3->createPresignedRequest($cmd, '+20 minutes');

echo $request->getUri();