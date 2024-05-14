<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Mi Aplicación</title>
    
</head>
<body>
    <header>
       
        <nav>
            <ul>
                <li><a href="{{ route('home') }}">Inicio</a></li>
                <li><a href="{{ route('empleados.index') }}">Empleados</a></li>
                
            </ul>
        </nav>
    </header>
    
    <main>
        
        <h1>Bienvenido a Mi Aplicación</h1>
        <p>Esta es la página de inicio de mi aplicación. Puedes agregar contenido adicional aquí.</p>
    </main>

    <footer>
        
        <p>&copy; {{ date('Y') }} Mi Aplicación. Todos los derechos reservados.</p>
    </footer>

    
</body>
</html>
