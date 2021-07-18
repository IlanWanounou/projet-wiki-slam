$(document).ready(function () {
    $('#form-favicon').click(function(){
        $("#fileid").click();
    });
    fileid.onchange = evt => {
        const [file] = fileid.files
        if (file) {
            preview.src = URL.createObjectURL(file)
            $('#form-favicon-delete').removeAttr('hidden');
            $('#form-favicon-push').removeAttr('hidden');
            $('#fav-prev-msg').html('Prévisualisation du favicon : ');
        }
    }
    $('#form-favicon-delete').click(function(){
        preview.src = '/favicon.ico';
        $('#form-favicon-delete').attr('hidden', '');
        $('#form-favicon-push').attr('hidden', '');
        fileid.value = '';
        $('#fav-prev-msg').html('Favicon actuel : ');
    });
    $('#form-maintenance-on').click(function() {
        let isExecuted = confirm("Êtes vous sur de vouloir mettre en maintenance le site ?");
    })

});


