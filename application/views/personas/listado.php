<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listado Personas</title>
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h2>Personas Registradas</h2>
        <br>
        <a href="guardar" class="btn btn-success">Registrar</a>
        <br><br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach($personas as $key => $p) : ?>
                        <tr>
                        <th scope="row"><?php echo $p->persona_id; ?></th>
                        <td><?php echo $p->nombre; ?></td>
                        <td><?php echo $p->apellido; ?></td>
                        <td><?php echo $p->edad; ?></td>
                        <td>
                            <a href="guardar/<?php echo $p->persona_id; ?>">Editar</a> <!-- GUARDAR el nombre debe ser igual al de los controladores-->
                            <br>
                            <a href="ver/<?php echo $p->persona_id; ?>">Ver</a> <!-- VER el nombre debe ser igual al de los controladores-->
                            <br>
                            <a href="#" data-toggle="modal" data-target="#deletePerson" data-id="<?php echo $p->persona_id; ?>">Borrar</a> <!-- BORRAR el nombre debe ser igual al de los controladores-->
                        </td>
                        </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <!-- Modal para eliminar -->

        <div class="modal fade" id="deletePerson" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" id="b-borrar">Borrar Registro</button>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

        <script>
            var id, link;
            
            $('#deletePerson').on('show.bs.modal', function (event) {
                link = $(event.relatedTarget); // Button that triggered the modal
                id = link.data('id'); // Extract info from data-* attributes
                //console.log(id);
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this);
                modal.find('.modal-title').text("¿Seguro que deseas borrar el registro seleccionado?");
            });

            $("#b-borrar").click(function(){
                //console.log('click '+id);
                $.ajax({
                    url: "<?php echo base_url() ?>personas/borrar_ajax/"+id,
                    context: document.body
                }).done(function (res) {
                    console.log(res)
                    $("#deletePerson").modal('hide');// Función para ocultar el modal
                    $(link).parent().parent().remove();// Función para remover el registro
                });
            });
        </script>

    </div>
</body>
</html>