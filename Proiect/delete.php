<?php

require __DIR__.'/app/start.php';

if(isset($_GET['id'])){
    $deletePage=$db->prepare("delete from collections where id_collection=:id");
    
    $deletePage->execute(['id'=>$_GET['id']]);
}

header('Location: '.BASE_URL.'/list.php');
