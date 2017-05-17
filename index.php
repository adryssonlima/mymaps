<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://openlayers.org/en/v4.1.1/css/ol.css" type="text/css">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="images/map.ico" type="image/ico" sizes="20x20">
    <script src="https://openlayers.org/en/v4.1.1/build/ol.js" type="text/javascript"></script>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/vue.min.js"></script>
    <script src="bootstrap/bootstrap.min.js"></script>
    <title>My Maps</title>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand active" href="javascript:window.location.reload();"><i class="fa fa-map" aria-hidden="true"></i> My Maps</a>
        </div>
        <form class="navbar-form navbar-left">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <select id='estados' class="form-control">
                            <option value="">Selecione um Estado</option>
                            <option v-for="option in options" v-bind:value="option.geonameId" v-bind:lat="option.lat" v-bind:lng="option.lng" v-bind:fcode="option.fcode">{{ option.name }}</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <select id='municipios' class="form-control hidden">
                            <option value="">Selecione um Município</option>
                            <option v-for="option in options" v-bind:value="option.geonameId" v-bind:lat="option.lat" v-bind:lng="option.lng" v-bind:fcode="option.fcode">{{ option.name }}</option>
                        </select>
                    </div>
                </div>
            </div>
        </form>
        <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="http://github.com/adryssonlima" target="_blank"><i class="fa fa-github fa-lg" aria-hidden="true"></i> GitHub</a></li>
            <li class="active"><a href="http://adryssonlima.github.io" target="_blank"><i class="fa fa-code fa-lg" aria-hidden="true"></i> Desenvolvedor</a></li>
        </ul>
    </div>
</nav>

<div id="map" class="map"></div>

<br><br>
<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Adrysson Lima 2017</p>
    </div>
</footer>
<body>
</html>

<script src="js/mymaps.js"></script>
