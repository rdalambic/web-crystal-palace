{% extends "::layout.twig.tpl" %}

{% block titrepage %}Accueil{% endblock %}

{% block javascript_head %}
    {{ parent() }}
<script type="text/javascript" src="{{ asset('/js/rd_ui_class.js') }}"></script>
{% endblock %}

{% block content %}

{% if programme %}
<div id="film-box">
    <div id="film-content">
        <div id="film-caroussel">
            {% for f in programme.getFilms() %}
                <span class="film-affiche">
                    <a href="{{ path('film_fiche', { id: f.id }) }}" title="{{ f.titre }}"><img class="affiche_small" alt="{{ f.titre }}" src="{{ f.affiche }}" /></a>
                    <div class="infos-film">INFOS</div>
                </span>
            {% endfor %}
            </div>
        </div>
        <div id="prog-link">
            <a href="{{ path('programme_cette_semaine') }}">Films à l'affiche</a>
        </div>
    </div>
{% else %}
<p>Désolé, aucun programme pour le moment...</p>
{% endif %}

    <div id="news">
       <!--<h1>Acutalités</h1>-->
        <div id="news-container">
        {% for a in actus %}
                <div class="news-box" id="n{{ a.id }}">
                    <h3 class="news-titre">{{ a.titre }}</h3>
                    <div class="news-contenu">
                    {{ a.contenu }}
                        </div>
                    </div>
            {% else %}
                    <p>Aucune actu en ce moment.</p>
        {% endfor %}
                </div>
            </div>
{% endblock %}