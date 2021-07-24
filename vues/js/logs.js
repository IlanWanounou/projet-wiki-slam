$(document).ready(function () {
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

    $('#search').keyup(function (e) { 
        let val = $(this).val();
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
