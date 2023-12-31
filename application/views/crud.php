<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD CI-3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <!-- Titulo de la pagina -->
        <div class="row">
            <h1>CRUD</h1>
        </div>

        <!-- Formulario -->
        <div class="mb-5">
            <?php echo form_open('crud/agregar', ['id'=>'form_persona']); ?>
                <div class="row">
                    <div class="form-group col-sm-3">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" required>
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="apellido">Apellido</label>
                        <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Apellido" required>
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" required>
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="">Opciones</label>
                        <div>
                            <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                            <button type="button" class="btn btn-secondary btn-block" onclick="cancelar()">Cancelar</button>
                        </div>
                    </div>
                </div>
            <?php echo form_close(); ?>
        </div>

        <!-- Tabla de datos -->
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h4>Tabla de personas</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Fecha de Nacimiento</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $count = 0;
                                foreach ($personas as $p) {
                                    echo '
                                        <tr>
                                            <th scope="row">'.++$count.'</th>
                                            <td>'.$p->nombre.'</td>
                                            <td>'.$p->apellido.'</td>
                                            <td>'.date("d/m/Y", strtotime($p->fecha_nacimiento)).'</td>
                                            <td>
                                                <button type="button" class="btn btn-warning text-white" onclick="llenar_datos('.$p->persona_id.', `'.$p->nombre.'`, `'.$p->apellido.'`, `'.$p->fecha_nacimiento.'`)">Editar</button>
                                                <a href="'.base_url('crud/eliminar/'.$p->persona_id).'" class="btn btn-danger">Eliminar</a>
                                            </td>
                                        </tr>
                                    ';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script> -->
    <script>
        const url = "<?php echo base_url('crud')?>";
        const llenar_datos = (id, nombre, apellido, fecha_nacimiento) =>{
            const path = url + "/editar/" + id;
            document.getElementById('form_persona').setAttribute('action', path);
            document.getElementById('nombre').value = nombre;
            document.getElementById('apellido').value = apellido;
            document.getElementById('fecha_nacimiento').value = fecha_nacimiento;
        };

        const cancelar = () =>{
            const path = url + "/agregar"
            document.getElementById('form_persona').setAttribute('action', path);
            document.getElementById('nombre').value = "";
            document.getElementById('apellido').value = "";
            document.getElementById('fecha_nacimiento').value = "";
        };
    </script>
</body>

</html>