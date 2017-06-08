<?php

require ('app/start.php');

$pages=$db->query("Select id_collection,title,url from collections order by created desc")->fetchAll(PDO::FETCH_ASSOC);

require VIEW_ROOT.'/listView.php';


?>