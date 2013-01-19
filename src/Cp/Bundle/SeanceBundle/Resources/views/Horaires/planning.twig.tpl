{% extends "::layout.twig.tpl" %}

{% block titrepage %}Les horaires{% endblock %}

{% block content %}

<h1>Les horaires</h1>

<table>
    <thead>
        <tr>
            <th>FILMS</th>
            
            {% for w in weekdays %}
                <th>{{ w }}</th>
            {% endfor %}            
        </tr>
    </thead>
    
    <tbody>
        {% for f in programme.getFilms() %}
            
            <tr>
                <td>{{ f.titre }}</td>            
            
            {% if attribute(showsList, f.id) is defined %}
                
                {% set filmShows = attribute(showsList, f.id) %}
                
                {% for i in 1..7 %}
                
                    {% if attribute(filmShows, i) is defined %}
                <td>
                    {% for s in attribute(filmShows, i) %}
                        {{ s }}<br />
                    {% endfor %}
                </td>
                {% else %}
                <td>
                    X
                </td>
                    {% endif %}
                
                {% endfor %}
            
            {% endif %}
            </tr>
        {% endfor %}
    </tbody>
    
</table>

{% endblock %}