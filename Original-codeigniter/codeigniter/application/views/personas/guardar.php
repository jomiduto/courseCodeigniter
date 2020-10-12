<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <style>
            .img-small{
                width: 180px;
                display: block;
                border: 1px solid #CCC;
                margin: 4px 0;
            }
        </style>
    </head>
    <body>

        <div class="container">

            <br>
            <a href="<?php echo base_url() ?>personas/listado" class="btn btn-success">Regresar</a>
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

            <?php echo form_open_multipart(''); ?>

            <div class="form-group">
                <?php
                echo form_label('Nombre', 'nombre');

                $input = array(
                    'name' => 'nombre',
                    'value' => $nombre,
                    'class' => 'form-control input-lg'
                );

                echo form_input($input);
                ?>
            </div>

            <div class="form-group">
                <?php
                echo form_label('Apellido', 'apellido');

                $input = array(
                    'name' => 'apellido',
                    'value' => $apellido,
                    'class' => 'form-control input-lg'
                );

                echo form_input($input);
                ?>
            </div>

            <div class="form-group">
                <?php
                echo form_label('Edad', 'edad');

                $input = array(
                    'name' => 'edad',
                    'type' => 'number',
                    'value' => $edad,
                    'class' => 'form-control input-lg'
                );

                echo form_input($input);
                ?>
            </div>

            <div class="form-group">
                <?php
                echo form_label('Imagen', 'image');

                $input = array(
                    'name' => 'image',
                    'type' => 'file',
                    'value' => "",
                    'class' => 'form-control input-lg'
                );

                echo form_input($input);
                ?>
            </div>

            <?php if ($image != ""): ?>
                <img class="img-small" src="<?php echo base_url() ?>uploads/<?php echo $image ?>">
			<?php else: ?>
				<img class="img-small" src="<?php echo base_url() ?>otra-imagen.png">
			<?php endif; ?>

            <?php
            echo form_submit('mysubmit', 'Enviar', "class='btn btn-primary'");
            ?>

            <?php echo form_close(); ?>
        </div>

    </body>
</html>