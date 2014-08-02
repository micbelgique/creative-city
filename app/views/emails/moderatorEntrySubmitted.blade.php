<!DOCTYPE html>
<html lang="fr-BE">
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <div>
      Un gus a posté un nouvel article sur CreativeCity. Vous avez XX heures pour
      voter pour ou contre sa publication. Si vous trainez, vous serez totalement
      inutile.
    </div>

    <div>
      <h2><% $entry->title %></h2>
      <div id="content">
        <% $entry->content %>
      </div>
    </div>

    <div>
      Votre lien de vote: <a href="<% $entry->authorUrl() %>"><% $entry->authorUrl() %></a><br/>
      Votez POUR directement: <a href="<% $entry->authorUrl() %>"><% $entry->authorUrl() %></a><br/>
      Votez CONTRE directement: <a href="<% $entry->authorUrl() %>"><% $entry->authorUrl() %></a><br/>
    </div>

  </body>
</html>
