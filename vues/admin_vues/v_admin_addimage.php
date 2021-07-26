<h1 class="text-center">Ajoute d'une image</h1>

<form method="POST"  enctype="multipart/form-data" action="/admin/images">
    <div class="form-group">
    <input accept="image/*" type='file' name="image" id="img" required />
    </div>
    <div class="form-group">
    <img width="160px"  id="prew" src="#" alt="Aucune image selectioner" />
    </div>
    <div class="form-group">
    <button class="btn btn-primary btn-lg" type="submit">Ajouter</button>
    </div>
</form>
