<html>
<head>
    <title>Registration</title>
	<link rel="stylesheet" href="./css/styles.css">
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
require_once('./php/db_const.php');
if (!isset($_POST['submit'])) {
?>  <!-- The HTML registration form -->
    <form class="register_table" action="<?=$_SERVER['PHP_SELF']?>" method="post">
		<table>
			<tr>
				<td> Username: </td>
				<td> <input type="text" name="username" /><br /> <td>
			</tr>
			<tr>
				<td> Password: </td> 
				<td> <input type="password" name="password" /><br /> </td>
			</tr>
			<tr> 
				<td> First name: </td>
				<td> <input type="text" name="first_name" /><br /> </td>
			</tr>
			<tr>
				<td> Last name: </td>
				<td> <input type="text" name="last_name" /><br /> </td>
			</tr>
			<tr>
				<td> Email: </td>
				<td> <input type="type" name="email" /><br /> </td>
			</tr>
			<tr>
				<td> Mobile number: </td>
				<td> <input type="number" name="phone" /> <br/> </td>
			</tr>

			<tr> 
				<td> <input type="submit" name="submit" value="Register" /> </td>
			</tr>
		</table>
    </form>
<?php
} else {
## connect mysql server
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    # check connection
    if ($mysqli->connect_errno) {
        echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
        exit();
    }
## query database
    # prepare data for insertion
    $username   = $_POST['username'];
    $password   = $_POST['password'];
    $first_name = $_POST['first_name'];
    $last_name  = $_POST['last_name'];
    $email      = $_POST['email'];
	$mobileNum  = $_POST['phone'];

    # check if username and email exist else insert
    $exists = 0;
    $result = $mysqli->query("SELECT userName from users WHERE userName = '{$username}' LIMIT 1");
    if ($result->num_rows == 1) {
        $exists = 1;
        $result = $mysqli->query("SELECT userEmail from users WHERE userEmail = '{$email}' LIMIT 1");
        if ($result->num_rows == 1) $exists = 2;
    } else {
        $result = $mysqli->query("SELECT userEmail from users WHERE userEmail = '{$email}' LIMIT 1");
        if ($result->num_rows == 1) $exists = 3;
    }

    if ($exists == 1) echo "<p>Username already exists!</p>";
    else if ($exists == 2) echo "<p>Username and Email already exists!</p>";
    else if ($exists == 3) echo "<p>Email already exists!</p>";
    else {
        # insert data into mysql database
        $sql = "INSERT  INTO `users` (`firstName`, `lastName`, `mobileNumber`, `userEmail`, `userName`, `userPass`)
                VALUES ('{$first_name}', '{$last_name}', '{$mobileNum}', '{$email}', '{$username}', '{$password}')";

        if ($mysqli->query($sql)) {
            //echo "New Record has id ".$mysqli->insert_id;
            echo "<p>Registred successfully!</p>";
        } else {
            echo "<p>MySQL error no {$mysqli->errno} : {$mysqli->error}</p>";
            exit();
        }
    }
}
?>

        <footer>Copyright &copy; Proiect TW</footer>

    </div>
</body>
</html>
