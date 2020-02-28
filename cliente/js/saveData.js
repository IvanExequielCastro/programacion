var form = document.getElementById('form');
var action = document.getElementById("btnSave").value;

form.addEventListener("submit", e => {
    e.preventDefault();
    var data = new FormData(form);

    console.log(data.get("name"));

    if (action == "new") {
        alert("new");

    } else {
        var id = localStorage.getItem("id");

        // debugger;
        fetch(`http://localhost:3000/update/${id}`, {
            method: 'POST',
            body: data
        })
            .then(response => {
                console.log("acac");
                return response.json();
            })
            .then(json => {
                console.log("json " + json);
                window.location.href = "index.html";
            });
    }

});