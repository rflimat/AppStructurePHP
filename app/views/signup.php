{% extends "layout.php" %}

{% block title %}Signup{% endblock %}

{% block content %}
    <h2>Registrarse</h2>
    <section id="user-form">
        <div class="form">
            <form action="{{appUrl}}/register" method="post">
                <input type="hidden" name="token" value="{{sessionToken}}">
                <label for="name">Nombre</label>
                <input type="text" id="name" name="name" required>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
                <label for="user">Usuario</label>
                <input type="text" id="user" name="user" required>
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" required>
                <input type="submit" class="btn-click" value="Registrarse">
            </form>
        </div>
    </section>
{% endblock %}