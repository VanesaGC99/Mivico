$(document).ready(function(){
    $(".like").click(function(){
        var id = this.id;
        $.ajax({
            
            url: '../PHP/Funciones/Like.php',
            type: 'POST',
            data: {id:id},
            dataType: 'json',

            success:function(data){
                var likes = data['likes'];
                var text = data['text'];

                console.log("texto " +text);
                $("#"+id).html(text);
            }
        });
    });
});