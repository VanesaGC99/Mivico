//Constantes para almacenar todos los elementos del formulario
const formulario = document.getElementById("formulario");
const inputs = document.querySelectorAll("#formulario input");

//Constante para almacenar las expresiones regulares de cada input
const expresiones ={
    nombre:/^[A-Za-zÁ-ÿ\s]{2,45}$/,
    apellido:/^[A-Za-zÁ-ÿ\s]{2,45}$/,
    usuario:/^[A-Za-z1-9]{6,20}$/,
    password:/^(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&€¿?¡#])[A-Za-z\d$@$!%*?&]{8,45}$/,
    dni:/^\d{8}[A-Z]{1}$/,
    email:/\S+@\S+\.\S+/,
    codigoP:/([0-5][0-9][0-9][0-9][0-9])/,
    telefono:/^(6|7)[0-9]{8}$/,
    direccion:/^[A-Za-zÁ-ÿ\s]{2,150}$/,
    
    titulo: /^[A-Za-zÁ-ÿ\s]{2,45}$/,
    compañia: /^[A-Za-zÁ-ÿ\s]{2,45}$/,
    Publicacion: /^\d{4}\-\d{2}\-\d{2}$/,
    descripcion: /^[A-Za-zÁ-ÿ\s]{2,1000}$/,
    imagen: /^[A-Za-zÁ-ÿ0-9\s\.]{2,45}$/,

    lanzamiento: /^\d{4}\-\d{2}\-\d{2}$/, 
    logo: /^[A-Za-zÁ-ÿ0-9\s\.]{2,45}$/,
    precio: /^\d{1,5}\,\d{2}$/,
    stock: /^\d{2,200}$/,
}

//Constante para saber si se ha validado correctamente el formulario
const validado = {
    nombre: false,
    apellido1: false,
    apellido2: false,
    usuario: false,
    password: false,
    rePassword: false,
    dni: false,
    email: false,
    codigoP: false,
    telefono: false,
    provincia: false,
    comunidadA: false,

    titulo: false,
    compañia: false,
    publicacion:false,
    descripcion:false,
    imagen: false,

    lanzamiento: false,
    logo:false,
    precio:false,
    stock:false,

}
//campos pulsados 

let camposvalidados = 0;
//codigo postal de cada provincia
const codigopostal = {
    01: "\u00C1lava", 02: "Albacete", 03: "Alicante", 04: "Almer\u00EDa", 05: "\u00C1vila", 06: "Badajoz", 07: "Baleares", 08: "Barcelona", 09: "Burgos", 10: "C\u00E1ceres",
    11: "C\u00E1diz", 12: "Castell\u00F3n", 13: "Ciudad Real", 14: "C\u00F3rdoba", 15: "Coruña", 16: "Cuenca", 17: "Gerona", 18: "Granada", 19: "Guadalajara", 20: "Guip\u00FAzcoa",
    21: "Huelva", 22: "Huesca", 23: "Ja\u00E9n", 24: "Le\u00F3n", 25: "Lleida", 26: "La Rioja", 27: "Lugo", 28: "Madrid", 29: "M\u00E1laga", 30: "Murcia",
    31: "Navarra", 32: "Orense", 33: "Asturias", 34: "Palencia", 35: "Las Palmas", 36: "Pontevedra", 37: "Salamanca", 38: "Tenerife", 39: "Cantabria",40: "Segovia",
    41: "Sevilla", 42: "Soria", 43: "Tarragona", 44: "Teruel", 45: "Toledo", 46: "Valencia", 47: "Valladolid", 48: "Vizcaya", 49:"Zamora", 50: "Zamora",
    51: "Ceuta", 52: "Melilla", 
}

const autonomias = {
    Almer\u00EDa: "Andalucía", C\u00E1diz: "Andalucía", C\u00F3rdoba: "Andalucía", Granada: "Andalucía", Huelva: "Andalucía", Ja\u00E9n: "Andalucía", M\u00E1laga: "Adalucía", Sevilla: "Andalucía", 
    Huesca: "Aragón", Teruel: "Aragón", Zaragoza: "Aragón", Asturias: "Asturias", Baleares: "Islas Baleares", LasPalmas: "Islas Canarias", Tenerife: "Islas Canarias", Cantabria: "Cantabria",
    Ávila: "Castilla y León", Burgos: "Castilla y León", León: "Castilla y León", Palencia: "Castilla y León",Salamanca: "Castilla y León", Segovia: "Castilla y León", 
    Soria: "Castilla y León", Valladolid: "Castilla y León", Zamora: "Castilla y León", Albacete: "Castilla-La Mancha", CiudadReal: "Castilla-La Mancha", Cuenca:"Castilla-La Mancha",
    Guadalajara: "Castilla-La Mancha", Toledo: "Castilla-La Mancha", Barcalona: "Cataluña", Girona: "Cataluña", Lleida: "Cataluña", Tarragona: "Cataluña", Alicante: "Comunidad Valenciana",
    Castellón: "Comunidad Valenciana", Valencia: "Comunidad Valenciana", Badajoz: "Extremadura", Cáceres: "Extremadura", Coruña: "Galicia", Lugo: "Galicia", Ourense: "Galicia", 
    Pontevedra: "Galicia", Madrid: "Comunidad de Madrid", Murcia: "Región de Murcia", Navarra: "Comunidad Floral de Navarra", Álava: "País Vasco", Bizkaia: "País Vasco", Guipuzkoa: "País Vasco",
    LaRioja: "La Rioja", Ceuta: "Ceuta", Melilla: "Melilla",
}
//Funcion tipo flecha para validar cada input según su nombre
const validarFormulario = (e) =>{
    switch (e.target.name){
        case "nombre":
            validarCampo(expresiones.nombre, nombre.value, 'nombre');
        break;
        case "apellido1":
            validarCampo(expresiones.apellido, apellido1.value, 'apellido1');
        break;
        case "apellido2":
            validarCampo(expresiones.apellido, apellido2.value, 'apellido2');
        break;
        case "dni":
            validarCampo(expresiones.dni, dni.value, 'dni');
            comprobarDNI(dni.value, "mensaje_incompatible");
        break;
        case "usuario":
            validarCampo(expresiones.usuario, usuario.value, 'usuario');
        break;
        case "password":
            validarCampo(expresiones.password, password.value, 'password');
        break;
        case "rePassword":
            repetirContraseña(password.value, rePassword.value);
        break;
        case "email":
            validarCampo(expresiones.email, email.value, 'email');
        break;
        case "codigo":
            validarCampo(expresiones.codigoP, codigoP.value, 'codigoP');
            validarProvincia();
            validarComunidad();
        break;
        case "telefono":
            validarCampo(expresiones.telefono, telefono.value, 'telefono');
        break;
        case "email":
            validarCampo(expresiones.email, email.value, 'email');
        break;
        case "direccion":
            validarCampo(expresiones.direccion, direccion.value, 'direccion');
        break;


        case "titulo":
            validarCampo(expresiones.titulo, titulo.value, 'titulo');
        break;
        case "compañia":
            validarCampo(expresiones.compañia, compañia.value, 'compañia');
        break;
        case "publicacion":
            validarCampo(expresiones.Publicacion, publicacion.value, 'publicacion');
        break;
        

        case "lanzamiento":
            validarCampo(expresiones.lanzamiento, lanzamiento.value, 'lanzamiento');
        break;
        case "logo":
            validarCampo(expresiones.logo, logo.value, 'logo');
        break;
        case "precio":
            validarCampo(expresiones.precio, precio.value, 'precio');
        break;
        case "stock":
            validarCampo(expresiones.stock, stock.value, 'stock');
        break;
    }
}

//Valida el campo del formulario segun la expresion regular

const validarCampo = (expresion, valor, campoValidar) =>{

    if(expresion.test(valor)){
        console.log("correcto");
        error.classList.add("ocultar");
        error.classList.remove("mostrar");
        validado[campoValidar]= true;
    }
    else{
        console.log("incorrecto");
        error.classList.add("mostrar");
        error.classList.remove("ocultar");
        validado[campoValidar]= false;
    }
}

//Función que comprueba que las contraseñas son iguales
function repetirContraseña(pass1, pass2){
    
    if(pass1==pass2){
        console.log("correcto");
        error.classList.add("ocultar");
        error.classList.remove("mostrar");
        validado['rePassword'] = true;
    }
    else{
        console.log("incorrecto");
        error.classList.add("mostrar");
        error.classList.remove("ocultar");
        validado['rePassword']= false;
    }
}

//Función para validar el DNI
function comprobarDNI(dni, mensaje){
    let letra= dni.substring(8,9);
    let num= dni.substring(0,8);
    let letrasDNI=['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T'];
    let letraCorrecta = letrasDNI[num%23];
    let error = document.getElementById(mensaje);

    if(letra == letraCorrecta){
        error.classList.add("ocultar");
        error.classList.remove("mostrar");
        validado['dni'] = true;
    }
    else{
        error.classList.add("mostrar");
        error.classList.remove("ocultar");
        validado['dni'] = false;
    }
}

//Validar la provincia y la comunidad Autonoma
function validarProvincia(){
    let provincia = document.getElementById("provincia");
    let codigoP = document.getElementById("codigoP").value;
    let inicialesCodigoP = codigopostal[parseInt(codigoP.substring(0,2))];
    let comunidadA = document.getElementById("comunidadA");

    provincia.value = inicialesCodigoP;
    validado.provincia = true;
}

function validarComunidad(){
    let provincia = document.getElementById("provincia");
    let comunidadA = document.getElementById("comunidadA");
    let valor = provincia.value;

    if(provincia.value == "Las Palmas"){
        comunidadA.value = autonomias.LasPalmas;
        validado.comunidadA = true;
    }
    else if(provincia.value == "Ciudad Real"){
        comunidadA.value = autonomias.CiudadReal;
        validado.comunidadA = true;
    }
    else if(provincia.value == "La Rioja"){
        comunidadA.value = autonomias.LaRioja;
        validado.comunidadA = true;
    }
    else{
        comunidadA.value = autonomias[valor];
        validado.comunidadA = true;
    }

}
//Foreach de inputs para que los elementos contengan un oyente de eventos
inputs.forEach((input) =>{
    input.addEventListener('keyup', validarFormulario);
    input.addEventListener('paste', validarFormulario);
    input.addEventListener('blur', validarFormulario);
})

//Oyente de eventos para cuando le de al botón Enviar 
formulario.addEventListener('submit', (e) =>{
    e.preventDefault();

    let campos = inputs.length -1;
    let validar= 0;

    for(let i = 0; i < inputs.length; i++){
        if(validado[inputs[i].name]){
            validar++;
        }
    }

    if(validar != 0){
        console.log("los campos a validar y los campos validados son iguales");
        document.getElementById("mensaje_error").classList.remove("mostrar");
        document.getElementById("mensaje_error").classList.add("ocultar");
        document.getElementById("mensaje_correcto").classList.add("mostrar");
        document.getElementById("mensaje_correcto").classList.remove("ocultar");
        formulario.submit();
    }   
    else{
        console.log("no son iguales");
        document.getElementById("mensaje_error").classList.add("mostrar");
        document.getElementById("mensaje_error").classList.remove("ocultar");
        document.getElementById("mensaje_correcto").classList.remove("mostrar");
        document.getElementById("mensaje_correcto").classList.add("ocultar");
        
    }
})