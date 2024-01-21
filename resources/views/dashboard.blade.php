<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Aquí puedes enlazar hojas de estilo o scripts si es necesario -->
    <style>
        *{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
}
body{
    font-family: Helvetica;
    -webkit-font-smoothing: antialiased;
}
h2{
    text-align: center;
    font-size: 18px;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: white;
    padding: 30px 0;
}

/* Table Styles */

.table-wrapper{
    margin: 10px 70px 70px;
    box-shadow: 0px 35px 50px rgba( 0, 0, 0, 0.2 );
}

.fl-table {
    border-radius: 5px;
    font-size: 12px;
    font-weight: normal;
    border: none;
    border-collapse: collapse;
    width: 100%;
    max-width: 100%;
    white-space: nowrap;
    background-color: white;
}

.fl-table td, .fl-table th {
    text-align: center;
    padding: 8px;
}

.fl-table td {
    border-right: 1px solid #f8f8f8;
    font-size: 12px;
}

.fl-table thead th {
    color: #ffffff;
    background: #4FC3A1;
}


.fl-table thead th:nth-child(odd) {
    color: #ffffff;
    background: #324960;
}

.fl-table tr:nth-child(even) {
    background: #F8F8F8;
}

/* Responsive */

@media (max-width: 767px) {
    .fl-table {
        display: block;
        width: 100%;
    }
    .table-wrapper:before{
        content: "Scroll horizontally >";
        display: block;
        text-align: right;
        font-size: 11px;
        color: white;
        padding: 0 0 10px;
    }
    .fl-table thead, .fl-table tbody, .fl-table thead th {
        display: block;
    }
    .fl-table thead th:last-child{
        border-bottom: none;
    }
    .fl-table thead {
        float: left;
    }
    .fl-table tbody {
        width: auto;
        position: relative;
        overflow-x: auto;
    }
    .fl-table td, .fl-table th {
        padding: 20px .625em .625em .625em;
        height: 60px;
        vertical-align: middle;
        box-sizing: border-box;
        overflow-x: hidden;
        overflow-y: auto;
        width: 120px;
        font-size: 13px;
        text-overflow: ellipsis;
    }
    .fl-table thead th {
        text-align: left;
        border-bottom: 1px solid #f7f7f9;
    }
    .fl-table tbody tr {
        display: table-cell;
    }
    .fl-table tbody tr:nth-child(odd) {
        background: none;
    }
    .fl-table tr:nth-child(even) {
        background: transparent;
    }
    .fl-table tr td:nth-child(odd) {
        background: #F8F8F8;
        border-right: 1px solid #E6E4E4;
    }
    .fl-table tr td:nth-child(even) {
        border-right: 1px solid #E6E4E4;
    }
    .fl-table tbody td {
        display: block;
        text-align: center;
    }
}
    </style>
</head>
<body>
    <div class="container">
        <h1>Dashboard</h1>
        <div>
        <!-- Botón para agregar usuarios -->
        <a href="{{ route('crear-usuario') }}" class="btn btn-primary">Agregar Usuario</a>

        <!-- Botón para agregar equipos -->
        <a href="{{ route('crear-equipo') }}" class="btn btn-primary">Crear Equipo</a>
    </div>
        <div class='table-wrapper'>
        <section>
            <h2>Equipos</h2>
            <table class="fl-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Usuario Asignado</th> <!-- Nueva columna -->
                </tr>
            </thead>
            <tbody>
                @foreach ($equipos as $equipo)
                    <tr>
                        <td>{{ $equipo->id }}</td>
                        <td>{{ $equipo->nombre }}</td>
                        <td>{{ $equipo->descripcion }}</td>
                        <td>{{ $equipo->estado }}</td>
                        <td>
                            @foreach ($equipo->users as $usuario)
                                {{ $usuario->nombre }}<br>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </table>
        </section>
        
        <section>
            <h2>Usuarios</h2>
            <table class="fl-table">
            <thead>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Equipos Asignados</th> <!-- Columna para equipos asignados -->
                    <th>Acciones</th> <!-- Columna para el botón de asignar -->
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->id }}</td>
                        <td>{{ $usuario->nombre }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>
                            @foreach ($usuario->equipos as $equipo)
                                {{ $equipo->nombre }}<br>
                            @endforeach
                        </td>
                        <td>
                            <!-- Botón para asignar equipo -->
                            <a href="{{ route('formulario-asignar', ['userId' => $usuario->id]) }}" class="btn btn-primary">Asignar Equipo</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

            </table>
        </section>
        </div>
    </div>
</body>
</html>