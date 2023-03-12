{% extends "layout.php" %}

{% block title %}Proyectos{% endblock %}

{% block content %}
<h2>Proyectos</h2>
<div class="layout">
    <section id="form-projects">
        <div class="form">
            <form action="{{appUrl}}/projects/insert" method="post" enctype="multipart/form-data">
                <input type="hidden" name="token" value="{{sessionToken}}">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" required>
                <label for="imagen">Imagen</label>
                <input type="file" id="imagen" name="imagen" required>
                <label for="descripcion">Descripcion</label>
                <textarea id="descripcion" name="descripcion" required></textarea>
                <input type="submit" class="btn-click green" value="Guardar proyecto">
            </form>
        </div>
    </section>
    <section id="list-projects">
        <div id="search-form">
            <form action="{{appUrl}}/projects/search" method="get">
                <input type="hidden" name="token" value="{{sessionToken}}">
                <input type="text" name="nombre" id="nombre" value="" placeholder="Ingrese nombre de proyecto">
                <button class="button skyblue" type="submit">Buscar</button>
            </form>
        </div>
        <table class="table">
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Imagen</th>
                <th>Accion</th>
            </tr>
            {% for project in projects %}
            <tr>
                <td>{{project.id}}</td>
                <td>{{project.name}}</td>
                <td>{{project.description}}</td>
                <td>
                    <img src="{{appUrl}}/../app/storage/projects/{{project.image}}" alt="">
                </td>
                <td class="accion-col">
                    <form action="{{appUrl}}/projects/edit" method="get">
                        <input type="hidden" name="token" value="{{sessionToken}}">
                        <input type="hidden" name='id' value="{{project.id}}">
                        <button class="button blue">Actualizar</button>
                    </form>
                    <form action="{{appUrl}}/projects/delete/{{project.id}}" method="post">
                        <input type="hidden" name="token" value="{{sessionToken}}">
                        <input type="hidden" name='id' value="{{project.id}}">
                        <input type="hidden" name='_METHOD' value="DELETE">
                        <button class="button red">Eliminar</button>
                    </form>
                </td>
            </tr>
            {% endfor %}
        </table>
    </section>
</div>
{% endblock %}