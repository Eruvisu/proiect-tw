<?php

require 'app/start.php';

if(empty($_GET['idcol'])){
    $page=false;
}
else
{

    $id_col=$_GET['idcol'];

    $artefacts=$db->prepare("select * from artefacts where id_collection=:id_collection");
    $artefacts->execute(['id_collection'=>$id_col]);
    $artefacts=$artefacts->fetchAll(PDO::FETCH_ASSOC);

    $returnArray = array();
    if (count($artefacts) > 0) {
        foreach ($artefacts as $rs) {
            $returnArray[] = $rs;
        }
    }

/*    $fp = fopen('file.json', 'w+');
    fwrite($fp, json_encode($returnArray));
    fclose($fp);*/

    $file = 'file.json';
    file_put_contents($file, json_encode($returnArray));
    $mime = 'application/force-download';
    header('Pragma: public'); 	// required
    header('Expires: 0');		// no cache
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Last-Modified: '.gmdate ('D, d M Y H:i:s', filemtime ($file)).' GMT');
    header('Cache-Control: private',false);
    header('Content-Type: '.$mime);
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Content-Transfer-Encoding: binary');
    header('Content-Length: '.filesize($file));	// provide file size
    header('Connection: close');
    readfile($file);		// push it out
}