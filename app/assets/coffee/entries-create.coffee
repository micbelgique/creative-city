$ ->
  init = ->
    $('.datepicker').datetimepicker({format: 'dd-mm-yyyy hh:ii'});

  toggleFields = ->
    if $('select#kind').val() == 'event'
      $('#events-only').show();
    else
      $('#events-only').hide();

  init()
  toggleFields()

  $('select#kind').change(toggleFields)
