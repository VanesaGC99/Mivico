$(document).ready(function(){

    //Botón de acción del acordeón
    $('.botonMenu').click(function(){
        
        //Eliminar la clase on de todos los botones
        $('.botonMenu').removeClass('on');

        //Plegamos todo el contenido 
        $('.contenidoMenu').slideUp('slow');

        //Si el siguiente slide no esta abierto lo abrimos
        if($(this).next().is(':hidden') == true){

            //Añade la clase on en el boton
            $(this).addClass('on');

            //Abre el slide
            $(this).next().slideDown('slow');
        }
    });

    //Cerramos todo el contenido al cargar la página
    $('.contenidoMenu').hide();
});