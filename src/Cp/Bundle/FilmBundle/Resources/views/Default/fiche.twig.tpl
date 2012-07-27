{% extends "::layout.twig.tpl" %}

{% block titrepage %}{{ film.titre }}{% endblock %}

{% block content %}
<h1>{{ film.titre }}</h1>
<div class="fiche-film">
    <div class="left-fiche">
        <a href=""><img src="{{ film.affiche }}" alt="Affiche du film {{ film.titre }}" /></a>
    </div>
    <p>Réalisé par <strong>{{ film.realisateur }}</strong><br />
        Avec <strong>{{ film.acteurs }}</strong>
    </p>
    <p>Durée : <strong>{{ film.duree }}</strong></p>
    <h4>Synopsis</h4>
    <p>
        {{ film.fiche|raw }}
    </p>
    <div class="clear">
</div>
{% endblock %}