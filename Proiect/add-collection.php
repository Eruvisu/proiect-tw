<?php

require __DIR__.'/app/start.php';

if(!empty($_POST)){
    $title=$_POST['title'];
    $url=$_POST['url'];
    $description=$_POST['description'];
    
    $insertCollection=$db->prepare("insert into collections (title,description,url,created)
        values (:title,:description,:url,NOW())
        ");
    
    $insertCollection->execute([
        'title'=>$title,
        'description'=>$description,
        'url'=>$url
    ]);
    
    header('Location: '.BASE_URL.'/list.php');
}

require __DIR__. '/app/views/add-collection-view.php';

