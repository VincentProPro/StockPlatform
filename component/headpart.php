<?php 
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
$host = $_SERVER['SERVER_NAME'];
$urlsite = $protocol . $host . "/StockPlatform";
?>

<!DOCTYPE html>
<html>
<head>

 <title>E-Stock Magement</title>
 <meta name="description" content="Vincent-Solution de gestion de Stock">
 <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo$urlsite; ?>/cliniccss.css">
<!-- <link rel="stylesheet" href="<?php echo$urlsite; ?>/css/style2.css"> -->
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>


<link rel="stylesheet" href="<?php echo$urlsite; ?>/cliniccss.css">
<link rel="stylesheet" href="<?php echo$urlsite; ?>/css/jquery-ui.css">
     <script src="<?php echo$urlsite; ?>/js/jquery19.js"></script>
       <script src="<?php echo$urlsite; ?>/js/jquery-ui.js"></script>
               <!-- <script src="plotly-2.8.3.min.js"></script> -->
               <script src='https://cdn.plot.ly/plotly-2.18.0.min.js'></script>
               <!-- <script src='../js/plotly.js'></script> -->

               <script type="text/javascript" src="<?php echo$urlsite; ?>/jqueryforperode1.js"></script>
<script type="text/javascript" src="<?php echo$urlsite; ?>/jqueryforperiode2.js"></script>
<script type="text/javascript" src="<?php echo$urlsite; ?>/jqueryforperiode3.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo$urlsite; ?>/jquerycssforperiode.css" />

</head>