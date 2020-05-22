
<?php
include_once "base.php";

$id=$_GET['id'];
$file=find("file_info",$id);

// 刪除檔案實際位置,用函數unlink()
unlink($file['path']);

// 刪除資料庫紀錄
del("file_info",$id);

to("manage.php");

?>