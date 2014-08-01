@extends('layouts/application')

@section('content')
  <div ng-controller="EntriesIndexCtrl">
    @foreach($entries as $entry)
      <p><% $entry->title %></p>
    @endforeach
  </div>
@stop
