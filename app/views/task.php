<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tareas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.2.2/datatables.min.css" rel="stylesheet" integrity="sha384-WMi+Ec+QE8hxW/3qKvuefShIddYjwMalSgy0MR4FZnl285C4HGYfISceaagw0Am3" crossorigin="anonymous">

</head>

<body class="container">
    <header class="py-3">
        <div class="row">
            <div class="col-8 d-flex">
                <h1>
                    My To-Do List
                </h1>
            </div>
            <div class="col-4 d-flex align-items-end justify-content-end">
                <button type="button" class="me-2 btn" onclick="changeMode()"><i id="themeIcon" class='bx bxs-sun'></i></button>
                <button class="btn btn-success d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Agregar tarea
                    <i class='bx bx-plus-circle bx-rotate-90 ms-2' style='color:#ffffff'></i>
                </button>
            </div>
        </div>
    </header>
    <main>
        <div>
            <div class="card">
                <div class="card-header">
                    Tareas registradas
                </div>
                <div class="card-body">
                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">
                                    #
                                </th>
                                <th scope="col">
                                    Tarea
                                </th>
                                <th scope="col">
                                    Descripción
                                </th>
                                <th scope="col">
                                    Fecha de creacion
                                </th>
                                <th scope="col">
                                    Estado
                                </th>
                                <th scope="col">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal Regsitrar-->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="">
                            <div class="mb-1">
                                <label for="tarea" class="form-label">Tarea:</label>
                                <input type="text" class="form-control" id="tarea">
                            </div>
                            <div class="mb-1">
                                <label for="desc" class="form-label">Descripción:</label>
                                <textarea name="desc" id="desc" rows="5" class="form-control"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" onclick="registrar()">Registrar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Actualizar-->
        <div class="modal fade" id="modalActualizar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Actualizar tarea</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="">
                            <div class="mb-1">
                                <input type="hidden" id="idAct">
                                <label for="tarea" class="form-label">Tarea:</label>
                                <input type="text" class="form-control" id="tareaAct">
                            </div>
                            <div class="mb-1">
                                <label for="desc" class="form-label">Descripción:</label>
                                <textarea name="desc" id="descAct" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="mb-1">
                                <label for="desc" class="form-label">Estado:</label>
                                <select id="estadoAct" class="form-select pt-1">
                                    <option value="0">Pendiente</option>
                                    <option value="1">Finalizada</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" onclick="actualizar()">Actualizar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Informacion-->
        <div class="modal fade" id="modalInfo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="infoTitulo"></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <b class="d-inline">Estado: </b>
                        <p class="d-inline" id="infoEstado">Finalizado</p>
                        <br>
                        <b>Descripción</b>
                        <p id="infoDescripcion"></p>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha384-ogycHROOTGA//2Q8YUfjz1Sr7xMOJTUmY2ucsPVuXAg4CtpgQJQzGZsX768KqetU" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js" integrity="sha384-gGekiWQ/bm8p71RTsvhPShoIBxcf8BsVjRTi0WY8FvxuQa2nKS0PKHiSXV9nfW/A" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js" integrity="sha384-2IrcDZstSOMFTMxGhnJHQtNpSfUopdFXCOaDviGVHw/kuF34fSSaVqL20jnkJctu" crossorigin="anonymous"></script>


    <script>
        let tablaTareas = null;

        document.addEventListener('DOMContentLoaded', () => {
            cargarTabla();
        });

        function cargarTabla() {
            fetch('https://mytodo.dev/taskdataapi')
                .then(response => response.json())
                .then(data => {
                    if (tablaTareas) {
                        tablaTareas.clear();
                        tablaTareas.rows.add(data);
                        tablaTareas.draw();
                    } else {
                        tablaTareas = new DataTable('#myTable', {
                            data: data,
                            columns: [{
                                    data: 'id'
                                },
                                {
                                    data: 'tarea'
                                },
                                {
                                    data: 'descripcion',
                                    render: function(data, type, row) {
                                        if (type !== 'display') return data;
                                        const palabras = data.split(' ');
                                        const resumen = palabras.slice(0, 10).join(' ') + (palabras.length > 10 ? '...' : '');
                                        return `<span title="${data}">${resumen}</span>`;
                                    }
                                },
                                {
                                    data: 'fecha_creacion'
                                },
                                {
                                    data: 'terminado',
                                    render: (data) => data == 1 ? 'Finalizada' : 'Pendiente'
                                },
                                {
                                    render: (data, type, row) => `
                                    <button type="button" class="btn btn-info"
                                    data-tarea="${row.tarea}" 
                                    data-descripcion="${row.descripcion}"
                                    data-terminado="${row.terminado}"
                                    data-bs-toggle="modal" data-bs-target="#modalInfo"
                                    ><i class='bx bx-info-circle'></i></button>
                                    <button type="button" class="btn btn-warning btn-editar" 
                                    data-id="${row.id}" 
                                    data-tarea="${row.tarea}" 
                                    data-descripcion="${row.descripcion}"
                                    data-terminado="${row.terminado}"
                                    data-bs-toggle="modal" data-bs-target="#modalActualizar"><i class='bx bxs-edit'></i></button>
                                    <button type="button" class="btn btn-danger btn-eliminar" data-id="${row.id}" ><i class='bx bxs-trash'></i></button>
                                `
                                }
                            ]
                        });
                    }
                })
                .catch(error => console.error('Error:', error));
        }


        function changeMode() {
            let mode = document.documentElement.getAttribute('data-bs-theme');
            document.documentElement.setAttribute('data-bs-theme', mode == 'dark' ? 'light' : 'dark');
            mode = document.documentElement.getAttribute('data-bs-theme');
            if (mode == 'dark') {
                document.getElementById('themeIcon').classList.remove('bxs-moon')
                document.getElementById('themeIcon').classList.add('bxs-sun')
            } else if (mode == 'light') {
                document.getElementById('themeIcon').classList.remove('bxs-sun')
                document.getElementById('themeIcon').classList.add('bxs-moon')
            }
        }

        function registrar() {
            let regTarea = document.getElementById('tarea').value;
            let regDesc = document.getElementById('desc').value;

            const dataReg = {
                tarea: regTarea,
                desc: regDesc
            };

            fetch('https://mytodo.dev/taskregisterapi', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(dataReg)
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Respuesta: ', data);

                    // Cerrar el modal después de registrar
                    const modalElement = document.getElementById('staticBackdrop');
                    const modalInstance = bootstrap.Modal.getInstance(modalElement) || new bootstrap.Modal(modalElement);
                    modalInstance.hide();

                    // Recargar la tabla SOLO después de que el registro haya sido exitoso
                    cargarTabla();
                })
                .catch(error => {
                    console.error('Error: ', error);
                });
        }

        function actualizar() {
            let idAct = document.getElementById('idAct').value;
            let tareaAct = document.getElementById('tareaAct').value;
            let descAct = document.getElementById('descAct').value;
            let estadoAct = document.getElementById('estadoAct').value;

            const dataReg = {
                id: idAct,
                tarea: tareaAct,
                desc: descAct,
                estado: estadoAct
            };

            fetch('https://mytodo.dev/taskupdateapi', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(dataReg)
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Respuesta: ', data);

                    // Cerrar el modal después de registrar
                    const modalElement = document.getElementById('modalActualizar');
                    const modalInstance = bootstrap.Modal.getInstance(modalElement) || new bootstrap.Modal(modalElement);
                    modalInstance.hide();

                    // Recargar la tabla SOLO después de que el registro haya sido exitoso
                    cargarTabla();
                })
                .catch(error => {
                    console.error('Error: ', error);
                });
        }

        document.body.addEventListener('click', function(event) {
            const btn = event.target.closest('.btn-editar')
            if (event.target.closest('.btn-editar')) {
                const id = btn.dataset.id;
                const tarea = btn.dataset.tarea;
                const descripcion = btn.dataset.descripcion;
                const terminado = btn.dataset.terminado;

                document.getElementById('idAct').value = id;
                document.getElementById('tareaAct').value = tarea;
                document.getElementById('descAct').value = descripcion;
                document.getElementById('estadoAct').value = terminado;
            }
        });
        document.body.addEventListener('click', function(event) {
            const btn = event.target.closest('.btn-info')
            if (event.target.closest('.btn-info')) {
                const tarea = btn.dataset.tarea;
                const descripcion = btn.dataset.descripcion;
                const terminado = btn.dataset.terminado;

                document.getElementById('infoTitulo').innerText = tarea;
                document.getElementById('infoDescripcion').innerText = descripcion;
                document.getElementById('infoEstado').innerText = terminado == 1 ? 'Finalizada' : 'Pendiente';
            }
        });
        document.body.addEventListener('click', function(event) {
            const btn = event.target.closest('.btn-eliminar')
            if (event.target.closest('.btn-eliminar')) {
                const id = btn.dataset.id;
                const data = {id}

                let alerta = window.confirm('¿Esta seguro de eliminar este registro?')
                if (alerta) {
                    fetch('https://mytodo.dev/taskdeleteapi', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify(data)
                        })
                        .then(response => response.json())
                        .then(data => {
                            console.log('Respuesta: ', data);
                            // Recargar la tabla SOLO después de que el registro haya sido exitoso
                            cargarTabla();
                        })
                        .catch(error => {
                            console.error('Error: ', error);
                        });
                }
            }
        });
    </script>
</body>

</html>