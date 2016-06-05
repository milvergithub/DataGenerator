<div class="col-lg-7 col-md-8 col-sm-10 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offset-1">
    <?php
    if ((isset($_GET)) AND !empty($_GET['msm'])) {
        switch ($_GET['msm']) {
            case 1:
                ?>
                <div class="alert alert-danger">
                    ya existe el nombre del proyecto
                </div>
                <?php
                break;
            case 2:
                ?>
                <div class="alert alert-danger">
                    Error en los datos procure que los datos ingresados sean correctos...
                </div>
                <?php
                break;
        }
    }
    ?>
    <form class="form-horizontal" action="controller/crearController.php" id="formulariotestconn"
          method="POST">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">
                    new project
                </div>
            </div>
            <div class="panel-body">
                <div class="form-group  has-feedback ">
                    <label class="control-label col-xs-12 col-sm-3" for="<?php echo NOMBRE_PROYECTO ?>">
                        Nombre
                    </label>

                    <div class="col-xs-12 col-sm-9">
                        <input class="form-control input-sm" type="text"
                               name="<?php echo NOMBRE_PROYECTO ?>" id="<?php echo NOMBRE_PROYECTO ?>"/>
                    </div>
                    <span class="icono glyphicon form-control-feedback" id="<?php echo NOMBRE_PROYECTO ?>1"
                          aria-hidden="false"></span>
                </div>
                <div class="form-group has-feedback">
                    <label class="control-label col-xs-12 col-sm-3" for="basededatos">
                        SGBD
                    </label>

                    <div class="col-xs-12 col-sm-9">
                        <select class="form-control input-sm" name="basededatos" id="basededatos">
                            <option value="">Seleccione un gestor</option>
                            <option value="PostgreSQL">PostgreSQL</option>
                        </select>
                    </div>
                    <span class="icono glyphicon form-control-feedback" id="basededatos1" aria-hidden="false"></span>
                </div>
                <div class="form-group has-feedback">
                    <label class="control-label col-xs-12 col-sm-3" for="nombrebasedatos">
                        base de datos
                    </label>

                    <div class="col-xs-12 col-sm-9">
                        <input type="text" class="form-control input-sm"
                               name="nombrebasedatos" id="nombrebasedatos"/>
                    </div>
                    <span class="icono glyphicon form-control-feedback" id="nombrebasedatos1"
                          aria-hidden="false"></span>
                </div>
                <div class="form-group has-feedback">
                    <label class="control-label col-xs-12 col-sm-3" for="host">
                        host
                    </label>

                    <div class="col-xs-12 col-sm-9">
                        <input type="text" class="form-control input-sm" name="host" id="host"/>
                    </div>
                    <span class="icono glyphicon form-control-feedback" id="host1" aria-hidden="false"></span>
                </div>
                <div class="form-group has-feedback">
                    <label class="control-label col-xs-12 col-sm-3" for="puerto">
                        puerto
                    </label>

                    <div class="col-xs-12 col-sm-9">
                        <input type="text" class="form-control input-sm"
                               name="puerto" id="puerto" value="5432"/>
                    </div>
                    <span class="icono glyphicon form-control-feedback" id="puerto1" aria-hidden="false"></span>
                </div>
                <div class="form-group has-feedback">
                    <label class="control-label col-xs-12 col-sm-3" for="usuario">
                        usuario
                    </label>

                    <div class="col-xs-12 col-sm-9">
                        <input type="text" class="form-control input-sm"
                               name="usuario" id="usuario"/>
                    </div>
                    <span class="icono glyphicon form-control-feedback" id="usuario1" aria-hidden="false"></span>
                </div>
                <div class="form-group has-feedback">
                    <label class="control-label col-xs-12 col-sm-3" for="pass">
                        password
                    </label>

                    <div class="col-xs-12 col-sm-9">
                        <input type="text" class="form-control input-sm" name="pass" id="pass"/>
                    </div>
                    <span class="icono glyphicon form-control-feedback" id="pass1" aria-hidden="false"></span>
                </div>
            </div>
            <div class="panel-footer">
                <a class="btn btn-success cancel" href="javascript:testConection()">test conection</a>
                <button class="btn btn-success navbar-right">crear</button>
            </div>
        </div>
    </form>
</div>