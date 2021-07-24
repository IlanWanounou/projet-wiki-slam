$(document).ready(function () {

    const btnClose = '<button type="button" class="close" data-dismiss="alert" aria-label="Fermer"><span aria-hidden="true">&times;</span></button>';

    $('#selectLog').change(function (e) { 
        let val = $('#selectLog').val();
        $("#search").val('');
        $.post('',
        {
            log: val
        }, function(data) {
            if (data) {
                $("#logs").html(data);
                $("#log-content").html(' ');
            }
        });
    });

    $('body').on( "click", ".open-file", function () {
        let val = $(this).attr('openTo');
        $.post('',
        {
            open: val
        }, function(data) {
            if (data) {
                $("#log-content").html(data);
            }
        });
    });

    $('body').on( "click", ".open-directory", function () {
        let val = $(this).attr('openTo');
        $("#search").val(val);
        $.post('',
        {
            log: val
        }, function(data) {
            if (data) {
                $("#logs").html(data);
                $("#log-content").html(' ');
            }
        });
    });

    $('body').on( "click", ".delete-directory", function () {
        let val = $(this).attr('deleteto');
        let elm = $(this);
        $.post('',
        {
            delete: val
        }, function(data) {
            if (data == 1) {
                deleteElm($(elm), val);
                
            } else {
                $('.alerts').html('<div class="alert alert-dismissible alert-danger" role="alert"><b>Echec :</b> Une erreur est survenue lors de la suppression' + btnClose + '</div>');
            }
        });
    });

    $('body').on( "click", ".delete-file", function () {
        let val = $(this).attr('deleteto');
        let elm = $(this);
        $.post('',
        {
            delete: val
        }, function(data) {
            console.log(data);
            if (data == 1) {
                deleteFile($(elm));
            } else {
                $('.alerts').html('<div class="alert alert-dismissible alert-danger" role="alert"><b>Echec :</b> Une erreur est survenue lors de la suppression' + btnClose + '</div>');
            }
        });
    });

    function deleteFile(elm) {
        let parent = $(elm).parent().parent().parent();
        $(parent).fadeOut("slow", function() {
            $(parent).remove();
            $('.alerts').html('<div class="alert alert-dismissible alert-success" role="alert">Ce fichier de journalisation vient d\'être supprimé' + btnClose + '</div>');
        });
    }

    function deleteElm(elm, val) {
        let parent = $(elm).parent().parent().parent();
        $(parent).fadeOut("slow", function() {
            $(parent).remove();
            $('.alerts').html('<div class="alert alert-dismissible alert-success" role="alert">Les fichiers de journalisation du <b>' + val + '</b> ont été supprimé' + btnClose + '</div>');
        });
        updateList();
    }

    function updateList() {
        $('#select').load(document.URL + ' #selectLog');
    }

    let spinner = '<div class="spinner-grow" role="status"></div><p> Chargement ...</p>';

    $('#search').keyup(function (e) { 
        let val = $(this).val();
        $("#logs").html(spinner);
        $('#selectLog').val('');
        $.post('',
        {
            search: val
        }, function(data) {
            if (data) {
                $("#logs").html(data);
                $("#log-content").html(' ');
            }
        });
    });
});
