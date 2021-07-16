<body>
<div class='container'>


    <h1 class="text-center">Creation d'une définition</h1>

            <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
                <br class="px-2">
                    <form method="post" class="justify-content-center">
                        <div class="form-group">
                            <label for="form-titre">Titre</label>

                            <input name="titre" id="form-titre" type="text" class="form-control" placeholder="Titre" required>
                        </div>
                        <div class="form-group">
                            <label for="form-contenue">Contenue</label>

                            <textarea  type="text" name="contenue" placeholder="contenu" id="form-contenue" class="form-control" rows="3" cols="30" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="form-intro">Phrase d'intro</label>
                            <textarea  type="text" name="intro" placeholder="Intro" id="form-intro" class="form-control" rows="3" cols="30" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="form-image">Image</label>
                            <input  type="file" accept="image/*" name="intro" placeholder="Intro" id="form-image" class="form-control" rows="3" cols="30" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg">Envoyer</button>

                    </form>
                <?php
                if (isset($success) && $success) {
                    ?>
                    <H1> test </H1>
                <?php } ?>
                </div>
            </div>
</body>



<?php $meta['title'] = 'Se connecter';
$meta['css'] = ['bootstrap.min.css', 'fontawesome.all.min.css', 'login.css'];
$meta['js'] = ['jquery-3.6.0.min.js', 'bootstrap.min.js'];
require_once(__DIR__ . '/../../vues/v_header.php');
?>

