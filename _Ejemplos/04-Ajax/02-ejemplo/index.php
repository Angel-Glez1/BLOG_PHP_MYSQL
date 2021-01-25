<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax 2</title>
</head>
<body>
    <input type="button" onclick="ejecutar_ajax()" value="click" >

    <div id="r"></div>
    <script>
    
    function ejecutar_ajax (){

        const ajax = new XMLHttpRequest();

        ajax.open('POST', 'ejemplo.php?nombre=nombre&apellido=alcaraz', true);

        ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        // Fromas d madar por POST
        ajax.send('curso=javascript&maestro=germas');


        ajax.onreadystatechange = () => {

            if(ajax.readyState == 4){
                if(ajax.status == 200){

                    document.querySelector("#r").innerHTML = ajax.responseText;

                }

            }

        }



    }
    
    
    </script>
</body>
</html>