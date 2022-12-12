<?php
require 'vendor/autoload.php';

use Aws\S3\S3Client;

$file = $_GET['file'];

$client = new S3Client([
    'version' => 'latest',
    'region'  => 'ap-southeast-1',
    'endpoint' => 'https://s3.ap-southeast-1.amazonaws.com',
    'credentials' => [
        'key' => "AKIAQPMXRLMWONMIL2TA",       // AWS IAM Roles for S3 bucket
        'secret' => "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",
    ],
]);

$client->deleteObject([
    'Bucket' => 'zaidanbucket',
    'Key'    => $file
]);

header('Location: index.php');
