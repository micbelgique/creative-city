angular.module('CreativeApp').controller('EntriesIndexCtrl', ($scope, $http) ->
  reloadMasonry = ->
    container = document.querySelector('.entries');
    msnry = new Masonry(container, {
      itemSelector: '.entry'
    })

  reload = ->
    $http.get('/entries.json').then((response) ->
      $scope.entries = response.data
      setTimeout( (-> reloadMasonry()), 500)
    )

  init = ->
    reload()

  $ ->
    init()
)
