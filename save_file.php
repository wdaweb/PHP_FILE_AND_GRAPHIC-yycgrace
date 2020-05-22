<?php

include_once "base.php";

// 判斷檔案是否上傳成功
if($_FILES['upload']['error']==0){

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

    $name='yyc'.date("Ymdhis").$sub;

    move_uploaded_file($_FILES['upload']['tmp_name'],"img/".$name);

    // 設定參數,存取進資料庫
    $data=[
        'filename'=>$name,
        'type'=>$_FILES['upload']['type'],
        'note'=>$_POST['note'],
        'path'=>'img/'.$name,
    ];

    // 除錯檢查
    echo "<pre>";
    print_r($data);
    echo "</pre>";

    save('file_info',$data);

    header("location:manage.php");

}

?>

