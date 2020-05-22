<?php

// 系統變數$_FILES -- 屬於陣列形式:二維陣列

echo "<pre>";
print_r($_FILES);
echo "</pre>";

// print $_FILES on web: (when upload one file)
// 
// Array
// (
//     [upload] => Array
//         (
//             [name] => 127205932.jpg    --->上傳檔名
//             [type] => image/jpeg    --->上傳類型
//             [tmp_name] => C:\xampp\tmp\php8839.tmp    --->上傳後暫存路徑
//             [error] => 0    --->顯示錯誤代碼
//             [size] => 120986    --->上傳檔案的原始大小
//         )

// )

echo $_FILES['upload']['name'];

// 判斷檔案是否上傳成功: error與tmp皆可
// if(!empty($_FILES['upload']['tmp_name']))
// 當檔案上傳成功,更動及指定檔案存取位置(取代tmp)
// 函式: move_uploaded_file(檔案,指定目錄);
if($_FILES['upload']['error']==0){

    // 實務上,大多會先修改檔名再更動,避免資料管理困難
    // 簡易方法:
    // $sub=explode('.',$_FILES['upload']['name']);
    // $sub[1]; ---> 副檔名

    // 保險方法:
    // 宣告$name檔名(名稱+副檔名$sub)再更動
    // p.s.(副檔名)MIME類型
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

    $name=date("Ymdhis").$sub;
    // 實務上,檔名可能用編碼或其他方式,

    move_uploaded_file($_FILES['upload']['tmp_name'],"img/".$name);

    // 將結果傳回頁面(get)--查看上傳成功的圖檔
    header("location:upload.php?filename=$name");

}

?>

