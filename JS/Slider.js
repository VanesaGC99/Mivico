$(document).ready(function slider(arrayImagenes){
    var cuatroImagenes = [];
    var posicionesElegibles = [];
    var i,r;
    for(i = 0; i<arrayImagenes.length; i++){
        posicionesElegibles[i] = i;
    }
    for(i = 0; i < 4; i++){
        r = Math.floor(Math.random()* posicionesElegibles.length);
        cuatroImagenes.push(arrayImagenes[posicionesElegibles[r]]);
        posicionesElegibles.splice(r,1);
    }
    console.log(cuatroImagenes.toString());
});