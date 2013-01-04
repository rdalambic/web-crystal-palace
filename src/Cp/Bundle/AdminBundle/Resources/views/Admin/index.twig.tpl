{% extends "::layout.twig.tpl" %}

{% block titrepage %}Administration{% endblock %}

{% block content %}
<h1>Administration du site</h1>
<br />
<div id="admin_links">
    <a href="{{ path('gerer_film') }}">Gérer les films</a> | <a href="{{ path('gerer_programme') }}">Gérer les programmes</a> | <a href="{{ path('gerer_actu') }}">Gérer les actus</a>
</div>
{% endblock %}