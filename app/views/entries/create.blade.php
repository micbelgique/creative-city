@extends('layouts/application')

@section('content')
  <% Form::model($entry, array('route' => array('entries.store'))) %>

    ET TA MERE !

    <div>
      <% Form::label('title', 'Titre'); %>
      <% Form::text('title'); %>
    </div>

    <div>
      <% Form::label('description', 'Contenu'); %>
      <% Form::textarea('description'); %>
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

    <% Form::submit('Soumettre') %>

  <% Form::close() %>
@stop
