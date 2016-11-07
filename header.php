<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?php wp_title('|', true, 'right'); ?> <?php bloginfo('name'); ?></title>

        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo bloginfo('template_url');?>/images/favicon/favicon-16x16.png">

        <link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    <?php wp_head(); ?>
    <!-- Hotjar Tracking Code for www.nextidea.com.br -->
    <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:57575,hjsv:5};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
    </script>
    </head>

    <body>
        <header class="header header--fixed hide-from-print">
            <div class="container">
                <h1 class="logo"><a href="<?php bloginfo('url');?>" title="<?php bloginfo('description');?>"><?php bloginfo('name');?></a></h1>
                <nav class="menu-menu-principal-container">
                    <?php wp_nav_menu( array( 'menu' => 'topo', 'depth' => 2, 'container' => false, 'menu_class' => 'menu', 'walker' => new wp_bootstrap_navwalker()));?>
                    <button class="c-hamburger c-hamburger--htx">
                      <span>toggle menu</span>
                    </button>
                </nav>
            </div>
        </header>

        