
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca de Arley Patiño</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            color: #1e293b;
        }
        header {
            background: #172554;
            color: white;
            padding: 22px 8%;
        }
        nav {
            display: flex;
            gap: 25px;
            margin-top: 15px;
        }
        nav a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }
        main {
            max-width: 1100px;
            margin: 35px auto;
            padding: 25px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px #00000010;
        }
        .btn {
            display: inline-block;
            background: #2563eb;
            color: white;
            padding: 10px 16px;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            cursor: pointer;
        }
        .btn-danger { background: #dc2626; }
        .btn-warning { background: #d97706; }
        input, select {
            padding: 10px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #e2e8f0;
            text-align: left;
        }
        th { background: #eff6ff; }
        .alert {
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 6px;
        }
        .success { background: #dcfce7; }
        .error { background: #fee2e2; }
    </style>
</head>
<body>
    <header>
        <h1>Biblioteca de Arley Patiño</h1>
        <p>Sistema de gestión de libros y categorías</p>
        <nav>
            <a href="{{ route('libros.index') }}">Libros</a>
            <a href="{{ route('categorias.index') }}">Categorías</a>
        </nav>
    </header>

    <main>
        @if(session('success'))
            <div class="alert success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert error">
                {{ session('error') }}
            </div>
        @endif

        @yield('contenido')
    </main>

<footer style="background-color: #192754; color: white; text-align: center; padding: 20px; margin-top: 40px;">
    <p>Biblioteca de Arley Patiño</p>
    <p>Proyecto desarrollado con Laravel - SENA ADSO</p>
    <p>&copy; {{ date('Y') }} Arley Patiño. Todos los derechos reservados.</p>
</footer>

</body>
</html>
