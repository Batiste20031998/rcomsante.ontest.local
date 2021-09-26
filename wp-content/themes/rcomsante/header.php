<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body>

    <div class="container pb-3">
        <header>
            <nav class="navbar navbar-expand-md navbar-light bg-white" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'your-theme-slug'); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="<?= home_url('/') ?>"><img src="<?= get_theme_mod('logo') ?>" alt=""></a>
                <?php
                wp_nav_menu(array(
                    'theme_location'    => 'header',
                    'depth'             => 2,
                    'container'         => 'div',
                    'container_class'   => 'collapse navbar-collapse',
                    'container_id'      => 'bs-example-navbar-collapse-1',
                    'menu_class'        => 'nav navbar-nav',
                    'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'            => new WP_Bootstrap_Navwalker(),
                ));
                ?>

            </nav>
            <div class="social-header pt-4">
                <p class="my-0 ms-2">Nous suivre</p>
                <a class="ms-2" href="https://twitter.com/RComSante"><img src="<?= get_template_directory_uri() . '/img/RComSante-twitter-icon.svg'; ?>" alt=""></a>
                <p class="my-0 ms-2">|</p>
                <a class="ms-2" href="https://www.linkedin.com/company/rcs-r%C3%A9seau-communication-sant%C3%A9/"><img src="<?= get_template_directory_uri() . '/img/RComSante-linkedin-icon.svg' ?>" alt=""></a>
            </div>
        </header>
    </div>