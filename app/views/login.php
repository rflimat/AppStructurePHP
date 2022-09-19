{% extends "layout.php" %}

{% block title %}Login{% endblock %}

{% block content %}
    <h2>Iniciar sesión</h2>
    <section id="user-form">
        <div class="form">
            <form action="{{appUrl}}/autenticate" method="post">
                <input type="hidden" name="token" value="{{sessionToken}}">
                <label for="user">Usuario</label>
                <input type="text" id="user" name="user" required>
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" required>
                <input type="submit" class="btn-click" value="Iniciar sesión">
            </form>
        </div>
        <div id="links-login">
            <h5>
                <a href="{{appUrl}}/signup">Crear cuenta</a>
            </h5>
            <h5>
                <a href="{{appUrl}}/forgotpassword">¿Olvidaste tu contraseña?</a>
            </h5>
        </div>
    </section>
{% endblock %}