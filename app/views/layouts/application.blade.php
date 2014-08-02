<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CreativeMons</title>

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:700,300,400,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/compiled-css/bootstrap-3.2.0.min.css">
    <link rel="stylesheet" href="/compiled-css/theme.css">
    <link rel="stylesheet" href="/compiled-css/header.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body ng-app="CreativeApp">
    <div class="navbar-wrapper">
      <div class="container-fluid">
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
          <div class="container">
            <div class="nav navbar-nav pull-left">
              <ul class="nav navbar-nav pull-right">
                <li class="agenda">
                  <a href="#">
                    <img src="images/calendar.png">
                    Agenda
                  </a>
                </li>
                <li class="news">
                  <a href="#">
                    <img src="images/news.png">
                    News
                  </a>
                </li>
              </ul>
            </div>
            <div>
              <ul class="nav navbar-nav pull-right">
                <li class="add">
                  <a href="#">
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
              <img src="images/logo.png"/>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container marketing">
      <div class="row" style="text-align:center">
        @yield('content')
      </div>

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4">
          <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" style="width: 140px; height: 140px;">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-lg-4">
          <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" style="width: 140px; height: 140px;">
          <h2>Heading</h2>
          <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-lg-4">
          <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" style="width: 140px; height: 140px;">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
      </div>

      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2014 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>
    </div>

    <script src="/js/jquery-2.0.3.min.js"></script>
    <script src="/js/bootstrap-3.2.0.min.js"></script>
    <script src="/js/angular-1.2.21.min.js"></script>
    <script src="/js/angular-masonry.js"></script>
    <script src="/js/app.js"></script>
    <script src="/js/entries-index.js"></script>
  </body>
</html>
