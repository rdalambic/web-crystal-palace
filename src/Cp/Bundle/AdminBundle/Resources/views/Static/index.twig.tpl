{% extends "::layout.twig.tpl" %}

{% block titrepage %}Liste des pages statiques{% endblock %}

{% block content %}
<select>
    <option disabled="true" selected="selected">Sélectionnez une page</option>
    {% for p in pages %}
    <option value="{{ p.id }}">{{ p.title }}</option>
    {% endfor %}
</select>

<div id="page_edit">
</div>

{% endblock %}

{% block javascript_bottom %}    
<script type="text/javascript">
    $(function(){
        $('select').change(function(){            
            var pageId = $(this).children(':selected').val();            
            $.ajax({
                type : 'GET',
                url : 'pages/edit-' + pageId,
                dataType : 'html',
                success : function(code_html){
                    $('#page_edit').html(code_html);
                },
            });
        });
        
        
    });
    
    function savePage()
    {
        var pageContent = $('textarea').val();        
        $.post('pages/save', { id: $('select').children(':selected').val(), content: pageContent }).done(function(data){
            $(location).attr('href', '{{ path('admin_homepage') }}');
        });
    }       
    </script>
{% endblock %}