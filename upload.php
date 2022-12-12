<?php


use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

require 'vendor/autoload.php';

$s3 = new S3Client([
    'version' => 'latest',
    'region'  => 'ap-southeast-1',
    'endpoint' => 'https://s3.ap-southeast-1.amazonaws.com',
    'credentials' => [
        'key'    => 'AKIAQPMXRLMWONMIL2TA',
        'secret' => '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',
    ],
]);

$files = $_FILES['file'];

if (isset($_POST['submit'])) {
    $file = $_FILES['file']['tmp_name'];
    $fileName = $_FILES['file']['name'];
    $fileType = $_FILES['file']['type'];

    $key = 'uploads/' . $fileName;

    try {
        $result = $s3->putObject([
            'Bucket' => 'zaidanbucket',
            'Key'    => $key,
            'Body'   => fopen($file, 'rb'),
            'ACL'    => 'public-read',
            'ContentType' => $fileType
        ]);

        header('Location: index.php');
    } catch (S3Exception $e) {
        echo $e->getMessage() . PHP_EOL;
    }
}
?>