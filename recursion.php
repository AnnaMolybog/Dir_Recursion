<?php
function scanDirectory ($dir)
{
    $arr = [];
    $files = scandir($dir);

    foreach ($files as $file) {
        if (($file != '.') && ($file != '..') && is_dir($dir . '/' . $file)) {
            $arr[] = scanDirectory($dir . '/' . $file);
        } elseif (($file != '.') && ($file != '..') && is_file($dir . '/' . $file)) {
            array_push($arr, $dir . '/' . $file);
        } elseif (($file == '.') || ($file == '..')) {
            continue;
        }
    }
    return $arr;
}
$dir = 'C:/xampp/htdocs/exercises';
$files = scanDirectory($dir);
echo "<pre>";
print_r($files);