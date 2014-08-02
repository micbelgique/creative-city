@extends('layouts/application')

@section('content')
  <div ng-controller="EntriesIndexCtrl">
    <div class="col-lg-4 entry" ng-repeat="entry in entries">
      <img class="img-rounded" style="width: 140px; height: 140px;">
      <h2>{{ entry.title }}</h2>
      <p>{{ entry.content }}</p>
      <p>
        <a class="btn btn-default" href="{{ entry.path }}" role="button">
          View details &raquo;
        </a>
      </p>
    </div>
  </div>
@stop
