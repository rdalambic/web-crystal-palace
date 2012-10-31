{% extends "::layout.twig.tpl" %}

{% block titrepage %}Ajouter un film{% endblock %}

{% block content %}
<h1>Ajouter un film</h1>
<br />
{{ form_errors(form) }}
<div class="form-container">
    <form action="#" method="post" {{ form_enctype(form) }} >
        <fieldset>
            <legend>Information principales</legend>
            <div><label>Titre</label> {{ form_widget(form.titre) }}</div>
            <div><label>Réalisateur</label> {{ form_widget(form.realisateur) }}</div>
            <div><label>Acteurs</label> {{ form_widget(form.acteurs) }}</div>
            <div><label>Durée</label> {{ form_widget(form.duree_h) }}h{{ form_widget(form.duree_m) }}</div>
            <div><label>Version</label> {{ form_widget(form.version) }}</div>
        </fieldset>
        <fieldset>
            <legend>Affiche</legend>
            <div><label>Url de l'affiche</label> {{ form_widget(form.affiche) }}</div>
        </fieldset>
        <fieldset>
            <legend>Pages</legend>
            <div><label>Synopsis</label> {{ form_widget(form.resume) }}</div>
            <div><label>Fiche du film</label> {{ form_widget(form.fiche) }}</div>
        </fieldset>
            {{ form_rest(form) }}
        <input type="submit" />
    </form>
</div>
{% endblock %}