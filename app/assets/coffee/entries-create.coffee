$ ->
  init = ->
    $('.datepicker').datetimepicker({format: 'yyyy-mm-dd hh:ii:ss'});

  toggleFields = ->
    if $('select#kind').val() == 'event'
      $('#events-only').show();
    else
      $('#events-only').hide();

  init()
  toggleFields()

  $('select#kind').change(toggleFields)
