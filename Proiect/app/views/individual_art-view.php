<?php require VIEW_ROOT . '/template/header.php'; ?>

<?php
session_start();
$img_p = $_SESSION['image_path'];
$artefact_name = $_SESSION['art_name'];
$user_id = $_SESSION['usr_id'];
?>
<div class="responsive">
    <div class="gallery">
        <a target="_blank" href="">
            <img src="<?php echo $img_p?>" width="300" height="200">
        </a>
        <div class="desc"><?php echo $artefact_name?></div>
    </div>
</div>
<?php
    require_once APP_ROOT.'/db_const.php';
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		
    if($mysqli->connect_errno){
	echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
	exit();
    }
    $sql = "SELECT id_artefact, time_period, geo_position, description FROM artefacts WHERE artefact_name='{$artefact_name}' LIMIT 1";
    $result = $mysqli->query($sql);
    while($row = mysqli_fetch_row($result)){
        $id_art = $row[0];
        $period = $row[1];
        $position = $row[2];
	echo '<div class="desc">'.$row[3].'</div>';
    }
    $result->close();
?>

<article>
    <form method = "POST">
        <input type = "submit" value="Add to cart" name="add">
    </form>
    <?php
        if(isset($_POST['add'])){
            $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		
            if($mysqli->connect_errno){
                echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
                exit();
            }
            $sql_query = "INSERT INTO `p_artefacts` (`id_user`, `id_artefact`) VALUES ('{$user_id}', '{$id_art}')";

            if ($mysqli->query($sql_query)) {
                echo "<p>Artefact added to cart successfully!</p>";
            } else {
                echo "<p>MySQL error no {$mysqli->errno} : {$mysqli->error}</p>";
                exit();
            }
        }
    ?>
</article>

<?php require VIEW_ROOT . '/template/footer.php'; 