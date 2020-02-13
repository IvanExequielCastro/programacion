var form = document.getElementById('formulario');
var answer = document.getElementById('respuesta').getAttribute("value");

form.addEventListener('submit', function(e){
    e.preventDefault();

    var datos = new FormData(form);

    if (answer === 'new') {
        fetch('post.php',{
            method: 'POST',
            body: datos
        })
        .then( res => res.json())
        .then( data => {
            console.log(data);
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
            if(data !== 'error'){
                location.href="product.php";
            }
        });
    }
});


// .then( data => {
//     console.log("aca"+data);
//     if(data === 'error'){
//         answer.innerHTML = `
//         <div>
//             <button type="button" data-dismiss="alert" aria-hidden="true">×</button>
//             <h4>Alert!</h4>
//             <strong>Attention!</strong> You must fill all the fields.
//         </div>
//         `;
//     }else{
//         answer.innerHTML = `
//         <div>
//             <button type="button" data-dismiss="alert" aria-hidden="true">×</button>
//             <h4>Successful!</h4>
//             <strong>Perfect!</strong> You will be redirected.
//         </div>
//         `;
//         location.href="product.php";
//     }
// }
// );