@extends('layouts/application')

@section('content')

  <div>
    <h1><% $entry->title %></h1>
    <div>
      <% $entry->content %>
    </div>

      <img src="<?= $entry->picture->url('medium') ?>" >
  </div>


  @if(isset($is_author) && $is_author)
    <div>
      <h2>PRIVATE PANEL:</h2>

      Votes: <% $entry->votes->size() %>


    </div>
  @endif


  <% $entry->authorUrl() %>
@stop
