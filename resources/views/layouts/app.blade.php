
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Kleine Spenden auf Knopfdruck. Der Knopf ist mit dem Internet der Dinge verbunden">
    <meta name="author" content="Olav Schettler <olav@tinkerthon.de">
    <link rel="icon" href="/favicon.ico">

    <title>Kleine Spenden auf Knopfdruck</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <link rel="stylesheet" href="/css/styles.css">

  </head>

  <body>

    <div class="container">

      @include('partials.nav')

      @yield('content')

      <footer class="footer">
        <p>&copy; 2016 Tinkerthon. Olav Schettler</p>
      </footer>

    </div> <!-- /container -->

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  </body>
</html>
