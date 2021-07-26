<?php if (isset($resultAdd)) {
    echo ($resultAdd); } ?>


<h1>Gestion des images</h1>
<span><?= $taileActuel.'ko sur '.DIRECTORY_IMAGE_MAXSIZE.' ko'?></span>
<?php if($taileActuel<DIRECTORY_IMAGE_MAXSIZE) { ?>
    <div class="progress">
        <div class="progress-bar" role="progressbar" style="width: <?= $taileActuel*100/$taileMax?>%" aria-valuenow="<?= $taileActuel ?>" aria-valuemin="0" aria-valuemax="<?= $taileMax ?>"></div>
    </div>
    <a href="images/add" class="btn btn-primary btn-lg  mt-3">Ajouter une image</a>
<?php }else {?>
    <div class="progress">
        <div class="progress-bar bg-danger" role="progressbar" style="width: <?= $taileActuel*100/$taileMax?>%" aria-valuenow="<?= $taileActuel ?>" aria-valuemin="0" aria-valuemax="<?= $taileMax ?>"></div>
    </div>
    <a href="/images/add" class="btn btn-primary btn-lg  mt-3" disabled>Ajouter une image</a>

<?php

}
if($isEmpty) {?>
    <a onclick="return confirm('Voulez vous vraiment supprimer toutes les images?')" href="?deleteAll=<?=$folder ?>" class="btn btn-danger btn-lg mt-3">Supprimer toutes les images</a>
<?php } else { ?>
    <button id="deleteAllImage" class="btn btn-danger btn-lg mt-3"  disabled >Supprimer toutes les images</button>
<?php }
     ?>   <div class="col-lg-4 col-md-6 mb-4">
    <?php
?>
</div>


    <div class="row">
        <?php foreach ($allImages as $image) {
            if($image != '.' && $image != '..') {?>
        <div class="col-md-3 p-2 grey">
            <div class="card">
                <a target="_blank" href="/public/images/uploads/<?=$image ?>"><img class="card-img-top" src="/public/images/uploads/<?=$image ?>" alt=""></a>
                <div class="btn-group pt-1" role="group" >
                <a href="/public/images/uploads/<?=$image ?>" target="_blank" class="btn btn-primary">Afficher</a>
                <a onclick="return confirm('Voulez vous vraiment supprimer cette image?')" href="?delete=<?=$image ?>" class="btn btn-danger">Supprimer</a>
                </div>

        </div>

        </div>
        <?php }
        }
        ?>
    </div>
<?php
