$(document).ready(function(){
    $(".like").click(function(){
        var id = this.id;
        
        $.ajax({
            url: '../PHP/Funciones/like.php',
            type: 'post',
            data: {id:id},
            dataType:'json',

            success:function(data){
                var text = data['text'];
                var count = data['likes'];
                
                $("#"+id).html(text);
            }
        });
    });
});