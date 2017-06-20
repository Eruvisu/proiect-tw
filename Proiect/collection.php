<?php

require 'app/start.php';

if(empty($_GET['col'])){
    $page=false;
}
else
{

    //get collection data
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

    //get artefacts data
    $artefacts=$db->prepare("select id_artefact,artefact_name from artefacts where id_collection=:id_collection");
    $artefacts->execute(['id_collection'=>$page['id_collection']]);
    $artefacts=$artefacts->fetchAll(PDO::FETCH_ASSOC);

}

require VIEW_ROOT . '/collection-view.php';