{% extends "layout.php" %}

{% block title %}Forgot password{% endblock %}

{% block content %}
    <h2>Recuperar contraseña</h2>
    <p>Ingresa tu email y te enviaremos un link donde puedes introducir tu nueva contraseña</p>
    <section id="user-form">
        <div class="form">
            <form action="{{appUrl}}/verifyemail" method="post">
                <input type="hidden" name="token" value="{{sessionToken}}">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
                <input type="submit" class="btn-click" value="Recuperar contraseña">
            </form>
        </div>
    </section>
{% endblock %}