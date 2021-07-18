<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="<?= get_template_directory_uri() ?>/dist/assets/favicon.ico"/>
    <?php wp_head(); ?>
</head>
<body>

    <div id="app"></div>
    <!-- Vue components will be built here -->

    <?php wp_footer(); ?>
</body>
</html>
