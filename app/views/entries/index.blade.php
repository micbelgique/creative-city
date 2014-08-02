@extends('layouts/application')

@section('content')
  <div class="entries" id="entries">
    @foreach($entries as $entry)
      <div class="col-lg-4 entry <% $entry->kind %>">
        <div class="inner-entry">
          <a href="<% $entry->url() %>">
            <img class="img-rounded" src="<% $entry->picture->url('medium') %>"/>
          </a>
          @if ($entry->kind == 'event') %>
            <div class="event-date">
              13 JUILLET
            </div>
          @endif
          <div class="red-line">
          </div>
          <h2><% $entry->title %></h2>
          <hr/>
          <p class="content">
            <% $entry->content %>
          </p>
          <p class="details">
            <a class="btn btn-default" href="<% $entry->url() %>" role="button">
              Lire plus... <!-- &raquo; -->
            </a>
          </p>
        </div>
      </div>
    @endforeach
  </div>
@stop
