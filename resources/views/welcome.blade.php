<html>
    <head>

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Marcelo Santos">

        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">

        <link rel="stylesheet" type="text/css"
              href="css/oquefazer.css">

        <title>O Que Fazer</title>

    </head>
    <body ng-app="oquefazer.app">

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <ng-view></ng-view>

    </body>

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular-route.js"></script>

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>

    <script src="js/oquefazer.config.js"></script>
    <script src="js/lista.controller.js"></script>

</html>
