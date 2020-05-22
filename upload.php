<?php
/**
 * 1.建立表單
 * 2.建立處理檔案程式
 * 3.搬移檔案
 * 4.顯示檔案列表
 */

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>檔案上傳</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
 <h1 class="header">檔案上傳練習</h1>

 <!----建立你的表單及設定編碼----->

<form action="catch_file.php" method="post" enctype="multipart/form-data"> <!-- enctype: encode type -->
    <input type="file" name="upload" id="img"> <!-- name是$_FILES陣列的一維key值 -->
    <input type="submit" value="上傳">
</form>


<!----建立一個連結來查看上傳後的圖檔---->  
<?php
if(!empty($_GET['filename'])){
    $name=$_GET['filename'];
?>
    <!-- 實務上會先判斷filename是否存在,if後就不接else導出$name=""空值,否則會導向目錄 -->
    <img src="img/<?=$name;?>" alt="" style="width:200px">
    <!-- 若檔案有多種類型,可以用type值判斷標籤-如img -->

<?php
}
?>



</body>
</html>