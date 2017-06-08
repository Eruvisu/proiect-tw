<?php
session_start();
?>
<?php require VIEW_ROOT . '/template/header.php'; ?>
<div id="content">
    <?php include("$the_content");?>
</div>
<?php require VIEW_ROOT . '/template/footer.php'; ?>