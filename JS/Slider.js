$(document).ready(function(){
    var imgItems = $('#slider img').length;
    var posImg = 1;


    $('#slider img').hide();
    $('#slider img:first').show();

    //Ejecutamos las funciones de las flechas
    $('.left img').click(prevImg);
    $('.right img').click(nextImg);

    //Cambio automático de imagen
    setInterval(function(){
        nextImg();
    },3000);

    //----FUNCIONES----
    function nextImg(){
        if(posImg >= imgItems){
            posImg =1;
        }
        else{
            posImg++;
        }
        console.log(posImg);
        $('#slider img').hide();
        $('#slider img:nth-child('+ posImg +')').fadeIn();
    }
    function prevImg(){
        if(posImg <= 1){
            posImg=imgItems;
        }
        else{
            posImg--;
        }
        
        $('#slider img').hide();
        $('#slider img:nth-child('+ posImg +')').fadeIn();

    }
});