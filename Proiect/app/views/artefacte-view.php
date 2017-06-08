<?php require VIEW_ROOT . '/template/header.php'; ?>

        <article>
		<?php
			require_once APP_ROOT.'/db_const.php';
			$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		
			if($mysqli->connect_errno){
				echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
				exit();
			}
			$sql = "SELECT CONCAT(image_path, artefact_name, extension), artefact_name AS image FROM artefacts";
			$result = $mysqli->query($sql);
			while($row = mysqli_fetch_row($result)){
				echo '<div class="responsive"><div class="gallery"><a target="_blank" href="'.$row[0].'"><img src="'.$row[0].'" width="300" height="200"></a><div class="desc">'.$row[1].'</div></div></div>';
			}
			$result->close();
		?>
        </article>

<?php require VIEW_ROOT . '/template/footer.php'; ?>