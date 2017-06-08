<?php require VIEW_ROOT . '/template/header.php'; ?>

<h2>Edit a collection</h2>

<form action="<?php echo BASE_URL; ?>/edit-collection.php" method="POST" autocomplete="off">
    <label for="title">
           Title
           <input type="text" name="title" id="title" value="<?php echo escape($page['title']); ?>">
    </label>
    
    <label for="url">
           URL
           <input type="text" name="url" id="url" value="<?php echo escape($page['url']); ?>">
    </label>
    
    <label for="description">
        Description
        <textarea name="description" id="description" cols="30" rows="10">
            <?php echo escape($page['description']); ?>
        </textarea>
    </label>
    
    <input type="hidden" name="id" value="<?php echo escape($page['id_collection']);?>">
    
    <input type="submit" value="Edit Collection">
</form>

<?php require VIEW_ROOT . '/template/footer.php'; ?>