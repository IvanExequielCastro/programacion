var nombre = document.getElementsByName("name");

function validarNombre() {
    var nuevoNombre = nombre[0].value;
    var aux;
    
    aux = letterOnly(nuevoNombre);

    document.getElementById("nombre").value = aux;
}

function letterOnly(text) {
    var patron =  /\d/g;
    var letter = text;

    var aux = letter.replace (patron, "");

    return aux;
}
