<?php $title = "Restaurants"; ?>
<h1>Vos restaurants préférés</h1>
<?php
foreach ($restaurants as $restaurant) : ?>
    <h2><a href="./index.php?id=<?= $restaurant['idRestaurant'] ?>&action=details"><?= $restaurant['nom'] ?></a></h2>
    <address><?= $restaurant['ville'] ?></address>
    <p><?= $restaurant['description'] ?></p>
<?php endforeach; ?>