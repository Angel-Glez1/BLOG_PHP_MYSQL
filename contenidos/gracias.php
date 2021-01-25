<?php $categorias = ['Backend', 'Front-end', 'Mobile', 'Javascript']; ?>
<h1>Contáctanos</h1>
<p class="ok">Tu mensaje fue inviado con exito</p>
<form>
    <div><span>Tu nombre </span><input type="text" /></div>
    <div><span>Tu Email </span><input type="email"></div>
    <div><span>Motivo </span><select>
            <option>Mensaje</option>
            <option>Reclamo</option>
            <option>Información</option>
        </select></div>
    <div><span>Recibir novedades </span>
        <div class="option_group inline">
            <?php for ($i = 0; $i < sizeof($categorias); $i++) : ?>
                <label><input type="checkbox" /> <?= $categorias[$i] ?> </label>
            <?php endfor; ?>
        </div>
    </div>
    <div><span>Mensaje </span><textarea rows="6" cols="70"></textarea></div>
    <div><input class="aligned" type="submit" value="Comentar" /></div>
</form>