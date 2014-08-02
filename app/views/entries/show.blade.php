@extends('layouts/application')

@section('content')

  <div>
    <h1><% $entry->title %></h1>
    <div>
      <% $entry->content %>
    </div>

      <img src="<?= $entry->picture->url('medium') ?>" >
  </div>

  @if(isset($voter))
    <div>

      @if($entry->hasVoted($voter))
        <h3>T'AS DEJA VOTE CONNARD</h3>
      @else
        <% link_to_route('entries.voteUp', 'VoteUPPPP', [ $entry->id ]); %> <br/>
        <% link_to_route('entries.voteDown', 'VoteDOWN', [ $entry->id ]); %>

      @endif
    </div>
  @endif


  @if(isset($is_author) && $is_author)
    <div style="background-color: yellow;">
      <h2>PRIVATE PANEL:</h2>

      Nombre total de votes: <% $votes_count %>


      @if($positive_votes->count() > 0)
        <h3>Votes positifs</h3>
        <ul>
          @foreach ($positive_votes->get() as $vote)
            <li><% $vote->user->name %></li>
          @endforeach
        </ul>
      @else
        <h3>Il n'y a pas de vote positif</h3>
      @endif


      @if($negative_votes->count() > 0)
        <h3>Votes négatifs</h3>
        <ul>
          @foreach ($negative_votes->get() as $vote)
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
