var tabla = document.getElementById("tabla");
var contenido = "";

fetch("http://localhost:3000/all")
.then(response => {
    return response.json();
})
.then(json => {
    for (let i = 0; i < json.length; i++) {
        let aux = `<tr><td>${json[i].id}</td>
                <td>${json[i].name}</td>
                <td>${json[i].price}</td>
                <td>${json[i].quantity}</td>
                <td><button onclick="edit(${json[i].id})">Editar</button>
                <button onclick="delet(${json[i].id})">Eliminar</button></td></tr>`;
        contenido += aux;
    }
    tabla.innerHTML = contenido;
});
