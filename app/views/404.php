{% extends "layout.php" %}

{% block title %}Index{% endblock %}

{% block content %}
    <div class="error">
        <h2>
            <span>404 Error</span>
            <span>Not Found</span>
        </h2>
        <p>Es un error de acceso a la pagina web o hubo un problema de seguridad.</p>
        <a href="{{appUrl}}">Regresar a pagina principal</a>
    </div>   
{% endblock %}