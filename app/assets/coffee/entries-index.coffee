angular.module('CreativeApp').controller('EntriesIndexCtrl', ($scope, $http) ->
  reload = ->
    $http.get('/entries.json').then((response) ->
      $scope.entries = response.data
    )

  init = ->
    reload()

  $ ->
    init()
)
