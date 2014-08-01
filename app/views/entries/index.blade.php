@extends('layouts/application')

@section('content')
  <div ng-controller="EntriesIndexCtrl">
    <div class="entry"
         ng-repeat="entry in entries">
      {{ entry.title }}
    </div>
  </div>
@stop
