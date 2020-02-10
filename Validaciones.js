//validar caja NAME que no este vacio y que sea solo texto
function validation() {
    var cajaNombre= document.getElementById('fnamePro').value;
    
    if (validarTexto(cajaNombre)==false){
        alert('el nombre del producto debe ser solo con letras');
        var vacio ="";
        document.getElementById('fnamePro').value = vacio;
    }else if(cajaNombre == null || cajaNombre.length == 0){
        alert("debe rellenar el campo de nombre producto");             
    }   
}
    
//funcion para validar que lo ingresado sea solo texto
function validarTexto(parametro) {
    //expresion regular 
    var patron = /[ñÑ\s0-9]/;

    if(parametro.search(patron)){
        return true;
    }else {
        return false;
    }
}

//funcion para validar solo numero
function validarNumero(e) {
    //almacena la entrada del teclado
    var key=e.keyCode ||  e.which;

    var teclado=String.fromCharCode(key);
    var numero="0123456789";
    var especiales="8-37-38-46";
    var teclado_especias= false;

    for(var i in especiales){
        if(key==especiales[i]){
            teclado_especias=true;
        }
    }

    //si la tecla que presionamos esta en el patron de numero
    if (numero.indexOf(teclado)== -1 && !teclado_especias){
        //no acepta el caracter ingresado
        return false;
    }
}