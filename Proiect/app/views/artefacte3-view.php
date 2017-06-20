<?php
session_start();
require VIEW_ROOT . '/template/header.php'; ?>

        <article>
		<div class="artefacteTitle">
		<h class="first"> EGYPTPTIAN ARTIFACTS </h>
		</div>
		<?php
			require_once APP_ROOT.'/db_const.php';
			$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		
			if($mysqli->connect_errno){
				echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
				exit();
			}
			$sql = "SELECT CONCAT(image_path, artefact_name, extension), artefact_name, time_period, geo_position AS image FROM artefacts WHERE id_categorie=3";
			$result = $mysqli->query($sql);
			while($row = mysqli_fetch_row($result)){
                $_SESSION['image_path'] = $row[0];
                $_SESSION['artefact_name'] = $row[1];
				echo '<div class="responsive"><div class="gallery"><a target="_blank" href="artefact.php"><img src="'.$row[0].'" width="300" height="200"></a><div class="desc">'.$row[1].'</div><div class="desc">Date: '.$row[2].'</div><div class="desc">Discovery location: '.$row[3].'</div></div></div>';

			}
			$result->close();
		?>
        </article>

<?php require VIEW_ROOT . '/template/footer.php'; 