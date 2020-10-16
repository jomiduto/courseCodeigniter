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
        <?php echo $view; ?>
    </div>

    <script src="<?php echo base_url() ?>assets/js/jquery-3.5.1.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.toaster.js"></script>
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

        <?php if($this->session->flashdata('message') != null): ?>
        <script>
            $.toaster({ message : '<?php echo $this->session->flashdata('message'); ?>', title : 'Mensaje' });
        </script>
    <?php endif; ?> 
</body>
</html>