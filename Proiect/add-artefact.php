<?php

require __DIR__.'/app/start.php';

if(!empty($_POST)){
    $name=$_POST['artefact_name'];
    $period=$_POST['period'];
    $time_period=$_POST['time_period'];
    $time_era=$_POST['time_era'];
    $geo_position=$_POST['geo_position'];
    $material=$_POST['material'];
    $classification=$_POST['classification'];
    $description=$_POST['description'];
    $id_col=$_POST['id_collection'];
    $url_col=$_POST['url_collection'];

    if(isset($_FILES['file'])){
        $file=$_FILES['file'];

        $file_name=$file['name'];
        $file_tmp=$file['tmp_name'];
        $file_size=$file['size'];
        $file_error=$file['error'];

        $file_ext=explode('.',$file_name);
        $file_ext=strtolower(end($file_ext));
        $file_ext='.'.$file_ext;

        $allowed=array('.jpg','.png');

        if(in_array($file_ext,$allowed)){
            if($file_error===0){
                if($file_size<=10485760){
                    $file_name_new=$name.$file_ext;
                    $file_destination='images/Artefacts/'.$file_name_new;

                    if(!move_uploaded_file($file_tmp,$file_destination)){
                        echo '<p>Error uploading file</p>';
                    }
                }
            }
        }
    }

    $insertArtefact=$db->prepare("insert into artefacts (artefact_name,extension,period,time_period,time_era,geo_position,material,classification,description,id_collection)
        values (:artefact_name,:extension,:period,:time_period,:time_era,:geo_position,:material,:classification,:description,:id_collection);
        ");

    $insertArtefact->execute([
        'artefact_name'=>$name,
        'extension'=>$file_ext,
        'period'=>$period,
        'time_period'=>$time_period,
        'time_era'=>$time_era,
        'geo_position'=>$geo_position,
        'material'=>$material,
        'classification'=>$classification,
        'description'=>$description,
        'id_collection'=>$id_col
    ]);

    $url_col=BASE_URL.'/collection.php?col='.escape($url_col);
    header('Location: '.$url_col);
}

if(isset($_GET['idcol'])){
    $id_collection=$_GET['idcol'];

    $collection=$db->prepare("select url from collections where id_collection=:id");

    $collection->execute(['id'=>$id_collection]);

    $collection=$collection->fetch(PDO::FETCH_ASSOC);
    $url_collection=$collection['url'];
}
$periods=$db->query("Select distinct period from artefacts order by period asc")->fetchAll(PDO::FETCH_ASSOC);
$materials=$db->query("Select distinct material from artefacts order by material asc")->fetchAll(PDO::FETCH_ASSOC);
$classifications=$db->query("Select distinct classification from artefacts order by classification asc")->fetchAll(PDO::FETCH_ASSOC);

require __DIR__. '/app/views/add-artefact-view.php';

