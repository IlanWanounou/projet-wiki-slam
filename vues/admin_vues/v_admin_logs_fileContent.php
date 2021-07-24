<textarea id="code-file"><?= $content; ?></textarea>
<script>
    $(document).ready(function () {
        function pushEditor() {
            var editor = CodeMirror.fromTextArea(document.getElementById("code-file"), {
                lineNumbers: true,
                styleActiveLine: true,
                matchBrackets: true,
                theme: 'ayu-dark',
                readOnly: true
            });
            editor.setSize(null,510);
        }
        pushEditor();
    });
</script>
