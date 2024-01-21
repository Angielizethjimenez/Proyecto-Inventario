<div class="container">
    <h1>Crear Nuevo Usuario</h1>
    <form action="{{ route('guardar-usuario') }}" method="post">
        @csrf
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" required>
        </div>
        <div>
            <label for="documento">Documento:</label>
            <input type="text" name="documento" id="documento" required>
        </div>
        <div>
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" required>
        </div>
        <button type="submit">Crear Usuario</button>
    </form>
</div>