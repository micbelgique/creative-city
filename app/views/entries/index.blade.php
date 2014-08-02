@extends('layouts/application')

@section('content')
  <div ng-controller="EntriesIndexCtrl"
       class="entries">
    <div class="col-lg-4 entry"
         ng-repeat="entry in entries">
      <div class="inner-entry">
        <a href="{{ entry.path }}">
          <img class="img-rounded" src="{{ entry.picture_url }}"/>
        </a>
        <div ng-show="entry.kind == 'event'"
             class="event-date">
          13 JUILLET
        </div>
        <div class="red-line">
        </div>
        <h2>{{ entry.title }}</h2>
        <hr/>
        <p class="content">
          {{ entry.content }}
        </p>
        <p class="details">
          <a class="btn btn-default" href="{{ entry.path }}" role="button">
            Lire plus... <!-- &raquo; -->
          </a>
        </p>
      </div>
    </div>
  </div>
@stop
