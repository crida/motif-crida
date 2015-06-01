<?header('Content-Type: text/html; charset=UTF-8');?><!DOCTYPE html><html lang="CA">
<head>
    <title><?=$TITLE?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta content="text/html; charset=utf-8" http-equiv="content-type">
    <meta content="0" http-equiv="expires">
    <meta content="public" name="security">
    <meta content="index, follow" name="robots">
    <meta content="Eina per contar votacions de La Crida" name="title">
    <meta content="Global" name="distribution">
    <meta content="General" name="rating">
    <meta content="CA" name="language">
    <meta content="Miquel Adell www.miqueladell.com" name="author">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">

    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/smoothness/jquery-ui.css" />    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <link rel='stylesheet'  href='styles/bootstrap-dialog.css' type='text/css' media='all' />
    <link rel='stylesheet'  href='styles/bootstrap-treeview.css' type='text/css' media='all' />    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.0/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link rel='stylesheet' id='motif-style-css'  href='http://cridapersabadell.cat/wp-content/themes/motif-crida/style.css?ver=4.1.1' type='text/css' media='all' />
    <link rel='stylesheet'  href='styles/main.css' type='text/css' media='all' />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="ca desktop oneColumn <?=$SECTION?>">    <div class="errors"></div>

    <div class="header">        <h1><?=$TITLE?></h1>

        <div class="confirmations-toggle-holder">            <input type="checkbox" data-toggle="toggle" class="confirmations-toggle" data-on="confirmacions" data-off="confirmacions" checked="checked">
        </div>

        <div class="two-columns-toggle-holder">
            <input type="checkbox" data-toggle="toggle" class="two-columns-toggle" data-on="1 columna" data-off="2 columnes" checked="checked">
        </div>
    </div>
