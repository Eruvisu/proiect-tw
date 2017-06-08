<html>
<head>
    <title>Login Form</title>
	<link rel="stylesheet" href="../css/styles.css">
    <meta charset="UTF-8">
</head>
<body>

    <div class="container">

		<ul class="topbar">
            <li class="topbar"><a href="login.php">Log In</a>
            </li>
            <li class="topbar"><a href="register.php">Register</a>
            </li>
        </ul>

        <header>
            <h1 id="title">ARTIFACTY</h1>

        </header>

        <nav class="sidebar">
            <ul class="sidebar">
                <li class="sidebar"><a class="sidebar" href="../home.html">Home</a>
                </li>
                <li class="sidebar"><a class="sidebar" href="../colectii.php">Colectii</a>
                </li>
                <li class="sidebar"><a class="sidebar" href="../statistici.html">Statistici</a>
                </li>
                <li class="sidebar"><a class="sidebar" href="../noutati.html">Noutati</a>
                </li>
                <li class="sidebar"><a class="sidebar" href="../recenzii.html">Recenzii</a>
                </li>
                <li class="sidebar"><a class="sidebar" href="../contact.html">Contact</a>
                </li>
                <li class="sidebar"><a class="sidebar" href="../import.html">Import</a>
                </li>
            </ul>
        </nav>

        <div class="searchbar">
            <input type="text" placeholder="Search...">
            <input type="submit" value="Go">
        </div>

<?php

if (!isset($_POST['submit'])){
?>
<!-- The HTML login form -->
    <form class="register_table" action="<?=$_SERVER['PHP_SELF']?>" method="post">
		<table>
			<tr>
				<td> Username: </td>
				<td> <input type="text" name="username" /><br /> </td>
			</tr>
			<tr>
				<td> Password: </td>
				<td> <input type="password" name="password" /><br /> </td>
			</tr>

			<tr>
				<td> <input type="submit" name="submit" value="Login" /> </td>
			</tr>
		</table>
    </form>

<?php
} else {
    require_once("../app/views/db_const.php");
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    # check connection
    if ($mysqli->connect_errno) {
        echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
        exit();
    }

    $username = $_POST['username'];
    $password = $_POST['password'];
	/*
	$stmt = $mysqli->prepare("SELECT * from users WHERE userName LIKE ? AND userPass LIKE ?");
	$stmt->bind_param("ss", $username, $password);
	$stmt->execute();
	$stmt->fetch();
	$numRows = $stmt->num_rows;
	if(!$numRows == 1){
		echo "<p>Invalid username/password combination</p>";
		$stmt->close();
	}else{
		$up_stmt = $mysqli_prepare("UPDATE users SET userStatus = 'Y' WHERE userName LIKE ? AND userPass LIKE ?");
		$up_stmt->bind_param("ss", $username, $password);
		$up_stmt->execute();
		$up_stmt->close();
	}
    */
	$sql = "SELECT * from users WHERE userName LIKE '{$username}' AND userPass LIKE '{$password}' LIMIT 1";
    $result = $mysqli->query($sql);
    if (!$result->num_rows == 1) {
        echo "<p>Invalid username/password combination</p>";
		$result->close();
    } else {
	$_SESSION['usr_id'] = $row[0];
	$_SESSION['username'] = $row[1];
	$sql_string = "UPDATE users SET userStatus = 'Y' WHERE userName LIKE '{$username}' AND userPass LIKE '{$password}'";
		if(!$mysqli->query($sql_string)){
			printf("error: %s\n", $mysqli_error);
		}
		$result->close();
        echo "<p>Logged in successfully</p>";
    }
	
}
?>      

        <footer>Copyright &copy; Proiect TW</footer>

    </div>

</body>
</html>