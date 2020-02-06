var form = document.getElementById('formulario');
var answer = document.getElementById('respuesta');

form.addEventListener('submit', function(e){
    e.preventDefault();

    var datos = new FormData(form);

    fetch('post.php',{
        method: 'POST',
        body: datos
    })
    .then( res => res.json())
    .then( data => {
        console.log(data)
        if(data === 'error'){
            answer.innerHTML = `
            <div class="alert alert-dismissable alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        ×
                    </button>
                    <h4>
                        Alert!
                    </h4> <strong>Attention!</strong> You must fill all the fields.
            </div>
            `
        }else{
            answer.innerHTML = `
            <div class="alert alert-dismissable alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        ×
                    </button>
                    <h4>
                        Successful!
                    </h4> <strong>Perfect!</strong> You will be redirected.
            </div>
            `
            location.href="product.php";
        }
    });
});