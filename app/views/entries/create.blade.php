@extends('layouts/application')

@section('content')
  <% Form::model($entry, ['route' => array('entries.store'), 'files' => true, 'class' => "form-horizontal new-article"]) %>

    @if($errors->has())
      <div class="errors col-sm-offset-4 col-sm-5">
        @foreach ($errors->all() as $error)
          <div><% $error %></div>
        @endforeach
      </div>
    @endif

    <div class="form-group">
      <% Form::label('author_name', 'Nom', ['class' => "control-label col-sm-4"]); %>

      <div class="col-sm-5">
        <% Form::text('author_name', '', ['class' => "form-control"]); %>
      </div>
    </div>

    <div class="form-group">
      <% Form::label('author_email', 'Email', ['class' => "control-label col-sm-4"]); %>

      <div class="col-sm-5">
        <% Form::text('author_email', '', ['class' => "form-control"]); %>
      </div>
    </div>

    <div class="form-group">
      <% Form::label('kind', 'Type de publication', ['class' => "control-label col-sm-4"]); %>

      <div class="col-sm-5">
        <% Form::select('kind', ['article' => 'Article', 'event' => 'Evénement'], '', ['class' => 'form-control']); %>
      </div>
    </div>

    <div class="form-group">
      <% Form::label('title', 'Titre', ['class' => "control-label col-sm-4"]); %>

      <div class="col-sm-5">
        <% Form::text('title', '', ['class' => "form-control"]); %>
      </div>
    </div>

    <div class="form-group">
      <% Form::label('content', 'Contenu', ['class' => "control-label col-sm-4"]); %>

      <div class="col-sm-5">
        <% Form::textarea('content', '', ['class' => "form-control"]); %>
      </div>
    </div>

    <div class="form-group">
      <% Form::label('url', 'Lien internet', ['class' => "control-label col-sm-4"]); %>

      <div class="col-sm-5">
        <% Form::text('url', '', ['class' => "form-control"]); %>
      </div>
    </div>

    <div class="form-group">
      <% Form::label('picture', 'Image', ['class' => "control-label col-sm-4"]); %>

      <div class="col-sm-5">
        <% Form::file('picture', '', ['class' => "form-control"]); %>
      </div>
    </div>

    <div id="events-only" style="display: none;">
      <div class="form-group">
        <% Form::label('start_date', 'Date de début', ['class' => "control-label col-sm-4"]); %>

        <div class="col-sm-5">
          <% Form::text('start_date', '', ['class' => 'form-control datepicker']); %>
        </div>
      </div>

      <div class="form-group">
        <% Form::label('end_date', 'Date de fin', ['class' => "control-label col-sm-4"]); %>

        <div class="col-sm-5">
          <% Form::text('end_date', '', ['class' => 'form-control datepicker']); %>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-offset-4 col-sm-5">
        <% Form::submit('Soumettre', ['class' => 'btn btn-default']) %>
      </div>
    </div>

  <% Form::close() %>
@stop
