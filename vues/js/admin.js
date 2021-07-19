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
    $('body').on( "click", "#form-maintenance-on", function() {
        let isExecuted = confirm("Êtes vous sur de vouloir mettre en maintenance le site ?");
        if (isExecuted) {
            call('danger');
        }
    });
    $('body').on( "click", "#form-maintenance-off", function() {
        let isExecuted = confirm("Êtes vous sur de vouloir désactiver la maintenance sur le site ?");
        if (isExecuted) {
            call('info');
        }
    });

    function call(bgColor) {
        var btn = '<button class="btn btn-' + bgColor + ' btn-sm" type="button" disabled>';
        btn    += '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>';
        btn    += ' Chargement...';
        btn    += '</button>';

        $('.form-maintenance').replaceWith(btn);
        $.post('',
        {
            maintenance: 'toggle'
        }, function(data) {
            load(), 2000;
        });
    }

    function load() {
        $('.form-group.maintenance').load(document.URL + ' .form-group.maintenance > div');
    }

});


