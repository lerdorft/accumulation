<?php
/**
 * Created by PhpStorm.
 * User: chensh
 * Date: 2018/9/30
 * Time: 11:18
 */

/**
 * 遍历目录结构，并打印
 *
 * @param $directory
 */
function traverseDir($directory)
{
    $handle = dir($directory);

    echo '<ul>';
    while ($file = $handle->read()) {
        if ($file != '.' && $file != '..') {
            $tmpDir = $directory . DIRECTORY_SEPARATOR . $file;
            if (is_dir($tmpDir)) {
                echo '<li><b>', $file, '</b></li>';
                traverseDir($tmpDir);
            } else {
                echo '<li>', $tmpDir, '</li>';
            }
        }
    }

    $handle->close();
    echo '</ul>';
}



/**
 * 遍历目录结构，以多维数组的形式保存目录结构
 *
 * @param $path
 * @param array $fileArr
 */
function traverseDir2($path, array &$fileArr)
{
    $handle = opendir($path);
    while (($file = readdir($handle)) !== false) {
        if ($file != '.' && $file != '..') {
            $fullFileName = $path . DIRECTORY_SEPARATOR . $file;
            if (is_dir($fullFileName)) {
                $fileArr[$file] = [];
                traverseDir2($fullFileName, $fileArr[$file]);
            } else if (is_file($fullFileName)) {
                $fileArr[$file] = $fullFileName;
            }
        }
    }
}

$fileArr = [];
traverseDir2(__DIR__, $fileArr);

echo '<pre>';
print_r($fileArr);
echo '<pre>';