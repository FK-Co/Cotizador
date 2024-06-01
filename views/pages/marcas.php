<div class="" style="min-height: 717px;">
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Administrar Marcas</h1>
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
                        <button type="button" class="btn btn-success create-marcas " 
                        data-toggle="modal" data-target="#modal-create-marcas">Crear una nueva marca</button>
                    </div>
                    <br>
                    <div class="card-body">
                        <table class="table table-bordered table-striped dt-responsive tableMarca" width="100%">
                            <thead>
                                <tr>
                                    <th style="width:10px">#</th>
                                    <th>Marca</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($marcas as $key => $value):
                                ?>
                                <tr>
                                    <td><?php echo ($key+1) ?></td>
                                    <td><?php echo $value["nom_marca"] ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-warning btn-sm btnEditMarca" data-toggle="modal" 
                                            idMarca="<?php echo $value["id_marca"] ?>" data-target="#modal-edit-marca">
                                                <i class="fas fa-pencil-alt text-white"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm eliminarMarca" idMarcaE="<?php echo $value["id_marca"]?>">
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
Modal Crear marcas
======================================-->
<div class="modal modal-default fade" id="modal-create-marca">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="alert alert-success alert-dismissible ">Agregar nueva marca</h4>
            </div>
            <form method="post" enctype="multipart/form-data" style="margin: 20px;">
                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="text" class="form-control" name="nom_marca" placeholder="nombre">
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

$saveMarcas = new ctrMarcas();
$saveMarcas->ctrSaveMarcas();


?>


<!--=====================================
Modal Editar Marcas
======================================-->
<div class="modal modal-default fade" id="modal-edit-marca">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="alert alert-success alert-dismissible ">Editar Marca</h4>
            </div>
            <form method="post" enctype="multipart/form-data" style="margin: 20px;">
                <div class="form-group has-feedback" bis_skin_checked="1">
                <input type="hidden" id="idMarcaE" name="idMarcaE">
                    <input type="text" class="form-control"  id="nom_marcaE" name="nom_marcaE" placeholder="nombre">
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
        $editMarcas = new ctrMarcas();
        $editMarcas->ctrEditMarcas();
 ?>