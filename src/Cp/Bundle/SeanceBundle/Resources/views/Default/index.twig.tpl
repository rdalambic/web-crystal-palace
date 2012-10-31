{% extends "::layout.twig.tpl" %}

{% block titrepage %}Séances{% endblock %}

{% block content %}
<table>
    <thead>
        <tr>
            <th>Films</th>
            <th>MER XX</th>
            <th>JEU XX</th>
            <th>VEN XX</th>
            <th>SAM XX</th>
            <th>DIM XX</th>
            <th>LUN XX</th>
        </tr>
    </thead>    
    <tbody>
        {% for f in programme.getFilms() %}
            <tr>
                <th><a href="">{{ f.titre }}</a></th>
                
            </tr>
        {% endfor %}
    </tbody>
</table>
{% endblock %}