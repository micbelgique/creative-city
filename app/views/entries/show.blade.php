@extends('layouts/application')

@section('content')

  <div class="row">
    <div class="container" style="height:550px;overflow:hidden;">
      <img src="<?= $entry->picture->url('large') ?>">
    </div>
  </div>

  <div class="col-lg-7">
    <h1 style="width: 100%;
background-color: #e53953;
padding: 20px;
color: white;
margin-top: 34px;
text-transform: uppercase;
font-family: 'Open Sans', sans-serif;
font-weight: 700">
      <% $entry->title %>
    </h1>

    <div class="content"
         style="padding: 20px;padding-left:0px;font-size:18px;font-family: 'Open Sans', sans-serif;">
      <% $entry->content %>
    </div>
  </div>

  <div class="col-lg-5">
    <div style="width: 100%;
background-color: black;
padding: 20px;
color: white;
margin-top: 34px;
text-transform: uppercase;
font-family: 'Open Sans', sans-serif;
font-weight: 700">
      http://softlab.mic-belgique.be/
    </div>

    <hr style="border-color: black"/>

    <span style="font-family: 'Open Sans', sans-serif; font-size:18px;font-weight: 700;text-transform:uppercase">Article créé par :</span>
    <br/>
    <% $entry->author_name %>
  </div>

  <div style="clear:both">
  </div>

  <br/><br/>
  <br/><br/>
  <br/><br/>

  @if(isset($is_author) || isset($voter))
    <h3>Commentaires</h3>
    @foreach($entry->comments as $comment)
      <strong><% $comment->user->name %></strong><br />
      <pre><% $comment->content %></pre>
    @endforeach
  @endif

  @if(isset($voter))
    <div>
      @if($entry->hasVoted($voter))
        <h3>Vous avez déjà voté pour cette entrée.</h3>
      @else
        <% link_to_route('entries.voteUp',   'VoteUPPPP', [ $entry->id ]); %> <br/>
        <% link_to_route('entries.voteDown', 'VoteDOWN',  [ $entry->id ]); %>
      @endif
    </div>

    <% Form::model($comment, ['route' => array('comments.store'), 'class' => "form-horizontal new-article"]) %>
      <% Form::hidden('entry_id', $entry->id) %>

      <div class="form-group">
        <% Form::label('content', 'Votre commentaire', ['class' => "control-label col-sm-4"]); %>

        <div class="col-sm-5">
          <% Form::textarea('content', '', ['class' => "form-control"]); %>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-4 col-sm-5">
          <% Form::submit('Soumettre le commentaire', ['class' => 'btn btn-default']) %>
        </div>
      </div>
    <% Form::close() %>

  @endif

  @if(isset($is_author) && $is_author)
    <div style="background-color: yellow;">
      <h2>PRIVATE PANEL:</h2>

      Nombre total de votes: <% $votes_count %>


      @if($positiveVotes->count() > 0)
        <h3>Votes positifs</h3>
        <ul>
          @foreach ($positiveVotes->get() as $vote)
            <li><% $vote->user->name %></li>
          @endforeach
        </ul>
      @else
        <h3>Il n'y a pas de vote positif</h3>
      @endif


      @if($negativeVotes->count() > 0)
        <h3>Votes négatifs</h3>
        <ul>
          @foreach ($negativeVotes->get() as $vote)
            <li><% $vote->user->name %></li>
          @endforeach
        </ul>
      @else
        <h3>Il n'y a pas de vote négatifs</h3>
      @endif

    </div>
  @endif

  <% $entry->authorUrl() %>
@stop
