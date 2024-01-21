<div class="container">
    <h1>Crear Nuevo Equipo</h1>
    <form action="{{ route('guardar-equipo') }}" method="post">
        @csrf
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" required>
        </div>
        <div>
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" id="descripcion"></textarea>
        </div>
        <div>
            <label for="estado">Estado:</label>
            <select name="estado" id="estado">
                <option value="disponible">Disponible</option>
                <option value="asignado">Asignado</option>
            </select>
        </div>
        <button type="submit">Crear Equipo</button>
    </form>
</div>