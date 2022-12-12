<?php

return [
    's3' => [
        'key' => "AKIAQPMXRLMWONMIL2TA",       // AWS IAM Roles for S3 bucket
        'secret' => "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",
        'bucket' => 'zaidanbucket.s3.ap-southeast-1.amazonaws.com',
        'region' => 'ap-southeast-1',
        'version' => 'latest',
        'endpoint' => 's3.ap-southeast-1.amazonaws.com' // Required only for Digitalocean spaces
    ]
];
?>
