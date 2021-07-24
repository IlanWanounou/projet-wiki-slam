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
});
