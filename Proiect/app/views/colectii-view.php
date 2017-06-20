<?php
session_start();
require VIEW_ROOT . '/template/header.php'; ?>

<article>
<?php if (empty($pages)): ?>
    <p>No collections at the moment.</p>
<?php else: ?>
    <article>
    <div class="artefacteTitle">
        <h class="first"> ARTIFACTS COLLECTIONS</h>
    </div>

        <?php foreach($pages as $page): ?>
            <div class="categorii">
                <a href="<?php echo BASE_URL; ?>/collection.php?col=<?php echo $page['url']; ?>"><h2><?php echo $page['title']; ?></h2></a>

            <p><?php echo $page['description']; ?></p>
            </div>
        <?php endforeach; ?>
<?php endif; ?>
    </article>
<?php require VIEW_ROOT . '/template/footer.php'; ?>
