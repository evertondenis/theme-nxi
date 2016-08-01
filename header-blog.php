<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?php wp_title('|', true, 'right'); ?> <?php bloginfo('name'); ?></title>

        <link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    <?php wp_head(); ?>
    </head>

    <body>
        <header class="header header-blog header--fixed hide-from-print">
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

        