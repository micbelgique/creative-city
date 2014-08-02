@extends('layouts/application')

@section('content')

  <div>
    <h1><% $entry->title %></h1>
    <div>
      <% $entry->content %>
    </div>
  </div>

  <img src="<?= $entry->picture->url('medium') ?>" >

  <% $entry->authorUrl() %>
@stop
