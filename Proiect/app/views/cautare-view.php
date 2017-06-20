<?php 
session_start();
require VIEW_ROOT . '/template/header.php'; 
?>

        <article>
		
            <h1> Rezultatele cautarii: </h1>
	
            <?php

            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                $q = mysqli_real_escape_string($con, $_GET['artefact_name']);

                $sql = "SELECT CONCAT(image_path, artefact_name, extension) AS 'source', artefact_name FROM artefacts WHERE upper(artefact_name) LIKE upper('%" . $q . "%') ORDER BY artefact_name";
                $query = mysqli_query($con, $sql);

                while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {

                    echo '<div class="responsive"><div class="gallery"><a target="_blank" href="artefact.php"><img src="' . $row['source'] . '" width="300" height="200"></a><div class="desc">' . $row['artefact_name'] . '</div></div></div>';
                }

                mysqli_close($con);
            }
            ?>
        </article>
	
<?php require VIEW_ROOT . '/template/footer.php'; ?>