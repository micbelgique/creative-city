<!DOCTYPE html>
<html lang="fr-BE">
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <div>
      <p>Bonjour,</p>
      <p><strong><% $comment->user->name %></strong> a ajouté un commentaire à votre soumission "<% $entry->title %>".</p>

      <pre>
<% $comment->content %>
      </pre>

      <p>
        Vous pouvez suivre l'évolution des votes et des commentaires sur le site à l'adresse suivante: <br/>
        <a href="<% $entry->authorUrl() %>"><% $entry->authorUrl() %></a>.
      </p>

      <p>Ce lien est le votre, ne le partagez pas publiquement.</p>
    </div>
  </body>
</html>
