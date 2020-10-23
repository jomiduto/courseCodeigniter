<form action="" method="get">
    <div class="input-group mb-3">
        <input name="nombre" type="text" class="form-control" placeholder="Buscador" aria-label="Filtrar" aria-describedby="basic-addon2" autocomplete="off">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit">Button</button>
        </div>
    </div>
</form>
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

        <nav aria-label="Page navigation example">
            <ul class="pagination">
            <?php 
                $prev = $current_pag - 1;
                $next = $current_pag + 1;
                
                if($prev <= 0){
                    $prev = 1;
                }

                if($next > $last_pag){
                    $next = $last_pag;
                }
            ?>
                 <li class="page-item"><a class="page-link" href="<?php echo base_url()."personas/listado/". $prev; ?>">Previous</a></li>
            <?php for($i = 1; $i <= $last_pag; $i++) { ?>
                <li class="page-item"><a class="page-link" href="<?php echo base_url()."personas/listado/". $i; ?>"><?php echo $i; ?></a></li>
            <?php } ?>
                <li class="page-item"><a class="page-link" href="<?php echo base_url()."personas/listado/". $next; ?>">Next</a></li>
            </ul>
        </nav>
        
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