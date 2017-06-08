<?php

require __DIR__.'/app/start.php';

if(!empty($_POST)){
    $id=$_POST['id'];
    $title=$_POST['title'];
    $url=$_POST['url'];
    $description=$_POST['description'];
    
    $updatePage=$db->prepare("Update collections set title=:title,url=:url,description=:description,updated=NOW() where id_collection=:id");

    $updatePage->execute(['id'=>$id,'title'=>$title,'url'=>$url,'description'=>$description]);

    header('Location: '.BASE_URL.'/list.php');
}

if(!isset($_GET['id'])){
    header('Location: '.BASE_URL.'/list.php');
    die();
}

$page=$db->prepare("select id_collection,title,url,description from collections where id_collection=:id");

$page->execute(['id'=>$_GET['id']]);

$page=$page->fetch(PDO::FETCH_ASSOC);

require __DIR__. '/app/views/edit-collection-view.php';
