<?php
$title = "Restaurants";
?>
<h1><?= $restaurant['nom'] ?></h1>
<address><?= $restaurant['adresse']."<br>".$restaurant['cp']." ". $restaurant['ville']."<br>".$restaurant['telephone'] ?></address>
<h2>Description</h2>
<p><?= $restaurant['description'] ?></p>
<h2>Avis</h2>
<?php foreach ($avis as $avis_) :?>
    <p>
        <span><?= $avis_['auteur'] ? $avis_['auteur'] : "<i>Anonyme</i>" ?> : </span>
        <span>
            <?php for($star = 0; $star < 5; $star ++) :
                if ($star < $avis_['note']) : ?>
                    <i class="fas fa-star"></i>
                <?php else : ?>
                    <i class="far fa-star"></i>
                <?php
                endif;
            endfor;
            ?>
        </span>
    </p>
    <p><?= $avis_['commentaire'] ?></p>
<?php endforeach; ?>
