{% extends "::layout.twig.tpl" %}


{% block titrepage %}Gestion des horaires{% endblock %}

{% block javascript_head %}
{{ parent() }}
<script type="text/javascript">
$(function() {
    $(".date-selector").datetimepicker({
        showButtonPanel: true,
        dateFormat: "yy-mm-dd",
        timeFormat: "HH:mm",
    });
});

function deleteShow(id)
{
    $("#s"+id).fadeOut();
    
    $.post(
    "{{ path('ajax_del_horaire') }}",
    { id: id, });
    
    $("#s"+id).remove();
}

function addShow(id)
{
    var date = $("#date-show-"+id).val();
    var salle = $("#salle-show-"+id).val();
    var film = id;
    var programme = {{ idProgramme }};
    var idShow;
    
    if(date == '')
        {
            alert("Veuillez ajouter un horaire de séance.");
            return false;
        }
        
    if(salle == '')
        {
            alert("Veuillez sélectionner une salle.");
            return false;
        }
        
        $.post(
        "{{ path('ajax_add_horaire') }}",
        { date: date,
            salle: salle,
            programme: programme,
            film: film
        },
        function(data) {
            idShow = data;            
        }
            
    );
        
    dateCp = date.split(' ');
    day = $.datepicker.formatDate('dd/mm/yy', new Date(dateCp[0]));
    
        
    $("#date-show-"+id).val("");
    if($("#td-shows-"+id+":contains('N/A')").length > 0)
    {
        $("#td-shows-"+id).html("<a href=\"javascript:deleteShow(" + idShow + ");\" id=\"s" + idShow + "\">" + day + " - " + dateCp[1] + " (" + salle + ")</a><br />");
    }
    else
    {
        $("#td-shows-"+id).append("<a href=\"javascript:deleteShow(" + idShow + ");\" id=\"s" + idShow + "\">" + day + " - " + dateCp[1] + " (" + salle + ")</a><br />");
    }
    
}
</script>
{% endblock %}

{% block content %}
<h1>Gestion des horaires</h1>
<a href="{{ path('gerer_programme') }}">Retour à la liste des programmes...</a>
<table id="tab-horaires">
    <thead>
        <tr>
            <th>Film</th>
            <th>Horaires</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        {% for f in films %}
            <tr>
                <td>{{ f.film.titre }}</td>
                <td id="td-shows-{{ f.film.id }}">
                    {% for s in f.shows %}
                        <a href="javascript:deleteShow({{ s.id }});" id="s{{ s.id }}">{{ s.date|date("d/m/Y - H:i") }} ({{ s.salle }})</a> <br />
                        {% else %}
                        N/A
                    {% endfor %}
                </td>
                    
                <td>
                    <input type="text" id="date-show-{{ f.film.id }}" class="date-selector" />
                    <select id="salle-show-{{ f.film.id }}">
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                    <input type="button" value="+" onclick="addShow({{ f.film.id }});" />
                </td>
                
            </tr>
        {% endfor %}
    </tbody>
</table>
{% endblock %}