function edit(id) {
    localStorage.clear();
    id = id.toString();
    localStorage.setItem("id", id);
    window.location.href = "editProduct.html";
}

function delet(id) {
    fetch(`http://localhost:3000/delete/${id}`, {
        method: "DELETE"
    })
        .then(response => {
            window.location.href = "index.html";
        });
}

function load() {
    var id = localStorage.getItem("id");

    fetch(`http://localhost:3000/${id}`, {
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

// function save() {
//     var form = document.getElementById('form');
//     var action = document.getElementById("btnSave").value;
    
//     form.addEventListener("submit", e => {
//         e.preventDefault();
//         var data = new FormData(form);

//         console.log(data.get("name"));

//         if (action == "new") {
//             alert("new");

//         } else {
//             var id = localStorage.getItem("id");

//             debugger;
//             fetch(`http://localhost:3000/update/${id}`, {
//                 method: 'POST',
//                 headers: {
//                     'Accept': 'application/json, text/plain, */*',
//                     'Content-Type': 'application/json'
//                 },
//                 body: data
//             })
//                 .then(response => {
//                     console.log("acac");
//                     return response.json();
//                 })
//                 .then(json => {
//                     console.log("json " + json);
//                     window.location.href = "index.html";
//                 });
//         }

//     });

// }