<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos Persona</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <h2>Datos del Usuario</h2>
    <br>
    <a href="../listado" class="btn btn-success">Regresar</a>
    <br><br>

        <?php echo form_open(); ?>
            <div class="form-group">
                <?php
                echo form_label('Nombre', 'nombre'); // El último parámetro es el atributo for

                $input = array(
                        'type'  => 'text',
                        'name'  => 'nombre',
                        'value' => $nombre,
                        'class' => 'form-control input-lg',
                        'readonly' => ''
                );

                echo form_input($input);
                ?>
            </div>
            <div class="form-group">
                <?php
                echo form_label('Apellido', 'apellido'); // El último parámetro es el atributo for

                $input = array(
                        'type'  => 'text',
                        'name'  => 'apellido',
                        'value' => $apellido,
                        'class' => 'form-control input-lg',
                        'readonly' => ''
                );

                echo form_input($input);
                ?>
            </div>
            <div class="form-group">
                <?php
                echo form_label('Edad', 'edad'); // El último parámetro es el atributo for

                $input = array(
                        'type'  => 'number',
                        'name'  => 'edad',
                        'value' => $edad,
                        'class' => 'form-control input-lg',
                        'readonly' => ''
                );

                echo form_input($input);
                ?>
            </div>

        <?php echo form_close(); ?>
    </div>

</body>
</html>