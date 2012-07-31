{% extends "::layout.twig.tpl" %}

{% block titrepage %}Nous contacter{% endblock %}

{% block content %}
<h1>Nous contacter</h1>

<div class="form-container">
    {#{% if error %}
        <div class="errors">
            <p><em>Erreurs :</em></p>
            <ul>
                {% for e in errors %}
                    <li>{{ e }}</li>
                {% endfor %}
            </ul>
        </div>
    {% endif %}#}
        
        <form action="#" method="post">
            
            <p class="legend">Les champs marqués d'un <em>*</em> sont requis.</p>
            
            <fieldset>
                <legend>Contact</legend>
                <div><label for="email">Votre email <em>*</em></label> <input type="text" name="email" id="email" /></div>
                <div><label for="sujet">Sujet <em>*</em></label> <input id="sujet" name="sujet" type="text" /></div>
                <div><label for="msg">Votre message <em>*</em></label>
                    <textarea id="msg" name="msg" cols="50" rows="10"></textarea>
                </div>
            </fieldset>
            
            <div class="buttonrow">
                <input type="submit" value="Envoyer" class="button" />
            </div>
        </form>
</div>
{% endblock %}