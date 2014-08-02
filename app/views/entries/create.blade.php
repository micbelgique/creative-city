@extends('layouts/application')

@section('content')
  <% Form::model($entry, ['route' => array('entries.store'), 'files' => true]) %>

    @if($errors->has())
      @foreach ($errors->all() as $error)
        <div><% $error %></div>
      @endforeach
    @endif

    <div>
      <% Form::label('title', 'Titre'); %>
      <% Form::text('title'); %>
    </div>

    <div>
      <% Form::label('content', 'Contenu'); %>
      <% Form::textarea('content'); %>
    </div>

    <div>
      <% Form::label('url', 'Lien internet'); %>
      <% Form::text('url'); %>
    </div>

    <div>
      <% Form::label('author_name', 'Votre nom'); %>
      <% Form::text('author_name'); %>
    </div>

    <div>
      <% Form::label('author_email', 'Votre email'); %>
      <% Form::text('author_email'); %>
    </div>

    <div>
      <% Form::label('picture', 'Image'); %>
      <% Form::file('picture'); %>
    </div>


    <div>
      <% Form::select('kind', ['article' => 'Article', 'event' => 'Evénement']); %>
    </div>

    <div id="events-only">
      <div>
        <% Form::label('start_date', 'Date de début'); %>
        <% Form::text('start_date', '', ['data-datepicker' => 'datepicker']); %>
      </div>

      <div>
        <% Form::label('end_date', 'Date de fin'); %>
        <% Form::text('end_date', '', ['data-datepicker' => 'datepicker']); %>
      </div>
    </div>


    <% Form::submit('Soumettre') %>
  <% Form::close() %>
@stop
