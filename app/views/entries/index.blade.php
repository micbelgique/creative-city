@extends('layouts/application')

@section('content')
  <div class="entries">
    @foreach($entries as $entry)
      <div class="col-lg-4 entry <% $entry->kind %>">
        <div class="inner-entry">
          <a href="<% $entry->url() %>">
            <img class="img-rounded" src="<% $entry->picture->url('medium') %>"/>
          </a>
          @if ($entry->kind == 'event')
            <div class="event-date">
              <% date("d-m", strtotime($entry->start_date)) %><br/><% date("Y", strtotime($entry->start_date)) %>
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
