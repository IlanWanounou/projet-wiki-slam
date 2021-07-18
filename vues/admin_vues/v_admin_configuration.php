<form method="post">
    <div class="form-group">
        <label for="form-favicon">Favicon</label>
        <button type="button" id="form-favicon" class="btn btn-primary btn-sm">Modifier</button>
        <button type="button" id="form-delete" class="btn btn-danger btn-sm" disabled>Supprimer</button>
        <img id="preview" src="/favicon.ico" class="border bg-light">
        <input id='fileid' accept=".ico" type='file' hidden/>
    </div>
    <button type="submit" class="btn btn-primary mb-2" disabled>Envoyer</button>
</form>
