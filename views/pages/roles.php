<div class="" style="min-height: 717px;">
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Administrar Roles</h1>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <button type="button" class="btn btn-success create-rol " 
                        data-toggle="modal" data-target="#modal-create-rol">Crear un nuevo rol</button>
                    </div>
                    <br>
                    <div class="card-body">
                        <table class="table table-bordered table-striped dt-responsive tableRol" width="100%">
                            <thead>
                                <tr>
                                    <th style="width:10px">#</th>
                                    <th>Rol</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($roles as $key => $value):
                                ?>
                                <tr>
                                    <td><?php echo ($key+1) ?></td>
                                    <td><?php echo $value["nom_rol"] ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-warning btn-sm btnEditRol" data-toggle="modal" 
                                            idRol="<?php echo $value["id_rol"] ?>" data-target="#modal-edit-rol">
                                                <i class="fas fa-pencil-alt text-white"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm eliminarRol" idRolE="<?php echo $value["id_rol"]?>">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>    
                </div>
            </div>
        </div>
    </div>
</section>
</div>



<!--=====================================
Modal Crear roles
======================================-->
<div class="modal modal-default fade" id="modal-create-rol">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="alert alert-success alert-dismissible ">Agregar nuevo rol</h4>
            </div>
            <form method="post" enctype="multipart/form-data" style="margin: 20px;">
                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="text" class="form-control" name="nom_rol" placeholder="nombre">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">guardar</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<?php 

$saveRoles = new ctrRoles();
$saveRoles->ctrSaveRoles();


?>


<!--=====================================
Modal Editar Roles
======================================-->
<div class="modal modal-default fade" id="modal-edit-rol">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="alert alert-success alert-dismissible ">Editar rol</h4>
            </div>
            <form method="post" enctype="multipart/form-data" style="margin: 20px;">
                <div class="form-group has-feedback" bis_skin_checked="1">
                <input type="hidden" id="idRolE" name="idRolE">
                    <input type="text" class="form-control"  id="nom_rolE" name="nom_rolE" placeholder="nombre">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Editar</button>
                </div>

                


            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<?php 
        $editRoles = new ctrRoles();
        $editRoles->ctrEditRoles();
 ?>