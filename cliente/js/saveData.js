var form = document.getElementById('form');
var action = document.getElementById("btnSave").value;

form.addEventListener("submit", e => {
    e.preventDefault();

    if (action == "new") {
        var name = document.getElementById("name").value;
        var price = document.getElementById("price").value;
        var quantity = document.getElementById("quantity").value;

        var myHeaders = new Headers();
        myHeaders.append('Content-Type', 'application/json');

        var data = { name, price, quantity };
        // debugger;
        fetch(`http://localhost:3000/send`, {
            method: 'POST',
            mode : 'cors', //Agregamos mode : cors
            headers : myHeaders,  //Agregamos headers para parsear json
            body: JSON.stringify(data),
        })
            .then(json => {
                console.log("json " + json);
                window.location.href = "index.html";
            });

    } else {
        var id = localStorage.getItem("id");

        var name = document.getElementById("name").value;
        var price = document.getElementById("price").value;
        var quantity = document.getElementById("quantity").value;

        var data = { name, price, quantity };

        var myHeaders = new Headers();
        myHeaders.append('Content-Type', 'application/json');

        fetch(`http://localhost:3000/update/${id}`, {
            method: 'PUT',
            headers : myHeaders,
            body: JSON.stringify(data)
        })
            .then(json => {
                console.log("json " + json);
                window.location.href = "index.html";
            });
    }
});