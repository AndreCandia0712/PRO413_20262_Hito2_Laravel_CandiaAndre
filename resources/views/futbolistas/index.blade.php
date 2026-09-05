<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Futbolistas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">
    <div class="container">
        <h1 class="mb-4">Gestión de Futbolistas</h1>

        <div class="card mb-4">
            <div class="card-header fw-bold">Registrar Nuevo Futbolista</div>
            <div class="card-body">
                <form action="{{ route('futbolistas.store') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-4">
                            <input type="text" name="nombre" class="form-control" placeholder="Nombre completo" required>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="posicion" class="form-control" placeholder="Posición" required>
                        </div>
                        <div class="col-md-2">
                            <input type="number" name="numeroCamiseta" class="form-control" placeholder="N° Camiseta" required>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary w-100">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header fw-bold">Lista de Futbolistas (Desde API Quarkus)</div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Posición</th>
                            <th>N° Camiseta</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($futbolistas as $jugador)
                            <tr>
                                <td>{{ $jugador['id'] ?? '-' }}</td>
                                <td>{{ $jugador['nombre'] ?? '-' }}</td>
                                <td>{{ $jugador['posicion'] ?? '-' }}</td>
                                <td>{{ $jugador['numeroCamiseta'] ?? '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No hay futbolistas registrados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>