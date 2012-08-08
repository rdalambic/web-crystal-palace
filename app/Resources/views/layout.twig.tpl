<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Cinéma Crystal Palace | {% block titrepage %}{% endblock %}</title>
        
        {% block meta %}
        <meta charset="utf-8" />
        {% endblock %}
        
        {% block stylesheet %}        
        <link rel="stylesheet" href="{{ asset('/css/style.css') }}" media="screen" />        
        {% endblock %}
        
        {% block javascript_head %}
        <script type="text/javascript" src="http://static.rdalambic.com/rdweb/js/jquery/jquery.min.js"></script>        
        <script type="text/javascript" src="http://static.rdalambic.com/rdweb/js/caroufredsel/caroufredsel.js"></script>
        <script type="text/javascript" src="script/uiDynamic.js"></script>
        <script type="text/javascript" src="script/tiny_mce/tiny_mce.js"></script>
        <!--<script type="text/javascript" src="script/ZoomBox/zoombox.js"></script> -->
        <!--<if cond="isset($_SESSION[membre_groupe]) && $_SESSION[membre_groupe] > 0"><script type="text/javascript" src="script/uiAdmin.js"></script></if> -->  
        {% endblock %}
    </head>

    <body>
        <div id="page">
            <div id="content">
                
                <div id="header">
                    <div id="logo"><a href="{{ path('homepage') }}"><img src="{{ asset('/img/logo.jpg') }}" alt="Cinéma Crystal Palace" /></a></div>
                    <div id="speedbar">
                        <ul>
                            <li><a href="{{ path('homepage') }}">Accueil</a></li>
                            <li><a href="{{ path('programme_cette_semaine') }}">Programme</a></li>
                            <li><a href="horaires.html">Horaires</a></li>
                            <li><a href="tarifs.html">Tarifs</a></li>
                        </ul>
                    </div>                    
                </div>
                
                <div id="adtop">
                        <img src="http://placehold.it/728x90&text=Pub 728x90" />
                </div>
                
                <div id="rightbar">
                    <div id="adside" style="text-align: center;">
                        <img src="http://placehold.it/300x250" />
                        <br />
                        <img src="http://placehold.it/300x250" />
                    </div>
                </div>
                
                <div id="body">
                    {% block content %}{% endblock %}
                </div>
                
                
                
                <div class="clearer"></div>
                
                <div id="footer">
                    <div id="flinks"><a href="{{ path('contact_page') }}">Contact</a> - <a href="acces.html">Plan d'accès</a> - {% if is_granted('IS_AUTHENTICATED_FULLY') %}<a href="{{ path('admin_homepage') }}">Administration</a>{% else %}<a href="{{ path('user_login') }}">Connexion</a>{% endif %} - <a href="mentions.html">Mentions légales</a> - <a href="https://rdalambic.uservoice.com">Aide</a></div>
                    <div id="copyline">
                        <p>Copyright &copy; 2012 <a href="{{ url('homepage') }}">Crystal Palace</a> &amp; <a href="http://www.rdalambic.com">RD Alambic</a>. Tous droits réservés.</p>
                    </div>
                </div>
            </div>
        </div>
            
        {% block javascript_bottom %}
        {% endblock %}
            
    </body>
</html>