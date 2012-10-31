{% extends "::layout.twig.tpl" %}

{% block titrepage %}Gérer les films{% endblock %}

{% block content %}
<h1>Gestion des films</h1>
<br />
<a href="{{ path('ajouter_film') }}">Ajouter un nouveau film</a>
<br />
<table>
    <thead>
        <tr>
            <th>N°</th>
            <th>Titre</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>N°</th>
            <th>Titre</th>
            <th>Actions</th>
        </tr>
    </tfoot>
    <tbody>
        {% for f in films %}
        <tr>
            <td>{{ f.id }}</td>
            <td>{{ f.titre }}</td>
            <td><a href="{{ path('editer_film', { id:f.id }) }}">Editer</a> - <a href="{{ path('supprimer_film', { id:f.id }) }}"><img src="{{ asset('/img/cross.png') }}" alt="Supprimer" /></a></td>
        </tr>
        {% endfor %}
    </tbody>
</table>
{% endblock %}