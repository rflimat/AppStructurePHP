<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{% block title %}{% endblock %} - AppStructurePHP</title>
    <link rel="stylesheet" href="{{appUrl}}/../app/assets/css/styles.css">
    <link rel="stylesheet" href="{{appUrl}}/../app/assets/fonts/fontawesome-free-6.1.1-web/all.min.css">
</head>
<body>
    <header>
        <div id="logo">
            <a href="{{appUrl}}">AppStructurePHP</a>
        </div>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fa-solid fa-bars"></i>
        </label>
        <nav>
            <ul>
                <li>
                    <a href="{{appUrl}}">Home</a>
                </li>
                <li>
                    <a href="{{appUrl}}/proyectos">Proyecto</a>
                </li>
                <li>
                    <a href="{{appUrl}}/api/proyectos">API</a>
                </li>
                <li>
                    <a href="https://github.com/rflimat/" target="_blank">Github</a>
                </li>
                <li>
                    {%if sessionUser is null %} 
                        <a href="{{appUrl}}/login">Login</a>
                    {% else %} 
                        <a href="{{appUrl}}/logout">Logout</a>
                    {% endif %}
                </li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="container">
            {% block content %}{% endblock %}
        </div>
    </main>
    <footer>
        <p>Desarrollado por Raul Lima &copy; {{ now|date('Y') }}</p>
        <p>Todos los derechos reservados</p>
    </footer>

    <script src="{{appUrl}}/../app/assets/js/script.js"></script>
</body>
</html>