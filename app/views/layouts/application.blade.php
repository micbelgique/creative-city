<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CreativeMons</title>

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:700,100,300,400,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/compiled-css/bootstrap-3.2.0.min.css">
    <link rel="stylesheet" href="/compiled-css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="/compiled-css/theme.css">
    <link rel="stylesheet" href="/compiled-css/header.css">
    <link rel="stylesheet" href="/compiled-css/entries-index.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body ng-app="CreativeApp" ng-controller="EntriesIndexCtrl">
    <div class="navbar-wrapper">
      <div class="container-fluid">
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
          <div class="container">
            <div class="nav navbar-nav pull-left">
              <ul class="nav navbar-nav pull-right">
                <li class="agenda">
                  <a href="/entries/#content-anchor">
                    <img src="/images/calendar.png">
                    Agenda
                  </a>
                </li>
                <li class="news">
                  <a href="/entries/#content-anchor">
                    <img src="/images/news.png">
                    News
                  </a>
                </li>
              </ul>
            </div>
            <div>
              <ul class="nav navbar-nav pull-right">
                <li class="add">
                  <a href="<% URL::route('entries.create') %>">
                    Ajouter une actualité
                    <i class="glyphicon glyphicon-plus"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="carousel slide">
      <div class="carousel-inner">
        <div class="item active">
          <div class="container">
            <div class="carousel-caption">
              <a href="/">
                <img src="/images/logo.png"/>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <a id="content-anchor"></a>

    <div class="row red-bar">
    </div>

    <div class="container marketing">
      <div class="row">
        @yield('content')
      </div>

      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2014 CreativeMons &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>
    </div>

    <script src="/js/jquery-2.0.3.min.js"></script>
    <script src="/js/bootstrap-3.2.0.min.js"></script>
    <script src="/js/bootstrap-datetimepicker.min.js"></script>
    <script src="/js/masonry-3.1.5.min.js"></script>
    <script src="/js/entries-index.js"></script>
    <script src="/js/entries-create.js"></script>
  </body>
</html>
