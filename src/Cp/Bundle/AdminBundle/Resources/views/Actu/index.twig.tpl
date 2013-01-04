{% extends "::layout.twig.tpl" %}

{% block titrepage %}Gérer les actus{% endblock %}

{% block content %}
<h1>Gestion des actus</h1>
<br />
<a href="{{ path('ajouter_actu') }}">Ajouter une actu</a>
<br />
{% if news %}
<table>
    <thead>
        <tr>
            <th>N°</th>
            <th>Titre</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>N°</th>
            <th>Titre</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </tfoot>
    <tbody>
        {% for n in news %}
        <tr>
            <td>{{ n.id }}</td>
            <td>{{ n.titre }}</td>
            <td>{{ n.date|date('d/m/Y') }}</td>
            <td><a href="">Editer</a> - <a href=""><img src="{{ asset('/img/cross.png') }}" alt="Supprimer" /></a></td>
        </tr>        
        {% endfor %}
    </tbody>
</table>
{% else %}
<p>Pas d'actu pour le moment...</p>
{% endif %}
{% endblock %}