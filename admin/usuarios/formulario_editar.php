<?php

$id = isset($_GET['id']) ? $_GET['id'] : 0;

$c = "SELECT ID, EMAIL, ESTADO, NIVEL FROM usuarios WHERE ID = '$id'";
$f = mysqli_query($conexion, $c);
$a = mysqli_fetch_assoc($f);

// Sirve para tildar el checkbox que este relacionado ala informacion que traemos de BD
function tildarCheckbox($valueCheckboxDB, $valueCheckboxForm)
{

    if ($valueCheckboxDB == $valueCheckboxForm) return 'checked';
}

// Asigan el valor que le corresponde al usurio
function tildarOption($valueOptionDB, $valueOptionForm)
{

    if ($valueOptionDB == $valueOptionForm) return 'selected';
}

// Mostarmos eero si no exite el id nos llega por get
if (!$a) {
    echo "<p class='error'>El usuario solicitado no exite</p>";
    die();
}
?>

<form action="acciones/usuarios/update_user.php" method="post">
    <div>
        <span>Correo</span>
        <input type="email" name="email" value="<?= $a['EMAIL'] ?>">
    </div>
    <!-- Roles -->
    <div>
        <span>Nivel</span>
        <label>
            <input type="radio" name="nivel" value="lector" <?= tildarCheckbox($a['NIVEL'], 'lector') ?>> lector
        </label>


        <label>
            <input type="radio" name="nivel" value="moderador" <?= tildarCheckbox($a['NIVEL'], 'moderador') ?>> Moderador
        </label>


        <label>
            <input type="radio" name="nivel" value="administrador" <?= tildarCheckbox($a['NIVEL'], 'administrador') ?>> administrador
        </label>
    </div>

    <!-- Estado de su cuenta  -->
    <div>
        <span>Estado</span>
        <select name="estado">
            <option <?= tildarOption($a['ESTADO'], '1') ?> value="1">Activo</option>
            <option <?= tildarOption($a['ESTADO'], '0') ?> value="0">inactivo</option>
        </select>
    </div>

    <div>
        <input type="hidden" name="id" value="<?= $a['ID'] ?>">
        <input class="left" type="submit" value="Enviar">
        <input type="button" value="cancelar" onclick="return location.href = 'index.php?categoria=usuarios'">

    </div>

</form>