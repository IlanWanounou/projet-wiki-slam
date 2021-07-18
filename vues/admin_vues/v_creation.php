<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.5.0/styles/hybrid.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.5.0/highlight.min.js"></script>
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<body>
<div class='container'>


    <h1 class="text-center">Ajout d'un article</h1>


        <form method="post" id="creationForm" enctype="multipart/form-data" class="justify-content-center">
            <div class="form-group">
                <label for="form-titre">Titre</label>

                <input name="titre" id="form-titre" type="text" class="form-control" placeholder="Titre" required>
            </div>
            <div class="form-group">
                <label>Contenue</label>
                <div class="editor">
                    Contenue de la page.
                </div>
            </div>
            <div class="form-group">
                <label for="form-intro">Phrase d'intro</label>
                <textarea  type="text" name="intro" placeholder="Intro" id="form-intro" class="form-control" rows="3" cols="30" required></textarea>
            </div>
            <div class="form-group">
                <label for="form-image">Image</label>
                <input  type="file" accept="image/*" name="image" id="form-image" class="form-control"required>
            </div>
            <input type="hidden" id="content" name="contenue">
            <button type="submit" class="btn btn-primary btn-lg">Ajouter</button>

        </form>
    </div>
</body>


