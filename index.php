<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UAS CLOUD COMPUTING</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
    <form action="upload.php" method="post" enctype="multipart/form-data">
    <input class="form-control form-control-sm mt-3" type="file" placeholder=".form-control-sm">
    <div class="d-flex justify-content-center mt-3">
    <button class="btn btn-primary" type="submit" name="submit">UPLOAD</button>
  </form>
  </div>
  <?php

  use Aws\S3\S3Client;

  require 'vendor/autoload.php';

  $s3 = new S3Client([
    'version' => 'latest',
    'region'  => 'ap-southeast-1',
    'endpoint' => 'https://s3.ap-southeast-1.amazonaws.com',
    'credentials' => [
      'key' => "AKIAQPMXRLMWONMIL2TA",       // AWS IAM Roles for S3 bucket
      'secret' => "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",
    ],
  ]);

  $objects = $s3->getIterator('ListObjects', [
    'Bucket' => 'zaidanbucket'
  ]);

  echo "<div class='row'>";
  foreach ($objects as $object) {
    echo "<div class='col-md-4'>";
    echo '<img src="https://zaidanbucket.s3.ap-southeast-1.amazonaws.com/' . $object['Key'] . '" width="200" height="200" />';
    echo "<a href='delete.php?file=" . $object['Key'] . "' class='btn btn-danger'>Delete</a>";
    echo "</div>";
  }
  echo "</div>";

  ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>