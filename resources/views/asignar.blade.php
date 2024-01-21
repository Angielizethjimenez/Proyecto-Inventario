<div class="container">
    <h1>Asignar/Devolver Equipo a Usuario</h1>
    <form action="{{ route('asignar') }}" method="post">
        @csrf
        <div>
            <label for="userId">Usuario:</label>
            <select name="userId" id="userId">
                @foreach ($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="equipo_id">Equipo:</label>
            <select name="equipo_id" id="equipo_id">
                @foreach ($equipos as $equipo)
                    <option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="accion">Acción:</label>
            <select name="accion" id="accion">
                <option value="asignar">Asignar</option>
                <option value="devolver">Devolver</option>
            </select>
        </div>
        <button type="submit">Ejecutar</button>
    </form>
</div>