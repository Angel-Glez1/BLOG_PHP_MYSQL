<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fromulario ajax</title>
</head>

<body>
    <h1>Registrate</h1>

    <form>

        <p>
            <input type="text" name="nombre" id="nombre" placeholder="Nombre...">
        </p> 

        <p>
            <input type="text" name="apellido" id="apellido" placeholder="Apellido...">
        </p>
        <p>
            <input type="text" name="emial" id="emial" placeholder="Email..." >
        </p>

        <input type="button" onclick="ajax()" value="Enviar">

    </form>


    <script>
        function ajax(){

            // Obtener los valores del formulario 
            let form = document.querySelector("form");

            // Usando la clase FromData puedo mandar datos por post mas facil.
            let values = new FormData(form);
            // Podemos agregar valores que no esten en el input usando el metodo append 
            values.append('id', 1);

            // Creo mi instancia de AJAX..
            const a = new XMLHttpRequest();
            a.open('POST', 'save.php', true );

            // Con la clase FromData ya no ocupo los header
            // a.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

            // otra forma de mandar datos por post
            a.send(values);


            a.onreadystatechange = function (){

                if(a.readyState == 4){
                    if(a.status == 200){

                        console.log(a.responseText);
                    }
                }

            }


        }

    
    </script>
</body>
</html>