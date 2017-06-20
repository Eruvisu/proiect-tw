<?php
require (__DIR__ . '/app/start.php');

$sql = "select id_collection,title,url,description from collections";

$pages=$db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

require VIEW_ROOT . '/colectii-view.php';
