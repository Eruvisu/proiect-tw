<?php require VIEW_ROOT . '/template/header.php'; ?>

<?php if(empty($pages)): ?>
    <p>No collections created.<p>
<?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>URL</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($pages as $page): ?>
                    <tr>
                        <td><?php echo escape($page['title']); ?></td>
                        <td><a href="<?php echo BASE_URL; ?>/collection.php?col=<?php echo escape($page['url']); ?>"><?php echo escape($page['url']); ?></a></td>
                        <td><a href="<?php echo BASE_URL; ?>/edit-collection.php?id=<?php echo escape($page['id_collection']); ?>">Edit</a></td>
                        <td><a href="<?php echo BASE_URL; ?>/delete.php?id=<?php echo escape($page['id_collection']); ?>">Delete</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
<?php endif; ?>

    <a href="<?php echo BASE_URL; ?>/add-collection.php">Add new collection</a>
    
<?php require VIEW_ROOT . '/template/footer.php'; ?>