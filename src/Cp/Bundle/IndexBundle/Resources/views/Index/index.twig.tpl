{% extends "::layout.twig.tpl" %}

{% block titrepage %}Accueil{% endblock %}

{% block content %}
<div id="film-box">
    <div id="film-content">
        <div id="film-caroussel">
            <foreach var="$films" as="f">
                <span class="film-affiche">
                    <a href="#" title="{f[titre]}"><img alt="{f[titre]}" src="http://placehold.it/110x145" /></a>
                    <div class="infos-film">INFOS</div>
                </span>
            </foreach>
        </div>
    </div>
    <div id="prog-link">
        <a href="programme.html">Films à l'affiche</a>
    </div>
</div>

<div id="news">
    <h1>Acutalités</h1>
    <div id="news-container">
        <foreach var="$news" as="n">
            <div class="news-box" id="n{n[id]}">
                <h2 class="news-titre">{n[titre]}</h2>
                <div class="news-contenu">
                    {n[contenu]}
                </div>
            </div>
        </foreach>
    </div>
</div>
{% endblock %}