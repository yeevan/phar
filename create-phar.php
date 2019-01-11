<?php
$srcRoot = __Dir__.'/src';
$buildRoot = __Dir__.'/build';

/*
$phar = new Phar($buildRoot.'/myapp.phar', FilesystemIterator::CURRENT_AS_FILEINFO| FilesystemIterator::KEY_AS_FILENAME, "myapp.phar");
$phar['index.php'] = file_get_contents($srcRoot.'/index.php');
$phar['common.php'] = file_get_contents($srcRoot.'/common.php');
$phar->setStub($phar->createDefaultStub('index.php'));

copy($srcRoot.'/config.ini', $buildRoot.'/config.ini');
*/


$phar = new Phar('myappdir.phar');//参数是压缩包的名称
//指定压缩的目录，第2个参数通过正则指定压缩文件的扩展名
$phar->buildFromDirectory($srcRoot,'/\.php$/');
//使用gzip来压缩此文件
$phar->compressFiles(Phar::GZ);
// Stop buffering write requests to the Phar archive, and save changes to disk
$phar->stopBuffering();
//用来设置启动加载的文件。默认会自动加载并执行lib_config.php文件
$phar->setStub($phar->createDefaultStub('index.php'));