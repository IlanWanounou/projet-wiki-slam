$(document).ready(function () {
    $('#form-favicon').click(function(){
        $("#fileid").click();
    });
    fileid.onchange = evt => {
        const [file] = fileid.files
        if (file) {
            preview.src = URL.createObjectURL(file)
            $('#form-delete').removeAttr('disabled');
        }
        fileid.value = '';
    }
    $('#form-delete').click(function(){
        preview.src = '/favicon.ico';
        $('#form-delete').attr('disabled', '');
    });
});


