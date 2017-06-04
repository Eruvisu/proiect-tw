<!DOCTYPE html>
<html>

<head>
    <title>Colectii</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <meta charset="UTF-8">
</head>

<body>

    <div class="container">

        <ul class="topbar">
            <li class="topbar"><a class="topbar" href="Conectare.html">Conectare</a>
            </li>
            <li class="topbar"><a class="topbar" href="Înregistrare.html">Înregistrare</a>
            </li>
        </ul>

        <header>
            <h1 id="title">ARTIFACTY</h1>

        </header>

        <nav class="sidebar">
            <ul class="sidebar">
                <li class="sidebar"><a class="sidebar" href="Home.html">Home</a>
                </li>
                <li class="sidebar"><a class="sidebar" href="Colectii.html">Colectii</a>
                </li>
                <li class="sidebar"><a class="sidebar" href="Statistici.html">Statistici</a>
                </li>
                <li class="sidebar"><a class="sidebar" href="Noutati.html">Noutati</a>
                </li>
                <li class="sidebar"><a class="sidebar" href="Recenzii.html">Recenzii</a>
                </li>
                <li class="sidebar"><a class="sidebar" href="Contact.html">Contact</a>
                </li>
                <li class="sidebar"><a class="sidebar" href="Import.html">Import</a>
                </li>
            </ul>
        </nav>

        <div class="searchbar">
            <input type="text" placeholder="Search...">
            <input type="submit" value="Go">
        </div>

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
			while($row = mysqli_fetch_row($result)){
				echo '<img src="'.$row[0].'">';
			}
			$result->close();
		?>
        </article>

        <footer>Copyright &copy; Proiect TW</footer>

    </div>
    </div>

</body>

</html>
