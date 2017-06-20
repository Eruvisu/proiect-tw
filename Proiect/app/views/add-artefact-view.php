<?php require VIEW_ROOT . '/template/header.php'; ?>

    <h2>Add an artefact</h2>

    <form action="<?php echo BASE_URL; ?>/add-artefact.php" method="POST" enctype="multipart/form-data" autocomplete="off">
        <label for="artefact_name">
            Artefact Name
            <input type="text" name="title" id="title">
        </label>

        <label for="Period">
            Period
            <input list="period" name="period" /></label>
            <datalist id="period">
                <?php foreach($periods as $period): ?>
                <option value="<?php $period['period'] ?>">
                <?php endforeach; ?>
            </datalist>

        <label for="description">
            Description
            <textarea name="description" id="description" cols="30" rows="10"></textarea>
        </label>

        <input type="hidden" name="id_collection" value="<?php echo escape($id_collection);?>">
        <input type="hidden" name="url_collection" value="<?php echo escape($url_collection);?>">

        <input type="submit" value="Add Artefact">
    </form>

<?php require VIEW_ROOT . '/template/footer.php'; ?>