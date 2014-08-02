angular.module('CreativeApp').controller('EntriesIndexCtrl', ($scope, $http) ->
  reloadMasonry = ->
    container = document.querySelector('.entries');
    msnry = new Masonry(container, {
      itemSelector: '.entry'
    })

  reload = ->
    $http.get('/entries.json').then((response) ->
      $scope.entries = response.data
      $scope.entries.push({ title: "hello" })
      $scope.entries.push({ title: "hsqdfsdqfello" })
      $scope.entries.push({ title: "hesdfqsdfllo" })
      $scope.entries.push({ title: "helgsfdsflo" })
      $scope.entries.push({ title: "hsqdfsdesldfjpsoqdjfi podsjf iosdj fpoijsqd llo" })
      $scope.entries.push({ title: "hesfgllo" })
      $scope.entries.push({ title: "helsdqfqsdflo" })
      $scope.entries.push({ title: "hellsdfqso" })
      $scope.entries.push({ title: "heqsdfsdlfjsp doqfij pqsodfj opqsdfllo" })
      $scope.entries.push({ title: "held sdfojqsp foijsqdopfj sqdopj flo" })
      $scope.entries.push({ title: "helqsdflo" })
      setTimeout( (-> reloadMasonry()), 500)
    )

  init = ->
    reload()

  $ ->
    init()
)
