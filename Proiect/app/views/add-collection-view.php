<?php require VIEW_ROOT . '/template/header.php'; ?>

<h2>Add a collection</h2>

<form action="<?php echo BASE_URL; ?>/add-collection.php" method="POST" autocomplete="off">
    <label for="title">
           Title
           <input type="text" name="title" id="title">
    </label>
    
    <label for="url">
           URL
           <input type="text" name="url" id="url">
    </label>
    
    <label for="description">
        Description
        <textarea name="description" id="description" cols="30" rows="10"></textarea>
    </label>
    
    <input type="submit" value="Add Collection">
</form>

<?php require VIEW_ROOT . '/template/footer.php'; ?>