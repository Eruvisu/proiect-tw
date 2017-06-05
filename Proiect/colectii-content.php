        <article>
		<?php
			require_once("php/db_const.php");
			$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		
			if($mysqli->connect_errno){
				echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
				exit();
			}
			$sql = "SELECT CONCAT(image_path, artefact_name, extension) AS image FROM artefacts";
			$result = $mysqli->query($sql);
			//$iterator = 0;
			while($row = mysqli_fetch_row($result)){
				/*if($iterator == 0){
					echo '<tr><td><img src="'.$row[0].'"></td>';
				}
				if($iterator == 1){
					echo '<td><img src="'.$row[0].'"></td>';
				}
				if($iterator == 2){
					echo '<td><img src="'.$row[0].'"></td></tr>';
					$iterator = -1;
				}
				$iterator++;*/
				echo '<div class="responsive"><div class="gallery"><a target="_blank" href="'.$row[0].'"><img src="'.$row[0].'" width="300" height="200"></a><div class="desc">Description</div></div></div>';
			}
			$result->close();
		?>
        </article>