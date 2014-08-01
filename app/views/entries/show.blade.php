@extends('layouts/application')

@section('content')
  <h1><% $entry->title %></h1>

  <% $entry->authorUrl() %>
@stop
