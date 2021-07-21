<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.5.0/styles/hybrid.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.5.0/highlight.min.js"></script>
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<div class='container'>


    <h1 class="text-center">Edition de l'article <?= $_GET['article']?> - <?= htmlspecialchars($allContent['titre'])?> </h1>
    <?php
    if(!$allContent['deleted_at']) {
        ?>
    <h3 class="text-center">L'article est actuellement en ligne</h3>
    <?php } else { ?>
        <h3 class="text-center">L'article est actuellement hors ligne</h3>
  <?php  }?>

    <form method="post" id="creationForm" enctype="multipart/form-data" class="justify-content-center">
        <?php if (isset($result)) {
            echo ($result); } ?>
        <div class="form-group">
            <label for="form-titre">Titre</label>

            <input name="titre" id="form-titre" value="<?= $allContent['titre']?>" type="text" class="form-control" placeholder="Titre" required>
        </div>
        <div class="form-group">
            <label>Contenue</label>
            <div class="editor">
                <?= $allContent['contenue']?>
            </div>
        </div>
        <div class="form-group">
            <label for="form-intro">Phrase d'intro</label>
            <textarea  name="intro" placeholder="Intro" id="form-intro" class="form-control" rows="3" cols="30" required><?= $allContent['phrase_intro']?>
            </textarea>
        </div>
        <?php if(Article\ArticleCarousel::getStatusCode('/public/images/uploads/' . $allContent['image']) !== 404) {?>
        <img class="col-md-4 p-2 grey" src="/public/images/uploads/<?= $allContent['image'] ?>" >
<?php } ?>
        <div class="form-group">
            <label for="form-image">Changer d'image</label>
            <input  type="file" accept="image/*" name="image" id="form-image" class="form-control">
        </div>
        <input class="form-group" type="hidden" id="content" name="contenue">
        <button type="submit" class="btn btn-primary btn-lg">Editer</button>

    </form>
</div>
