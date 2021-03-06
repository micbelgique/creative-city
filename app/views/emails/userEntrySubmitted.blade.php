<!DOCTYPE html>
<html lang="fr-BE">
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <div>
      Une personne a posté un nouvel article sur CreativeMons. Merci de voter dans les plus brefs délais.
      Si vous trainez, vous serez totalement inutile.
    </div>

    <div>
      <h2><% $entry->title %></h2>
      <div style="margin-top:10px">
        <% $entry->content %>
      </div>
    </div>

    <br/><br/>

    <div>
      <% link_to_route('entries.showAsVoter', null, [ $entry->id, 'voter_token' => $user->token ], []); %>
    </div>

  </body>
</html>
