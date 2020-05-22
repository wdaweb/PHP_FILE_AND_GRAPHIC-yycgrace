<style>

*{
    box-sizing:border-box;
    margin: 0;
    padding: 0;
}

img{
    width:100%;
    flex-shrink: ;
}
.frame{
    display: inline-flex;
    width: 300px;
    bottom: 2px solid black;
    margin: 10px;
    box-shadow: 1px 1px 5px #ccc;
    height: 150px;
    vertical-align: middle;
}

</style>

<?php

$an=[
1=>"food",
2=>'travel',
3=>'pet',
4=>'life',
];

//$album=find('file_info','album');

foreach($an as $k => $v){
?>
    <a href="?album=<?=$k;?>"><?=$v;?></a>
<?php
}
?>

<!-- <a href="?album=2">旅遊</a>
<a href="?album=3">寵物</a> -->
<hr>
<?php
include_once "base.php";

if(!empty($_GET['album'])){
    $album=['album'=>$_GET['album']];
}else{
    $album=[];
}

$images=all("file_info",$album);

foreach($images as $img){
    echo "<div class='frame'><img src='".$img['path']."'></div>";
}


?>