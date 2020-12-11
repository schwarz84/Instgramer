

var url       = 'http://instgramer.com';
// var cuenta;
// var resultado;


window.addEventListener("load", function(){

    // Primero Cambio el cursor cuando pasa sobre el like
    $('.btn-like').css('cursor', 'pointer');
    $('.btn-dislike').css('cursor', 'pointer');
    // Le doy el valor a la variable
    // cuenta = $('#cuenta').data('cuenta');
    // cuenta = $('.resta-like').data('cuenta');
    // resultado = $('.resta-like').data('resultado');

    function like() {
        // Creo la funcion del click
        $('.btn-like').unbind('click').click(function() {

            // Le agrego la clase nueva y le remuevo la vieja esto es para cuando lo agrege a la base de datos
            // $('#cuenta').load('home.blade.php');
            $(this).addClass('btn-dislike').removeClass('btn-like');
            // Hago lo mismo para el contador de Likes
            // $('.suma-like').addClass('resta-like').removeClass('suma-like');

            // Modifico la imagen en el DOM
            $(this).attr('src', url + '/images/favorite-red.png');
            // console.log($(this));

            // Peticion con Ajax
            $.ajax({
                url: url + '/like/' + $(this).data('id'),
                type: 'GET',
                success: function (response) {

                    // var variable_post = $('.cuenta-like')


                }
            });


            dislike();

            location.reload(true);
            // $('#cuenta').text($('.suma-like').data('cuenta'));
        });
    }
    like();

    function dislike() {

        $('.btn-dislike').unbind('click').click(function () {


            // $('#cuenta').load('home.blade.php');
            // console.log("Mañana mandame un mensaje");
            $(this).addClass('btn-like').removeClass('btn-dislike');
            //
            // $('.resta-like').addClass('suma-like').removeClass('resta-like');
            // Aca remplazo el valor del data-resultado para que sea la guia
            // Modificao la imagen el el DOM
            $(this).attr('src', url + '/images/favorite-black.png');


            $.ajax({
                url: url + '/dislike/' + $(this).data('id'),
                type: 'GET',
                success: function (response) {

                    // cuenta = cuenta - 1;

                    // $('.'+$('.suma-like').data('id')).text(cuenta);
                }
            });
            like();
            location.reload(true);

        });
    }
    dislike();

    $('#buscador').submit(function() {
       $(this).attr('action', url + '/gente/' + $('#buscador #search').val());
    });

});
