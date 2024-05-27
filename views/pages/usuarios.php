<div class="" style="min-height: 717px;">
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Administrar Usuarios</h1>
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
                        <button type="button" class="btn btn-success create-user " 
                        data-toggle="modal" data-target="#modal-create-user">Crear un nuevo usuario</button>
                    </div>
                    <br>
                    <div class="card-body">
                        <table class="table table-bordered table-striped dt-responsive tableUser" width="100%">
                            <thead>
                                <tr>
                                    <th style="width:10px">#</th>
                                    <th>Nombre</th>
                                    <th>Usuario</th>
                                    <th>Rol</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($users as $key => $user): ?>
                                <?php
                                $item = "id_roles";
                                $userRoles = ctrRoles::ctrFetchRoles($item, $user["rol"]);
                                ?>
                                <tr>
                                    <td><?php echo ($key + 1) ?></td>
                                    <td><?php echo $user["nombre"] ?></td>
                                    <td><?php echo $user["usuario"] ?></td>
                                    <td><?php echo $userRoles["nom_rol"] ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-warning btn-sm btnEditUser" data-toggle="modal" idUser="<?php echo $user["id"] ?>" data-target="#modal-edit-user">
                                            <i class="fa-solid fa-pen"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash-alt text-white"></i>
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
Modal Crear usuarios
======================================-->
<div class="modal modal-default fade" id="modal-create-user">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="alert alert-success alert-dismissible ">Agregar nuevo usuario</h4>
            </div>
            <form method="post" enctype="multipart/form-data" style="margin: 20px;">

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="text" class="form-control" name="nom_usuarios" placeholder="nombre">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="text" class="form-control"  name="nom_user" placeholder="usuario">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="password" class="form-control"  name="pass_user" placeholder="contraseña">
                    <span class="glyphicon glyphicon-eye-close form-control-feedback"></span>
                </div>



                <div class="form-group has-feedback">
                    <label>rol</label>
                    <select name="rol_user" class="form-control" required>
                        <option value="1">Administrador</option>
                        <option value="2">Supervisor</option>
                        <option value="3">Vendedor</option>
                    </select>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">cerrar</button>
                    <button type="submit" class="btn btn-primary">guardar</button>
                </div>


            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<?php 

$saveUsers = new ctrUsers();
$saveUsers->ctrSaveUsers();


?>


<!--=====================================
Modal Editar usuarios
======================================-->
<div class="modal modal-default fade" id="modal-edit-user">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="alert alert-success alert-dismissible ">Editar usuario</h4>
            </div>
            <form method="post" enctype="multipart/form-data" style="margin: 20px;">

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="text" class="form-control"  id="nom_usuariosE" name="nom_usuariosE" placeholder="nombre">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="text" class="form-control" id="nom_userE" name="nom_userE" placeholder="usuario">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="password" class="form-control" id="pass_userE" name="pass_userE" placeholder="contraseña">
                    <span class="glyphicon glyphicon-eye-close form-control-feedback"></span>
                </div>  


                <div class="form-group has-feedback">
                    <label>rol</label>
                    <select name="rol_userE" class="form-control" required>
                        <option value="1">Administrador</option>
                        <option value="2">Vendedor</option>
                    </select>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">cerrar</button>
                    <button type="submit" class="btn btn-primary">guardar</button>
                </div>

                <?php 

                //$saveUsers = new ctrUsers();
               // $saveUsers->ctrSaveUsers();
                
                
                ?>


            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>