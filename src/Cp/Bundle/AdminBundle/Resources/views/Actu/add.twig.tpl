{% extends "::layout.twig.tpl" %}

{% block titrepage %}Ajouter une actu{% endblock %}

{% block content %}
<h1>Ajouter une actu</h1>
<br />
<style>
        
</style>
{{ form_errors(form) }}
<div class="form-container">
    <form action="#" method="post" {{ form_enctype(form) }} >
        <fieldset>
            <legend>Titre</legend>
            <div><label>Titre</label> {{ form_widget(form.titre) }}</div>
            <div><label>Destination</label> {{ form_widget(form.affichage) }}</div>
        </fieldset>
        <fieldset>
            <legend>Texte</legend>                  
            <div><label>Contenu</label> {{ form_widget(form.contenu) }}</div>            
        </fieldset>
            {{ form_rest(form) }}
            <input type="submit" value="Poster l'actu" />
    </form>
</div>
{% endblock %}