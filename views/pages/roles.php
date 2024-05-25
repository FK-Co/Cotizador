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
                        <button type="button" class="btn btn-success create-profile " 
                        data-toggle="modal" data-target="#modal-create-profile">Crear un nuevo rol</button>
                    </div>
                    <br>
                    <div class="card-body">
                        <table class="table table-bordered table-striped dt-responsive tableProfile" width="100%">
                            <thead>
                                <tr>
                                    <th style="width:10px">#</th>
                                    <th>Rol</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php ?>
                                <?php
                                    foreach($roles as $key => $value){

                               
                                ?>
                                <tr>
                                    <td><?php echo ($key+1) ?></td>
                                    <td><?php echo $value["nom_rol"] ?></td>
                                    <td><button class="btn btn-info btn-sm">Activo</button></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-warning btn-sm">
                                                <i class="fas fa-pencil-alt text-white"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                     }
                                ?>
                            </tbody>
                        </table>
                    </div>    
                </div>
            </div>
        </div>
    </div>
</section>
</div>