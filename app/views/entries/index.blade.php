@extends('layouts/application')

@section('content')
  @foreach($entries as $entry)
    <p><% $entry->title %></p>
  @endforeach
@stop
