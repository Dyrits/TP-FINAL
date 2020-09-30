<?php
$title = "Restaurants";
ob_start();
?>
<h1>Vos restaurants préférés</h1>
<?php
foreach ($restaurants as $restaurant) : ?>
    <h2><a href="./restaurant.php?id=<?= $restaurant['idRestaurant'] ?>"><?= $restaurant['nom'] ?></a></h2>
    <address><?= $restaurant['ville'] ?></address>
    <p><?= $restaurant['description'] ?></p>
<?php
endforeach;
$content = ob_get_clean();
require_once "./views/template.php";
?>