<!DOCTYPE html>
<html>

<head>
    <title>Cautare</title>
    <link rel="stylesheet" href="./css/styles.css">
    <meta charset="UTF-8">
</head>

<body>

    <div class="container">

        <ul class="topbar">
            <li class="topbar"><a class="topbar" href="Conectare.html">Conectare</a>
            </li>
            <li class="topbar"><a class="topbar" href="Inregistrare.html">Inregistrare</a>
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
                <li class="sidebar"><a class="sidebar" href="Recenzii.php">Recenzii</a>
                </li>
                <li class="sidebar"><a class="sidebar" href="Contact.html">Contact</a>
                </li>
                <li class="sidebar"><a class="sidebar" href="Import.html">Import</a>
                </li>
            </ul>
        </nav>

        <form class="searchbar" method="get" action="Cautare.php">
            <input name="artefact_name" placeholder="Introdu denumire...">
            <a href="Cautare.php"><input name="commit" type="submit" value="Cauta"></a>
		</form>
		
		
        <article>
		
            <h1> Rezultatele cautarii: </h1>
			
	
			<?php
			
			include("php/dbconnect.php");
			session_start();

			if($_SERVER["REQUEST_METHOD"]=="GET") {
				$q = mysqli_real_escape_string($con,$_GET['artefact_name']);

				$sql = "SELECT * FROM artefacts WHERE upper(artefact_name) LIKE upper('%".$q."%') ORDER BY artefact_name";
				$query = mysqli_query($con,$sql);

				while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {

				echo '<div class="responsive"><div class="gallery"><a target="_blank" href="'.$row['id_artefact'].'"><img src="'.$row['id_artefact'].'" width="300" height="200"></a><div class="desc">'.$row['id_artefact'].'</div></div></div>';
													}

			mysqli_close($con);
													}
		?>
        </article>
	
		
			<button type="submit" form="form_import" value="Upload XML" >Export</button>
		

        <footer>Copyright &copy; Proiect TW</footer>

    </div>
    </div>

</body>

</html>
