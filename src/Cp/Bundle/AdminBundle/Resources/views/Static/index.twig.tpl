{% extends "::layout.twig.tpl" %}

{% block titrepage %}Ajout d'un programme{% endblock %}

{% block content %}
<h1>Ajout d'un nouveau programme</h1>
<br />
<div class="form-container">
    {{ form_errors(form) }}
    <form action="#" method="post" {{ form_enctype(form) }} >
        <fieldset>
            <legend>Date</legend>
            <div>{{ form_label(form.date, "Date de début du programme (mercredi)") }} : {{ form_widget(form.date) }}</div>
        </fieldset>
        <fieldset>
            <legend>Films</legend>
            <div>{{ form_widget(form.films) }}</div>
        </fieldset>

        <div class="buttonrow">
            <input type="submit" value="Ajouter le programme" class="button" />
        </div>

            {{ form_rest(form) }}
    </form>
</div>    
{% endblock %}