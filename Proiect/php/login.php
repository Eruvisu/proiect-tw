<html>
<head>
    <title>Login Form</title>
</head>
<body>

<?php

if (!isset($_POST['submit'])){
?>
<!-- The HTML login form -->
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        Username: <input type="text" name="username" /><br />
        Password: <input type="password" name="password" /><br />

        <input type="submit" name="submit" value="Login" />
    </form>

<?php
} else {
    require_once("db_const.php");
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    # check connection
    if ($mysqli->connect_errno) {
        echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
        exit();
    }

    $username = $_POST['username'];
    $password = $_POST['password'];
	
    $sql = "SELECT * from users WHERE userName LIKE '{$username}' AND userPass LIKE '{$password}' LIMIT 1";
    $result = $mysqli->query($sql);
    if (!$result->num_rows == 1) {
        echo "<p>Invalid username/password combination</p>";
		$result->close();
    } else {
	$sql_string = "UPDATE users SET userStatus = 'Y' WHERE userName LIKE '{$username}' AND userPass LIKE '{$password}'";
		if(!$mysqli->query($sql_string)){
			printf("error: %s\n", $mysqli_error);
		}
		$result->close();
        echo "<p>Logged in successfully</p>";
        // do stuffs
    }
}
?>      
</body>
</html>