<?php require VIEW_ROOT . '/template/header.php'; ?>

<?php if (empty($pages)): ?>
    <p>No collections at the moment.</p>
<?php else: ?>
    <ul>
        <?php foreach($pages as $page): ?>
        <li><a href="<?php echo BASE_URL; ?>/collection.php?col=<?php echo $page['url']; ?>"><?php echo $page['title']; ?></a></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php require VIEW_ROOT . '/template/footer.php'; ?>