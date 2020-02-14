var form = document.getElementById('formulario');
var answer = document.getElementById('respuesta').getAttribute("value");

form.addEventListener('submit', function(e){
    e.preventDefault();

    var datos = new FormData(form);

    if (answer == 'new') {
        fetch('post.php',{
            method: 'POST',
            body: datos
        })
        .then( res => {
            res.json();
        })
        .then( data => {
            if(data !== 'error'){
                location.href="product.php";
            }
        });
        
    }else {
        fetch('put.php',{
            method: 'POST',
            body: datos
        })
        .then( res => {
            res.json();
        })
        .then( data => {
            console.log(data);
            if(data !== 'error'){
                location.href="product.php";
            }
        });
    }
});
