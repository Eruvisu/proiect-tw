<?php
session_start();
require VIEW_ROOT . '/template/header.php'; ?>

<?php
$img_p = $_SESSION['image_path'];

if(isset($_SESSION['artefact_name'])) {
    $artefact_name = $_SESSION['artefact_name'];
}


if(isset($_SESSION['usr_id']))
{
    $user_id = $_SESSION['usr_id'];
}

if(isset($_GET['id'])) {
    $artefact=$db->prepare("select * from artefacts where id_artefact=:id limit 1");

    $artefact->execute(['id'=>$_GET['id']]);

    $artefact=$artefact->fetch(PDO::FETCH_ASSOC);
    }
    $artefact_name=$artefact['artefact_name'];
    $img_p=$artefact['image_path'].$artefact['artefact_name'].$artefact['extension'];
?>
<div class="responsive">
    <div class="singleArtefact">
        <a target="_blank" href="">
            <img src="<?php echo $img_p?>" width="300" height="200">
        </a>
        <div class="desc"><?php echo $artefact_name?></div>
		
    </div>
</div>
<div class="responsive">
<?php
    require_once APP_ROOT.'/db_const.php';
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		
    if($mysqli->connect_errno){
	echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
	exit();
    }
    $results=$db->prepare("SELECT id_artefact, time_period, geo_position, description FROM artefacts WHERE artefact_name=:artefact_name");
    $results->execute(['artefact_name'=>$artefact_name]);
    $results=$results->fetchAll(PDO::FETCH_ASSOC);
    //$result = $mysqli->query($sql);
/*    while($row = mysqli_fetch_row($result)){
        $id_art = $row[0];
        $period = $row[1];
        $position = $row[2];*/
    foreach ($results as $result) {
        echo '<div class="singleDesc">' . $result['description'] . '</div>';
    }
    //$result->close();
?>
</div>
<div class = "responsive">

    <form method = "POST">
        <input type = "submit" value="Add to cart" name="add">
    </form>

    <form method = "POST">
        <input type = "submit" value="More artefacts related by date" name="add_date">
    </form>
	
	<form method = "POST">
    <input type = "submit" value="More artefacts related by discovery location" name="add_pos">
    </form>

    <form action="cart.php">
        <input type = "submit" value="View cart" name = "cart">
    </form>

</div>	

	
<div class = "responsive">	
	
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
	
	
    <?php
        if(isset($_POST['add_date'])){
            $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		
            if($mysqli->connect_errno){
                echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
                exit();
            }
            $sql_query = "SELECT CONCAT(image_path, artefact_name, extension), artefact_name, time_period, geo_position AS image FROM artefacts WHERE time_period='{$period}'";

            if ($mysqli->query($sql_query)) {
                $result = $mysqli->query($sql_query);
                while($row = mysqli_fetch_row($result)){
                    echo '<div class="responsive"><div class="singleArtefact2"><a target="_blank" href=""><img src="'.$row[0].'" width="300" height="200"></a><div class="desc">'.$row[1].'</div><div class="desc">Date: '.$row[2].'</div><div class="desc">Discovery location: '.$row[3].'</div></div></div>';
                }
                $result->close();
            } else {
                echo "<p>MySQL error no {$mysqli->errno} : {$mysqli->error}</p>";
                exit();
            }
        }
    ?>

    <?php
        if(isset($_POST['add_date'])){
            $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		
            if($mysqli->connect_errno){
                echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
                exit();
            }
            $sql_query = "SELECT CONCAT(image_path, artefact_name, extension), artefact_name, time_period, geo_position AS image FROM artefacts WHERE geo_position='{$position}'";

            if ($mysqli->query($sql_query)) {
                $result = $mysqli->query($sql_query);
                while($row = mysqli_fetch_row($result)){
                    echo '<div class="responsive"><div class="singleArtefact2"><a target="_blank" href=""><img src="'.$row[0].'" width="300" height="200"></a><div class="desc">'.$row[1].'</div><div class="desc">Date: '.$row[2].'</div><div class="desc">Discovery location: '.$row[3].'</div></div></div>';
                }
                $result->close();
            } else {
                echo "<p>MySQL error no {$mysqli->errno} : {$mysqli->error}</p>";
                exit();
            }
        }
    ?>
</div>

<?php require VIEW_ROOT . '/template/footer.php'; 