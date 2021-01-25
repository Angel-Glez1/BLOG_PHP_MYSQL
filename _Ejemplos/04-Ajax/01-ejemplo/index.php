<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax</title>
</head>

<body>
<h1>Peticiones Ajax</h1>
    <a href="javascript:void(0)" onclick="ejecutar_ajax('documentUno.php')" >Iniciar Seccion</a>
    <p></p>
    <a href="javascript:void(0)" onclick="ejecutar_ajax('documentDos.php')" >Registarme</a>

    <div id='r' >
    </div>

<script>

    function ejecutar_ajax(archivo) {
        
        // Instacio mi objeto de Ajax
        const ajax = new XMLHttpRequest();
        console.log(archivo); 

        /* Metodo open => Define los parametros de conexion. 
            Y resive tres Parametros
        Primero : El metodo por el cual se va hacer la peticion GET o POST 
        Segundo : La url a buscar Puede ser una url completa o el nombre del archivo que este en el mismo direcctorio
        Tercero : Un dato de tipo Boolean si es true es que va hacer una peticion asincrona osea que no se va a recargar la pagina. */
        ajax.open('POST', archivo, true);

        /* El metodo setRequestHeader : Modifica los encabezados de la peticion Resive dos argumentos 
        Que encabezado Y que valor Y siempre va en medio del metodo Open y el send.
        A qui le definimos que se comporte como Formulario ya que esta enviando por post. */
        ajax.setRequestHeader('Content-type',  'application/x-www-form-urlencoded');

        /* El metodo send sirve para ejecutar la peticion y a demas sirve para mandar informacion   
        ala url (Un dato que se valla a guadar en una BD ) y si no le mandamos ala url a buscar
        entonces tenemsoq que poner null */
        ajax.send(null);

        // Esto guardar  la peticon que ejecute. o mejor dicho el valor de status. 
        ajax.onreadystatechange = function() {
            // El metodo readyState sirve para saber si la peticion se ejecuto. Si es cuatro significa que finalizo la peticion
            // Ahora solo nos falta ver que la peticion haya sido la correcta
            if(ajax.readyState == 4){
                // Peticion finalizada

                // la propiedad status si tiene el valor de 200 es que si fue correcta la peticion.
                if(ajax.status == 200){
                    
                    // la propiedad respomse text tiene el codigo de la repuesta solicitada
                    console.log(ajax.responseText);


                    var codigo = ajax.responseText;

                }
            }


            const div = document.querySelector("#r");

            div.innerHTML = codigo;

        }


        
    }


</script>

</body>
</html>