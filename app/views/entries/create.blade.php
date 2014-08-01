@extends('layouts/application')

@section('content')
  {{ HTML::ul($errors->all()) }}

  {{ Form::model($entry, array('route' => array('entries.store'))) }}

    ET TA MERE !

    {{ $errors->count() }}

    @if($errors->has())
      CETTE PUTE
      @foreach ($errors->all() as $error)
        <div>{{ $error }}</div>
      @endforeach
    @endif


    {{ HTML::ul($errors->all()) }}

    <div>
      {{ Form::label('title', 'Titre'); }}
      {{ Form::text('title'); }}
      @if( $errors->has('title') )
      TA MERE
      @endif
    </div>

    <div>
      {{ Form::label('description', 'Contenu'); }}
      {{ Form::textarea('description'); }}
    </div>

    <div>
      {{ Form::label('url', 'Lien internet'); }}
      {{ Form::text('url'); }}
    </div>

    <div>
      {{ Form::label('author_name', 'Votre nom'); }}
      {{ Form::text('author_name'); }}
    </div>

    <div>
      {{ Form::label('author_email', 'Votre email'); }}
      {{ Form::text('author_email'); }}
    </div>

    <div>
      {{ Form::select('kind', ['article' => 'Article', 'event' => 'Evénement']); }}
    </div>

    {{ Form::submit('Soumettre') }}

  {{ Form::close() }}
@stop
