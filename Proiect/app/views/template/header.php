<!DOCTYPE html>
<html>
    <head>
        <?php if(!isset($the_title)) $the_title="Artefacty"; ?>
        <title><?php echo do_html_title($the_title); ?></title>
        <!-- Stylesheets -->
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <meta charset="UTF-8">
    </head>
    <body>
        <div class="container">
            <div>
                <?php echo do_topbar(); ?>
            </div>
            <header>
                <h1 id="title">Artifacty</h1>
            </header>
            <div class="sidebar">
                <?php echo do_sidebar(); ?>
            </div>
            <div class="searchbar">
                <?php echo do_searchbar(); ?>
            </div>