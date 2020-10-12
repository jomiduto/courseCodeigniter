<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Personas</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <h2>Registro de Usuario</h2>
    <br>
    <a href="<?php echo base_url(); ?>personas/listado" class="btn btn-success">Regresar</a>
    <br><br>

        <?php if (validation_errors() != ""): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo validation_errors(); ?>
            </div>
        <?php endif; ?>

        <?php if ($error != ""): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <?php echo form_open_multipart(); ?>
            <div class="form-group">
                <?php
                echo form_label('Nombre', 'nombre'); // El último parámetro es el atributo for

                $input = array(
                        'type'  => 'text',
                        'name'  => 'nombre',
                        'value' => $nombre,
                        'class' => 'form-control input-lg',
                        'placeholder' => 'Nombre'
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
                        'placeholder' => 'Apellido'
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
                        'placeholder' => 'Edad'
                );

                echo form_input($input);
                ?>
            </div>
            <div class="form-group">
                <?php
                echo form_label('Imagen', 'image'); // El último parámetro es el atributo for

                $input = array(
                        'type'  => 'file',
                        'name'  => 'image',
                        'value' => '',
                        'class' => 'form-control input-lg',
                        'placeholder' => ''
                );

                echo form_input($input);
                ?>
            </div>

            <?php
                echo form_submit('mysubmit', 'Enviar', 'class="btn btn-primary"');
            ?>

        <?php echo form_close(); ?>
    </div>

</body>
</html>