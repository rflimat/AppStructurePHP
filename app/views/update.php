{% extends "layout.php" %}

{% block title %}Index{% endblock %}

{% block content %}
    <h2>Actualizar proyecto</h2>
    <div class="form">
        <form action="{{appUrl}}/proyectos/update/{{proyecto.id}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="token" value="{{sessionToken}}">
            <input type="hidden" name='id' value="{{proyecto.id}}">
            <input type="hidden" name='imagen' value="{{proyecto.imagen}}">
            <input type="hidden" name='_METHOD' value="PUT">
            <label for="id">Id</label>
            <input type="text" id="id" name="id" value="{{proyecto.id}}" disabled>
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" value="{{proyecto.nombre}}" required>
            <label for="newimagen">
                Imagen
                <a href="{{appUrl}}/../app/storage/projects/{{proyecto.imagen}}" target="_blank">(Ver imagen)</a> 
            </label>
            <input type="file" id="newimagen" name="newimagen">
            <label for="descripcion">Descripcion</label>
            <textarea id="descripcion" name="descripcion" required>{{proyecto.descripcion}}</textarea>
            <input type="submit" class="btn-click green" value="Actualizar proyecto">
        </form>
    </div>
{% endblock %}