{% extends "layout.php" %}

{% block title %}Forgot password{% endblock %}

{% block content %}
    <h2>Cambiar contraseña</h2>
    <p>Ingresa tu nueva contraseña para recuperar acceso a la cuenta</p>
    <section id="user-form">
        <div class="form">
            <form action="{{appUrl}}/changepassword" method="post">
                <input type="hidden" name="token" value="{{sessionToken}}">
                <input type="hidden" name="id" value="{{id}}">
                <label for="password">Ingresa tu nueva contraseña</label>
                <input type="password" id="password" name="password" required>
                <label for="cbpassword">Vuelva a ingresar tu nueva contraseña</label>
                <input type="password" id="cbpassword" name="cbpassword" required>
                <input type="submit" class="btn-click" value="Cambiar contraseña">
            </form>
        </div>
    </section>
{% endblock %}