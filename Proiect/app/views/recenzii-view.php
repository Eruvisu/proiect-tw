<?php require VIEW_ROOT . '/template/header.php'; ?>

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

            $con = mysqli_connect($hostname, $username, $password, $dbname);

            if (!$con) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT id,nume,comentariu,timestamp FROM comentarii ORDER BY id DESC LIMIT 5";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {

                while ($row = $result->fetch_assoc()) {
                    echo $row['id'] . "    :   " . $row['nume'] . '</b>' . $row["comentariu"] . "       " . '<font size="-1">' . '<i>' . $row['timestamp'] . '</i>' . '</font>' . '<br>';
                }
            } else {
                echo "";
            }

            mysqli_close($con);
            ?>

</div>	

<?php require VIEW_ROOT . '/template/footer.php'; ?>