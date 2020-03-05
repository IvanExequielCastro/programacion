function edit(id) {
    localStorage.clear();
    id = id.toString();
    localStorage.setItem("id", id);
    window.location.href = "editProduct.html";
}

function delet(id) {
    fetch(`http://localhost:4000/delete/${id}`, {
        method: "DELETE"
    })
        .then(response => {
            window.location.href = "index.html";
        });
}

function load() {
    var id = localStorage.getItem("id");

    fetch(`http://localhost:4000/${id}`, {
        method: "GET"
    })
        .then(response => {
            return response.json();
        })
        .then(json => {
            document.getElementById("name").value = json[0].name;
            document.getElementById("price").value = json[0].price;
            document.getElementById("quantity").value = json[0].quantity;
        });
}
