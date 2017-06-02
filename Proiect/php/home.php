<?php
session_start();
include_once 'dbconnect.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <link rel="stylesheet" href="../css/styles.css">
    <meta charset="UTF-8">
</head>


<body>

    <div class="container">

        <ul class="topbar">
            <?php if(isset($_SESSION['usr_id'])){
                ?>
            }
            <li class="topbar"><a class="topbar" href="">Signed in as <?php echo $_SESSION['username']; ?></a>
            </li>
            <li class="topbar"><a class="topbar" href="logout.php">Log out</a></li>

            <?php }else { ?>
            <li class="topbar"><a class="topbar" href="login.php">Sign In</a></li>
            <li class="topbar"><a class="topbar" href="register.php">Register</a>
            </li>
            <?php } ?>
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
            <h1 id="first">Artifacty</h1>
            <p>Sa se dezvolte o aplicatie Web ce realizeaza managementul informatiilor privitoare la colectii de artefacte arheologice, structurate pe tipuri, roluri, conform localizarii geografice etc.</p>
            <p>Pentru fiecare artefact, pot fi atasate diverse meta-date -- e.g., autor (daca exista), licenta de utilizare, valoare, termeni-cheie (tag-uri) etc.</p>
            <p>De asemenea, pot exista diverse relatii intre anumite artefacte (de exemplu, o colectie a obiectelor de cult din India are drept cumparatori membri ai clasei "samurai" apartinind totodata si clasei "magnati industriali"). </p>
            <p>Se vor oferi situatii statistice referitoare la resursele stocate -- de pilda, toate artefactele de tip masca mortuara descoperite in secolul XX in Africa ori cele care nu au fost inca datate/cercetate.</p>
            <p>Datele procesate vor putea fi importate/exportate si via documente in formatele CSV, JSON si XML.</p>
            <p>Bonus: recurgerea la servicii cartografice pentru ilustrarea localizarii geografice a fiecarui artefact.</p>

        </article>



        <footer>Copyright &copy; Proiect TW</footer>

    </div>
    </div>

</body>

</html>
