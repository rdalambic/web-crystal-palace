{% extends "::layout.twig.tpl" %}

{% block titrepage %}Ajouter un film{% endblock %}

{% block content %}
<h1>Ajouter un film</h1>
<br />
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
        <input type="submit" />
    </form>
</div>
{% endblock %}