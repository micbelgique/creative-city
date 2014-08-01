@extends('layouts/application')

@section('content')
  <div ng-controller="EntriesIndexCtrl">
    <div class="entry"
         ng-repeat="entry in entries">
      <a href="<% URL::route("entries.show", entry) %>"><% entry.title %></a>
    </div>
  </div>
@stop
