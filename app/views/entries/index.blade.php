@extends('layouts/application')

@section('content')
  <div ng-controller="EntriesIndexCtrl"
       class="entries">
    <div class="col-lg-4 entry"
         ng-repeat="entry in entries">
      <div class="inner-entry">
        <img class="img-rounded">
        <h2>{{ entry.title }}</h2>
        <p>{{ entry.content }}</p>
        <p>
          <a class="btn btn-default" href="{{ entry.path }}" role="button">
            View details &raquo;
          </a>
        </p>
      </div>
    </div>
  </div>
@stop
