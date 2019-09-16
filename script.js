
$(document).ready(function() {

    $('form').submit(function (event) {
        event.preventDefault();

        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                $(".table").load('index.php #tab');
                $('.form-control').val('');
            },
            error: function (response) { // Данные не отправлены
                alert('Данные не отправлены');
            }

        });

    });

});

