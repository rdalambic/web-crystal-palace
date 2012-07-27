{% extends "::layout.twig.tpl" %}

{% block titrepage %}Cette semaine{% endblock %}

{% block content %}
<h3 class="programme">Programme du {{ dateDebut }} au {{ dateFin }}</h3>
<div id="film-list-box">
    <div id="film-list">
        {% for f in programme.getFilms() %}
            <div class="film-prog-box">
                <div class="infos-film-content">
                    <a href="{{ path('film_fiche', { id: f.id }) }}" ><img src="{{ f.affiche }}" class="affiche_small" alt="Affiche du film {{ f.titre }}" /></a>
                    <div class="infos-box-film">
                        <h4 class="film-titre">{{ f.titre }}</h4>
                    </div>
                </div>
            </div>
        {% endfor %}
    </div>
</div>
{% endblock %}