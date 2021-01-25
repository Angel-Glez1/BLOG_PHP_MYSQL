<?php
// Primera forma de crear array asociativos
$datos = [1, 1, 1, 1, 1, 1, 1, 1,];

$datos['nombre'] = 'Angel';
$datos['email']  = 'angel@angel.com';
$datos['sexo']   =  'M';


var_dump($datos);

$elementos = [

    [
        'etiqueta' => 'input',
        'type' => 'text',
        'name' => 'name',
        'holder' => 'Tu Nombre ...',
        'label' => 'Nombre'
    ],

    [
        'etiqueta' => 'input',
        'type' => 'email',
        'name' => 'email',
        'holder' => 'Tu Email ...',
        'label' => 'Email'
    ],

    [
        'etiqueta' => 'select',
        'name' => 'nacionalidad',
        'value' => ['España', 'Mexico', 'Peru'],
        'label' => 'nacionalidad'
    ]


];

for ($i = 0; $i < sizeof($elementos); $i++) : ?>

    <?php if ($elementos[$i]['etiqueta'] == 'input') : ?>

      <p><?= $elementos[$i]['label'] ?> </p>
       <input type="<?= $elementos[$i]['type'] ?>" name="<?= $elementos[$i]['name'] ?>" placeholder="<?= $elementos[$i]['holder'] ?>">
        <br>

    <?php elseif ($elementos[$i]['etiqueta'] == 'select') : ?>

        <p>
            <?= $elementos[$i]['label'] ?>
        </p>

        <select name="<?= $elementos[$i]['name'] ?>">

            <?php for ($x = 0; $x < count($elementos[$i]['value']); $x++) :  ?>
            <option value="<?= $elementos[$i]['value'][$x] ?>">
                <?= $elementos[$i]['value'][$x] ?>
            </option>
            <?php endfor; ?>

        </select>

    <?php endif; ?>
<?php endfor; ?>

