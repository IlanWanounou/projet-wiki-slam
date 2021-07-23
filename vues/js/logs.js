$(document).ready(function () {
    $('#selectLog').change(function (e) { 
        let val = $('#selectLog').val();
        $.post('',
        {
            log: val
        }, function(data) {
            if (data) {
                $("#logs").html(data);
            }
        });
    });
    var editor;
    
    editor = CodeMirror.fromTextArea(document.getElementById("logInfo"), {
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
});
