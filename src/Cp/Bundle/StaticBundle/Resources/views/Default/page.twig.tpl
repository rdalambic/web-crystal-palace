{% extends "::layout.twig.tpl" %}

{% block titrepage %}{{ title }}{% endblock %}

{% block content %}

<h1>{{ title }}</h1>

{{ content }}

{% endblock %}