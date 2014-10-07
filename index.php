<?php date_default_timezone_set('America/Sao_Paulo'); 

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AGÊNCIA GULLIVER VIAGENS</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/half-slider.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home">HOME</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="empresa">EMPRESA</a>
                    </li>
                    <li>
                        <a href="produtos">PRODUTOS</a>
                    </li>
                    <li>
                        <a href="servicos">SERVIÇOS</a>
                    </li>
                    <li>
                        <a href="contato">CONTATO</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Half Page Image Background Carousel Header -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
            <div class="item active">
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background-image:url('http://www.bridgemans-services.com/drive/uploads/2014/02/2_Why-1900x540.jpg');"></div>
            </div>
            <div class="item">
                <!-- Set the second background image using inline CSS below. -->
                <div class="fill" style="background-image:url('http://www.bridgemans-services.com/drive/uploads/2014/02/0_Home-mobile-1900x540.jpg');"></div>
                <div class="carousel-caption">
                    <h1>AGÊNCIA DE VIAGENS GULLIVER</h1>
                </div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill" style="background-image:url('http://www.beach-backgrounds.com/wallpapers/the-beautiful-wallapper-of-the-opera-house-in-sydney-1920x540-618.jpg');"></div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>

    </header>

    <!-- Page Content -->
    <div class="container">

<?php   
$rotas = array(
    'index' => array( 
        '',
        function() {
            echo '<h1>Projeto Fase 2</h1>';
        }
    ),
    'home' => array( 
        '/home',
        function() {
            echo '<h1>Projeto Fase 2</h1>';
        }
    ),
    'empresa' => array( 
        '/empresa',
        function() {
            if (file_exists('empresa.php')) {
                require_once('empresa.php');
            } 
            else {
                echo '<h3>Arquivo não encontrado</h3>';
            } 
        }
    ),
    'produtos' => array( 
        '/produtos',
        function() {
            if (file_exists('produtos.php')) {
                require_once('produtos.php');
            } 
            else {
                echo '<h3>Arquivo não encontrado</h3>';
            } 
        }
    ),
    'servicos' => array( 
        '/servicos',
        function() {
            if (file_exists('servicos.php')) {
                require_once('servicos.php');
            } 
            else {
                echo '<h3>Arquivo não encontrado</h3>';
            } 
        }
    ),
    'contato' => array( 
        '/contato',
        function() {
            if (file_exists('contato.php')) {
                require_once('contato.php');
            } 
            else {
                echo '<h3>Arquivo não encontrado</h3>';
            } 
        }
    )
);

$baseUrl = '/site';
$url = rtrim(parse_url(str_replace($baseUrl, '', $_SERVER['REQUEST_URI']), PHP_URL_PATH) , '/');

if (!verificarRotaExiste($rotas, $url)) {
    header("HTTP/1.0 404 Not Found");
    echo '<h3>Erro 404 - URI não encontrada</h3>';
    die();
}

array_walk($rotas, function ($rota) use($url) {
        if ($rota[0] == $url && is_callable($rota[1])) {
            $action = $rota[1];
            $action();
        }
});

function verificarRotaExiste($arrayRotas, $url) {
    foreach ($arrayRotas as $rota)
        if (isset($rota[0]) && $rota[0] == $url)
            return true;
    return false;
}
?>
        <hr>
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Todos os Direitos Reservados &copy; <?php $d = new DateTime(); echo $d->format('Y'); ?></p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 4000 //changes the speed
    })
    </script>

</body>

</html>
