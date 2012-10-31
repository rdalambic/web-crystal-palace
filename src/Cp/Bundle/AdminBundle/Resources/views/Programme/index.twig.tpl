{% extends "::layout.twig.tpl" %}

{% block titrepage %}Gérer les programmes{% endblock %}

{% block content %}
<h1>Gestion des programmes</h1>
<br />
<a href="{{ path('ajouter_programme') }}">Ajouter un nouveau programme</a>
<br />
<table>
    <thead>
        <tr>
            <th>N°</th>
            <th>Date de début</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>N°</th>
            <th>Date de début</th>
            <th>Actions</th>
        </tr>
    </tfoot>
    <tbody>
        {% for p in progs %}
        <tr>
            <td>{{ p.id }}</td>
            <td>{{ p.date|date("d/m/Y") }}</td>
            <td><a href="{{ path('editer_programme', { id:p.id }) }}">Editer</a> - <a href="{{ path('supprimer_programme', { id:p.id }) }}">Supprimer</a></td>
        </tr>
        {% endfor %}
    </tbody>
</table>
{% endblock %}