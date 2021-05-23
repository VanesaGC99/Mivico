//Constante para almacenar 
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
    dirección: /^[A-Za-zÁ-ÿ0-9\s]{2,70}$/,

    nombre: /^[A-Za-zÁ-ÿ\s]{2,45}$/,
    tipo: /^[A-Za-zÁ-ÿ\s]{2,45}$/,
    descripcion: /^[A-Za-zÁ-ÿ\s]{2,1000}$/,
    
}