$ ->
  reloadMasonry = ->
    container = document.querySelector('.entries');
    window.msnry = new Masonry(container, {
      itemSelector: '.entry'
    })

  selectNews = ->
    $('.news').toggleClass('selected')

    $('.entry.event').fadeOut( ->
      window.msnry.layout()
      $('.entry.article').fadeIn( ->
        window.msnry.layout()
      )
    )

  selectAgenda = ->
    $('.agenda').toggleClass('selected')

    $('.entry.article').fadeOut( ->
      window.msnry.layout()
      $('.entry.event').fadeIn( ->
        window.msnry.layout()
      )
    )

  selectAll = ->
    $('.agenda, .news').removeClass('selected')
    $('.entry.article, .entry.event').fadeIn( ->
      window.msnry.layout()
    )

  bindAgenda = ->
    $('.agenda').on('click', ->
      if not $('.agenda').hasClass('selected')
        $('.news').removeClass('selected')
        selectAgenda()
      else
        selectAll()
    )

  bindNews = ->
    $('.news').on('click', ->
      if not $('.news').hasClass('selected')
        $('.agenda').removeClass('selected')
        selectNews()
      else
        selectAll()
    )

  init = ->
    reloadMasonry()
    bindAgenda()
    bindNews()

  $ ->
    init()
