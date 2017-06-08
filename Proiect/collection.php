<?php

require 'app/start.php';

if(empty($_GET['col'])){
    $page=false;
}
else{
    $url=$_GET['col'];
    
    $page=$db->prepare("select * from collections where url=:url limit 1");
    
    $page->execute(['url'=>$url]);
    
    $page=$page->fetch(PDO::FETCH_ASSOC);
    
    if($page){
        $page['created']=new DateTime($page['created']);
        if($page['updated']){
            $page['updated']=new DateTime($page['updated']);
        }
    }
}
require VIEW_ROOT . '/show.php';