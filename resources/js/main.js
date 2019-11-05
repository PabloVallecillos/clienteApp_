(function(){
    let form = document.querySelectorAll('.destroy');
    
    // buttons coleccion <-  
    for (var i = form.length - 1; i >= 0; i--) {
             // submit fuera 
        form[i].addEventListener('submit', function(event) {
            let confirmacion = confirm('¿Seguro qué desea borrar el cliente?');
            if (!confirmacion) {
                event.preventDefault();
            }
             
        });
    }      
 })();