<!DOCTYPE html>
<html>

<head>
    <title>Recenzii</title>
    <link rel="stylesheet" href="./css/styles.css">
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
		
	 <div>
     <form action="comentariu.php" method="post">
	 <table class="register_table" align="center">
	 <tr><td colspan="1">Comentariu: </td></tr>
	 <tr><td colspan="2"><textarea name="comentariu" rows="10" cols="35"></textarea></td></tr>
	 <tr><td colspan="3"><input type="submit" name="submit" value="Trimite recenzie" /></td></tr>
    </table>
	</form>
	</div>
	
	<div>
	<h1> Recenzii adaugate: <h1>
  
  
     <?php
  
 
   $hostname = "fenrir.info.uaic.ro";
   $username = "ArtifactyDB";
   $password = "d8iAwA0NwO";
   $dbname = "ArtifactyDB";

   $con= mysqli_connect($hostname, $username, $password, $dbname);

 if(!$con)
  {
    die("Connection failed: " . mysqli_connect_error());
  }
 
 $sql = "SELECT id,nume,comentariu,timestamp FROM comentarii ORDER BY id DESC LIMIT 5";
 $result = mysqli_query($con,$sql);
  if(mysqli_num_rows($result) > 0)
  {
  
       while($row = $result->fetch_assoc())
            {
                echo $row['id'] . "    :   " .  $row['nume']. '</b>' .  $row["comentariu"].  "       " .'<font size="-1">' . '<i>'. $row['timestamp'] .  '</i>' . '</font>' . '<br>';
            }
  
  }
   else
   { echo "";
   }
   
   mysqli_close($con);
   
   
   ?>
        
	</div>	
    </article>



        <footer>Copyright &copy; Proiect TW</footer>

    </div>
    </div>

</body>

</html>
