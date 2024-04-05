<?php
require 'vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\Exception\AwsException;


$s3 = new S3Client([
    'version' => 'latest',
    'region'  => 'us-east-1', // Thay thế bằng region của MinIO của bạn
    'endpoint' => 'http://192.168.231.128:9000', // Thay thế bằng endpoint của MinIO của bạn
    'credentials' => [
        'key'    => 'hoang',
        'secret' => '12345678',
    ],
]);

$bucketName = 'vanhoang'; // Thay thế bằng tên bucket của bạn

$objects = $s3->listObjects([
    'Bucket' => $bucketName,
]);

foreach ($objects['Contents'] as $object) {
    echo $object['Key'] . "\n";
}


// Tải file:
$objectKey = "1e8652b8fe207ff8cc97c550453d11b5.jpg"; // Thay thế bằng đường dẫn đến tệp bạn muốn tải xuống
$localFilePath = '3.txt'; // Đường dẫn đến nơi bạn muốn lưu tệp xuống


$result = $s3->getObject([
    'Bucket' => $bucketName,
    'Key'    => $objectKey,
    'SaveAs' => $localFilePath,
]);

if ($result) {
    echo "Tệp đã được tải xuống thành công.";
} else {
    echo "Không thể tải xuống tệp.";
}