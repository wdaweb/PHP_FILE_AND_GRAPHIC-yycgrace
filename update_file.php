<?php

include_once "base.php";


// 預設是網址有帶get_id進入此頁,先判斷id是否為空(存在)
// 再用id進db索引其資料:$row變數(陣列)
// $變數是為了產生form表單供使用者修改
if(!empty($_GET['id'])){
    $row=find("file_info",$_GET['id']);
}


// if判斷: input-submit的name值:submit
// 做if判斷是否進行資料更新
// 判斷表單POST是否有修改動作
if(!empty($_POST['submit'])){
    // 用表單傳送的id,進db索引其資料:$source這筆資料(陣列)
    $id=$_POST['id'];
    $source=find("file_info",$id);

    // 修改檔名: 先判斷副檔名
    if(!empty($_FILES['upload']['tmp_name'])){
        switch($_FILES['upload']['type']){
            case "image/jpeg";
            $sub='.jpeg';
        break;
            case "image/jpg";
            $sub='.jpg';
        break;
            case "image/png";
            $sub='.png';
        break;
            case "image/gif";
            $sub='.gif';
        break;
    }

    unlink($source['path']);
    
    // 先刪除舊檔案再宣告$source資料
    // 若在宣告後unlink,會導向新檔名的路徑,而新檔案也尚未更動到新路徑,會成為無用動作
    $name=date("Ymdhis").$sub;

    // 若是上傳成功,就先宣告更改後的$source資料
    $source['filename']=$name;
    $source['type']=$_FILES['upload']['type'];
    $source['path']="img/".$name;

    move_uploaded_file($_FILES['upload']['tmp_name'],"img/".$name);
    }

    $note=$_POST['note'];

    $source['note']=$note;

    save("file_info",$source);

    // to("manage.php");


}

// 判斷檔案是否有上傳

?>
<img src="<?=$row['path'];?>" style="width:200px">


<form action="update_file.php" method="post" enctype="multipart/form-data">
    <input type="file" name="upload"><br>
    <input type="text" name="note" value="<?=$row['note'];?>"><br>
    <!-- 將id值放進表單,就不用前頁帶來的GET值 -->
    <input type="hidden" name="id" value="<?=$_POST['id'];?>">
    <!-- 用name值:submit,判斷是否有點擊更新 -->
    <input type="submit" name="submit" value="更新">
</form>

<!-- 這頁預設是網址get有帶id進來的 -->