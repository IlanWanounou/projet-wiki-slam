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

    const initFooter1 = $('#footer-content-1').val();
    const initFooter2 = $('#footer-content-2').val();

    $('.form-group.footer input').keyup(function (e) {
        verifFooter();
    });
    document.getElementById('footer-form').addEventListener('reset', resetFooter);

    function verifFooter() {
        if ($('#footer-content-1').val() == initFooter1 && $('#footer-content-2').val() == initFooter2) {
            resetFooter();
        } else {
            $('#send-footer-content').removeAttr('disabled');
            $('#reset-footer-content').removeAttr('disabled');
        }
    }
    
    var editor = CodeMirror.fromTextArea(document.getElementById("myTextArea"), {
        lineNumbers: true,
        styleActiveLine: true,
        matchBrackets: true,
        mode: 'css',
        theme: 'ayu-dark',
        indentUnit: 4
    });
    $('body').on('DOMSubtreeModified', '.CodeMirror-code', function() {
        verifCss();
    });

    const initCodeCss = $('.CodeMirror-code').html();

    function verifCss() {
        if ($('.CodeMirror-code').html() == initCodeCss) {
            resetCss();
        } else {
            $('#send-css-content').removeAttr('disabled');
            $('#reset-css-content').removeAttr('disabled');
        }
    }

    $('#send-css-content').click(function() {
        alert(editor.getValue());
    })
    
    
});
function resetFooter() {
    $('#send-footer-content').attr('disabled', '');
    $('#reset-footer-content').attr('disabled', '');
}
function resetCss() {
    $('#send-css-content').attr('disabled', '');
    $('#reset-css-content').attr('disabled', '');
}


