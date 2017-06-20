<?php

require __DIR__.'/app/start.php';

if(isset($_GET['id'])){
    $artefact=$db->query("Select  artefact_name,extension,image_path, id_collection from artefacts where id_artefact=".$_GET['id'])->fetch(PDO::FETCH_ASSOC);
    $urlCollection=$db->query("Select  url from collections where id_collection=".$artefact['id_collection'])->fetch(PDO::FETCH_ASSOC);
    $deleteArtefact=$db->prepare("delete from artefacts where id_artefact=:id");

    $path=$artefact['image_path'].$artefact['artefact_name'].$artefact['extension'];
    if($deleteArtefact->execute(['id'=>$_GET['id']])){
        unlink($path);
    }
}

$url_col=BASE_URL.'/collection.php?col='.escape($urlCollection['url']);
header('Location: '.$url_col);