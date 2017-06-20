<?php require VIEW_ROOT . '/template/header.php'; ?>

    <h2>Edit an artefact</h2>

    <form action="<?php echo BASE_URL; ?>/edit-artefact.php" method="POST" enctype="multipart/form-data" autocomplete="on">
        <label for="artefact_name">
            Artefact Name
            <input type="text" name="artefact_name" id="artefact_name" value="<?php echo escape($artefact['artefact_name']); ?>">
        </label>

        <label for="period">
            Period
            <input list="period" value="<?php echo escape($artefact['period']); ?>" name="period" /></label>
        <datalist id="period">
            <?php foreach($periods as $period): ?>
            <option value="<?php echo $period['period'] ?>">
                <?php endforeach; ?>
        </datalist>

        <label for="time_period">
            Date
            <input type="number" name="time_period" id="time_period" value="<?php echo escape($artefact['time_period']); ?>">
        </label>

        <label for="time_era">
            Era
            <select name="time_era">
                <option value="BC" <?php $artefact['time_era'] == 'BC' ? 'selected="selected"' : ''; ?>>BC</option>
                <option value="AD" <?php $artefact['time_era'] == 'AD' ? 'selected="selected"' : ''; ?>>AD</option>
            </select>
        </label>

        <label for="geo_position">
            Geography
            <input type="text" name="geo_position" id="geo_position" value="<?php echo escape($artefact['geo_position']); ?>">
        </label>

        <label for="material">
            Material
            <input list="material" value="<?php echo escape($artefact['material']); ?>" name="material" /></label>
        <datalist id="material">
            <?php foreach($materials as $material): ?>
            <option value="<?php echo $material['material'] ?>">
                <?php endforeach; ?>
        </datalist>

        <label for="classification">
            Classification
            <input list="classification" value="<?php echo escape($artefact['classification']); ?>" name="classification" /></label>
        <datalist id="classification">
            <?php foreach($classifications as $classification): ?>
            <option value="<?php echo $classification['classification'] ?>">
                <?php endforeach; ?>
        </datalist>

        <label for="file">
            Upload a picture
            <input type="file" name="file">
        </label>

        <label for="description">
            Description
            <textarea name="description" id="description" cols="30" rows="10">
                <?php echo escape($artefact['description']); ?>
            </textarea>
        </label>

        <input type="hidden" name="id_collection" value="<?php echo escape($id_collection);?>">
        <input type="hidden" name="url_collection" value="<?php echo escape($url_collection);?>">
        <input type="hidden" name="id_artefact" value="<?php echo escape($id_artefact);?>">

        <input type="submit" value="Edit Artefact">
    </form>

<?php require VIEW_ROOT . '/template/footer.php'; ?>