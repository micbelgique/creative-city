$ ->
  reloadMasonry = ->
    container = document.querySelector('.entries');
    msnry = new Masonry(container, {
      itemSelector: '.entry'
    })

  init = ->
    reloadMasonry()

  $ ->
    init()
