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
        <?php echo '<p>Artefacte:</p>'; ?>
    <?php endif; ?>

    <?php if(empty($artefacts)): ?>
        <p>No artefacts created.<p>
    <?php else: ?>
        <table>
            <tbody>
            <?php foreach($artefacts as $artefact): ?>
                <tr>
                    <td><a href="<?php echo BASE_URL; ?>/artefact.php?id=<?php echo escape($artefact['id_artefact']); ?>"><?php echo escape($artefact['artefact_name']); ?></a></td>
                    <td><a href="<?php echo BASE_URL; ?>/edit-artefact.php?idcol=<?php echo escape($page['id_collection']); ?>&id= <?php echo escape($artefact['id_artefact']); ?>">Edit</a></td>
                    <td><a href="<?php echo BASE_URL; ?>/delete-artefact.php?id=<?php echo escape($artefact['id_artefact']); ?>">Delete</a></td>
                </tr>
            <?php endforeach; ?>
                <tr>
                    <td><a href="<?php echo BASE_URL; ?>/add-artefact.php?idcol=<?php echo escape($page['id_collection']); ?>">Add new artefact</a></td>
                </tr>
            <tr>
                <td><a href="<?php echo BASE_URL; ?>/serialize-artefacts.php?idcol=<?php echo escape($page['id_collection']); ?>">Serializeaza artefactele</a></td>
            </tr>
            </tbody>
        </table>
    <?php endif; ?>

<?php require VIEW_ROOT . '/template/footer.php'; ?>