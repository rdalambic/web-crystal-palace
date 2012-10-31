<h2>Ajout des films</h2>
<p>Cliquez simplement sur + pour ajouter le film au programme.</p>
<div id="film-set-container">
    <div id="films-container">
        <h4>Films</h4>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Titre</th>
                    <th>Ajouter</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Titre</th>
                    <th>Ajouter</th>
                </tr>
            </tfoot>
            <tbody>
                {% for f in films %}
                    <tr id="f{{ f.id }}">
                        <td>{{ f.id }}</td>
                        <td>{{ f.titre }}</td>
                        <td><input type="checkbox" value="false" id="c{{ f.id }}" onclick="check({{ f.id }});"/></td>
                    </tr>
                {% endfor %}
            </tbody>
        </table>
    </div>
</div>
<input type="hidden" id="date" value="{{ date }}" />
<input type="hidden" id="films" value="" />