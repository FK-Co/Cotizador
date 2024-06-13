<div class="" style="min-height: 717px;">
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Administrar Categoría</h1>
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
                        <button type="button" class="btn btn-success create-cat " 
                        data-toggle="modal" data-target="#modal-create-cat">Crear una nueva categoría</button>
                    </div>
                    <br>
                    <div class="card-body">
                        <table class="table table-bordered table-striped dt-responsive tableCat" width="100%">
                            <thead>
                                <tr>
                                    <th style="width:10px">#</th>
                                    <th>Categoría</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($categorias as $key => $value):
                                ?>
                                <tr>
                                    <td><?php echo ($key+1) ?></td>
                                    <td><?php echo $value["nom_cat"] ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-warning btn-sm btnEditCat" data-toggle="modal" 
                                            idCat="<?php echo $value["id_cat"] ?>" data-target="#modal-edit-cat">
                                                <i class="fas fa-pencil-alt text-white"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm eliminarCat" idCatE="<?php echo $value["id_cat"]?>">
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
Modal Crear categorias
======================================-->
<div class="modal modal-default fade" id="modal-create-cat">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="alert alert-success alert-dismissible ">Agregar nueva categoría</h4>
            </div>
            <form method="post" enctype="multipart/form-data" style="margin: 20px;">
                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="text" class="form-control" name="nom_cat" placeholder="nombre">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<?php 

$saveCat = new ctrCat();
$saveCat->ctrSaveCat();


?>


<!--=====================================
Modal Editar categorias
======================================-->
<div class="modal modal-default fade" id="modal-edit-cat">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="alert alert-success alert-dismissible ">Editar Categoría</h4>
            </div>
            <form method="post" enctype="multipart/form-data" style="margin: 20px;">
                <div class="form-group has-feedback" bis_skin_checked="1">
                <input type="hidden" id="idCatE" name="idCatE">
                    <input type="text" class="form-control"  id="nom_catE" name="nom_catE" placeholder="nombre">
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
        $editCat = new ctrCat();
        $editCat->ctrEditCat();
 ?>