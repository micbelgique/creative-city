angular.module('CreativeApp').controller('EntriesIndexCtrl', ($scope, $http) ->
  reload = ->
    $http.get('/entries.json').then((response) ->
      $scope.entries = response.data
      console.log($scope.entries)
    )

  init = ->
    reload()
    console.log("salut")

  $ ->
    init()
)
