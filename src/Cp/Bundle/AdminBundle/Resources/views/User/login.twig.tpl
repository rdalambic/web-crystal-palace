{% extends "::layout.twig.tpl" %}

{% block titrepage %}Connexion{% endblock %}

{% block content %}
<h1>Connexion</h1>
<p>Veuillez vous identifier pour accèder à cette section du site.</p>

{% if error %}
<div>{{ error.message }}</div>
{% endif %}

<div class="form-container">
    {% if error %}
        <div class="errors">
            <p><em>Erreurs : </em></p>
            <ul>
                <li>{{ error.message }}</li>
            </ul>
        </div>
    {% endif %}

        <form action="{{ path('login_check') }}" method="post">
            <fieldset>
                <legend>Connexion</legend>
                <div><label for="username">Login :</label> <input type="text" id="username" name="_username" value="{{ last_username }}" /></div>

                <div><label for="password">Mot de passe :</label> <input type="password" id="password" name="_password" /></div>
            </fieldset>

            <div class="buttonrow">
                <button type="submit">Connexion</button>
            </div>
        </form>
    </div>
{% endblock %}