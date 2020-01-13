<!DOCTYPE html>
<html>
<head>
  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8" />
  <title>Vinosinfo</title>
    <meta name="robots" content="index, follow" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
  <meta name="author" content="" />

  <!-- CSS
  ================================================== -->
    <link rel="stylesheet" type="text/css" href="/assets/styles/style.css" />
    <link rel="stylesheet" type="text/css" href="/assets/styles/skitter.styles.css" media="all" />
    <link rel="stylesheet" type="text/css" href="/assets/styles/inner.css" />
    <link rel="stylesheet" href="/assets/styles/prettyPhoto.css" media="screen" />

  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300' rel='stylesheet' type='text/css' />
  <link href='https://fonts.googleapis.com/css?family=Oswald:700,400' rel='stylesheet' type='text/css' />
  <!--[if lt IE 9]>
    <script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

  <!-- Favicons
  ================================================== -->
  <link rel="shortcut icon" href="/assets/images/favicon.ico" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
<div id="bodychild">
  <div id="outercontainer">      
    <!-- HEADER -->
    <div id="outerheader">
        <header>
          <section id="top">
                <div id="logo">
                    <a href="index.html"><img src="/assets/images/logo.png" alt="" /></a>
                </div>
                <ul id="sn">
                    <li><a href="#"><span style="text-decoration:none;font-weight:normal;text-transform:uppercase;color:#999;font-weight: 400; font-family: 'Open Sans', sans-serif;">中文</span></a></li>
                    <li><a><span style="text-decoration:none;font-weight:normal;text-transform:uppercase;color:#000;font-weight: 400; font-family: 'Open Sans', sans-serif;">Español</span></a></li>
                </ul>      
            </section>
            <section id="navigation">
                <nav>
                    <ul id="topnav" class="sf-menu">
                        <?php foreach($menus as $menu):?>
                        <?php if($menu['is_show_top'] == 1):?>
                        <li><a href="<?=$menu['controller']?>" <?=$menu['controller']==$current_menu?'class="current"':''?>><?=$menu['name']?></a></li>
                        <?php endif?>
                        <?php endforeach?>
                    </ul><!-- topnav -->
                </nav><!-- nav -->
            </section>                                
            <div class="clear"></div>
        </header>
    </div>
    <!-- END HEADER -->