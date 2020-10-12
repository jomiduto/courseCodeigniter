
<a href="<?php echo base_url() ?>personas/guardar" class="btn btn-success mb-3 mt-3">Guardar</a>

<form method="get"  action="<?php echo base_url() ?>personas/buscar_listado">
    <div class="input-group mb-3">
        <input name="general_search" type="text" class="form-control" value="<?php echo $general_search ?>" placeholder="Buscar..." aria-label="Filtrar">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit">Enviar</button>
        </div>
    </div>


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

            <tr>
                <th scope="row"></th>
                <td><input name="col_nombre" type="text" class="form-control" value="<?php echo $col_nombre ?>" placeholder="Nombre" aria-label="Filtrar"></td>
                <td><input name="col_apellido" type="text" class="form-control" value="<?php echo $col_apellido ?>" placeholder="Apellido" aria-label="Filtrar"></td>
                <td><input name="col_edad" type="text" class="form-control" value="<?php echo $col_edad ?>" placeholder="Edad" aria-label="Filtrar"></td>
                <td>
                </td>
            </tr>

            <?php foreach ($personas as $key => $p) : ?>
                <tr>
                    <th scope="row"><?php echo $p->persona_id ?></th>
                    <td><?php echo $p->nombre ?></td>
                    <td><?php echo $p->apellido ?></td>
                    <td><?php echo $p->edad ?></td>
                    <td>
                        <a href="<?php echo base_url() ?>personas/guardar/<?php echo $p->persona_id ?>">Editar</a>
                        <br>
                        <a href="<?php echo base_url() ?>personas/ver/<?php echo $p->persona_id ?>">Ver</a>
                        <br>
                        <a href="#" 
                           data-toggle="modal" 
                           data-target="#DeletePerson" 
                           data-id="<?php echo $p->persona_id ?>"
                           data-name="<?php echo $p->nombre ?>">Borrar</a>
                    </td>
                </tr>
            <?php endforeach; ?>       
        </tbody>
    </table>

</form>

<nav>
    <ul class="pagination">

        <?php
        $prev = $current_pag - 1;
        $next = $current_pag + 1;

        if ($prev <= 0) {
            $prev = 1;
        }

        if ($next > $last_page) {
            $next = $last_page;
        }

        $url_get = "?general_search=$general_search&col_nombre=$col_nombre&col_apellido=$col_apellido&col_edad=$col_edad";
        ?>

        <li class="page-item"><a class="page-link" href="<?php echo base_url() . "personas/listado/" . $prev . $url_get ?>">Previous</a></li>

        <?php for ($i = 1; $i <= $last_page; $i++) { ?>
            <li class="page-item"><a class="page-link" href="<?php echo base_url() . "personas/listado/" . $i . $url_get ?>"><?php echo $i ?></a></li>
        <?php } ?>
        <li class="page-item"><a class="page-link" href="<?php echo base_url() . "personas/listado/" . $next . $url_get ?>">Next</a></li>
    </ul>
</nav>

<div class="modal fade" id="DeletePerson" tabindex="-1" role="dialog" aria-labelledby="DeletePersonLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="DeletePersonLabel">
                    Vas a borrar la persona:
                    <span></span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="b-borrar">Borrar</button>
            </div>
        </div>
    </div>
</div>