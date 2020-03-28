<?php

function buildXSLT($xmlFile, $xslFile){
  $xml = new DOMDocument;
  $xml->load($xmlFile);

  $xsl = new DOMDocument;
  $xsl->load($xslFile);
  $proc = new XSLTProcessor;
  $proc->importStyleSheet($xsl);
  return $proc->transformToXML($xml);
}


?>
<!doctype html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="ar" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <title>FML</title>
    <link rel="icon" href="frontend/img/fav-icon.png"/>
    <link rel="shortcut icon" href="frontend/img/fav-icon.png" />
    <link rel="stylesheet" href="frontend/css/bootstrap.min.css">
    <link rel="stylesheet" href="frontend/css/bootstrap-rtl.min.css">
    <link rel="stylesheet" href="frontend/css/font-awesome.min.css">
    <link rel="stylesheet" href="frontend/css/style.css">
    <script src="frontend/js/jquery.min.js"></script>
    <script src="frontend/js/bootstrap.min.js"></script>
  </head>
  <body class="">

    <div id="loader">
      <style type="text/css">
        body{overflow: hidden;}
        #loader{height: 100vh; width: 100%; background-image: url('frontend/img/loading.gif'); background-repeat: no-repeat; background-position: center; position: absolute; background-color: #172027; top: 0; left: 0; overflow: hidden !important; z-index: 1000000 !important; }
      </style>
      <script type="text/javascript">
        $(window).load(function() {
          $("#loader").remove();
        });
      </script>
    </div>
    <nav class="navbar navbar-custom">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <i class="fa fa-bars" style="color: #fff;"></i>
          </button>
          <a href="{{ route('home" id="logo" class="navbar-brand" title="{{ config('app.name">
            <img src="frontend/img/logo.png?v=1" alt="{{ config('app.name">
          </a>
        </div>
      </div>
    </nav>
    <div class="container-fluid">

      <div id="main-navbar" class="row">
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li class="home">
              <a href="index.php" ><i class="fa fa-home"></i>الرئيسية</a>
            </li>
            <li class="news">
              <a href="index.php" ><i class="fa fa-newspaper-o"></i> الأخبار</a>
            </li>
            <li class="live_matches">
              <a href="matche.php" ><i class="fa fa-futbol-o"></i>المباريات</a>
            </li>
            <li class="analyse">
              <a href="index.php" ><i class="fa fa-file-text-o"></i> المقالات</a>
            </li>
            <li class="photos">
              <a href="index.php" ><i class="fa fa-picture-o"></i> صور</a>
            </li>
            <li class="videos">
              <a href="index.php" ><i class="fa fa-video-camera"></i> فيديو</a>
            </li>
            <li class="competitions dropdown cmp_matches cmp_table_raking cmp_top_raking">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-bullseye"></i> الدوريات <span class="caret"></span>
              </a>
              <!-- dawriyat -->
              <ul class="dropdown-menu" id="dawriyat">
                <li class="competition_ competition_17814">
                  <a href="competition.php?id=17814" class="cmp_botola_pro">الدوري المغربي الممتاز</a>
                </li> 
                <li class="competition_ competition_17516">
                  <a href="competition.php?id=17516" class="cmp_spain_primera_division">الدوري الاسباني</a> 
                </li> 
                <li class="competition_ competition_17429">
                  <a href="competition.php?id=17429" class="cmp_england_premier_league">الدوري الإنجليزي الممتاز</a> 
                </li> 
                <li class="competition_ competition_17886">
                  <a href="competition.php?id=17886" class="cmp_italy_serie_a">الدوري الإيطالي</a> 
                </li> 
                <li class="competition_ competition_17555">
                  <a href="competition.php?id=17555" class="cmp_france_ligue_1">الدوري الفرنسي</a> 
                </li> 
                <li class="competition_ competition_17512">
                  <a href="competition.php?id=17512" class="cmp_bundesliga">الدوري الألماني</a> 
                </li> 
                <li class="competition_ competition_17689">
                  <a href="competition.php?id=17689" class="cmp_uefa_champions_league">دوري أبطال أوروبا</a> 
                </li> 
                <li class="competition_ competition_17653">
                  <a href="competition.php?id=17653" class="cmp_uefa_europa_league">الدوري الأوروبي</a> 
                </li> 
                <li class="competition_ competition_17522">
                  <a href="competition.php?id=17522" class="cmp_jupiler_pro_league">الدوري البلجيكي</a> 
                </li> 
                <li class="competition_ competition_17663">
                  <a href="competition.php?id=17663" class="cmp_eredivisie">الدوري الهولندي الممتاز</a> 
                </li> 
                <li class="competition_ competition_16888">
                  <a href="competition.php?id=16888" class="cmp_brazil_serie_a">الدوري البرازيلي</a> 
                </li> 
                <li class="competition_ competition_17217">
                  <a href="competition.php?id=17217" class="cmp_qatar_stars_league">دوري النجوم القطري</a> 
                </li> 
                <li class="competition_ competition_17835">
                  <a href="competition.php?id=17835" class="cmp_algerie_ligue_1">الدوري الجزائري</a> 
                </li> 
                <li class="competition_ competition_17874">
                  <a href="competition.php?id=17874" class="cmp_tinisie_ligue_1">الدوري التونسي</a> 
                </li> 
                <li class="competition_ competition_15911">
                  <a href="competition.php?id=15911" class="cmp_jordan_league">الدوري الأردني للمحترفين</a> 
                </li> 
                <li class="competition_ competition_17638">
                  <a href="competition.php?id=17638" class="cmp_arabian_ulf_eague">الدوري الاماراتي الممتاز</a> 
                </li> 
                <li class="competition_ competition_17837">
                  <a href="competition.php?id=17837" class="cmp_saudi_arabia_pro">دوري المحترفين السعودي</a> 
                </li> 
              </ul>
              <!-- / dawriyat -->
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-left">
            <li class="bat">
              <a href="index.php"><span><i class="fa fa-circle"></i>  البت (0)</span></a>
            </li>
          </ul>
        </div>
      </div>

      <div class="row white-bg">
        <div id="live_matches">
          <?php echo buildXSLT('data/matches/live.xml', 'live-matches.xsl'); ?>
          <div class="matche more-matche">
            <div class="contain">
              <a href="matches.php"><i class="fa fa-plus"></i> المزيد</a>
            </div>
          </div>      
          <div class="clear"></div>
        </div>

        <div class="main-index">