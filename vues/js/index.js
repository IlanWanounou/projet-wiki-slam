    window.onload = function () {
    var toolbarOptions = [
        ['bold', 'italic', 'underline', 'strike'],
        ['blockquote', 'code-block', 'image'],

        [{ 'header': 1 }, { 'header': 2 }],
        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
        [{ 'script': 'sub'}, { 'script': 'super' }],
        [{ 'indent': '-1'}, { 'indent': '+1' }],

        [{ 'size': ['small', false, 'large', 'huge'] }],
        [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

        [{ 'color': [] }, { 'background': [] }],
        [{ 'align': [] }],

        ['clean']
    ]

    window.hljs.configure({   // optionally configure hljs
        languages: ['javascript', 'php', 'css', 'html', 'sql', 'c#', 'c++']
    });
    var quill = new Quill('.editor', {
        modules: {
            syntax: true,              // Include syntax module
            toolbar: toolbarOptions
        },
        theme: 'snow'


    });
    document.getElementById('creationForm').addEventListener('submit', function(){
        document.getElementById('content').value=quill.root.innerHTML;
        })
}


