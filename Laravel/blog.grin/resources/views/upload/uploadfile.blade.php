<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h3>UploadFile</h3>

<?php
echo Form::open(array('url' => '/uploadfile','files'=>'true'));
echo 'Select the file to upload.';
echo Form::file('image');
echo Form::submit('Upload File');
echo Form::close();
?>
</body>
</html>