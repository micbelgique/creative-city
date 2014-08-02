@extends('layouts/application')

@section('content')
  <div ng-controller="EntriesIndexCtrl">
    <div class="entry" ng-repeat="entry in entries">
      <a href="{{ entry.path }}">{{ entry.title }}</a>
    </div>
  </div>
@stop
