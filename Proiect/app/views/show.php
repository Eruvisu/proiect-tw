<?php require VIEW_ROOT . '/template/header.php'; ?>

    <?php if(!$page): ?>
        <p>No page found!</p>
    <?php else: ?>
        <h2><?php echo escape($page['title']); ?></h2>
        
        <?php echo escape($page['description']); ?>
        
        <p class="faded">Created on <?php echo $page['created']->format('jS M Y'); ?></p>
        <?php if($page['updated']): ?>
            Last updated on <?php echo $page['updated']->format('jS M Y'); ?>
        <?php endif; ?>
    <?php endif; ?>
            
<p>Artefacte:</p>

            

<?php require VIEW_ROOT . '/template/footer.php'; ?>