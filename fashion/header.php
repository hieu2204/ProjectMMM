<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?php wp_title('|', true, 'right'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<nav class="navbar navbar-expand-md bg-white fixed-top">
    <div class="container">
        <!-- Logo -->
        <a href="<?php echo esc_url(home_url('/')); ?>" class="navbar-brand">FASCO</a>

        <!-- Mobile Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainMenu">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'main_menu',
                'container' => false,
                'menu_class' => 'navbar-nav me-auto',
                'fallback_cb' => false,
                'depth' => 2,
                'walker' => class_exists('WP_Bootstrap_Navwalker') ? new WP_Bootstrap_Navwalker() : null
            ));
            ?>

            <!-- Icon người dùng -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="<?php echo esc_url(home_url('/page-login')); ?>" class="nav-link">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/user.png" alt="Đăng nhập" width="24" height="24">
</a>


                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const menu = document.getElementById('mainMenu');
    if (!menu) return;

    const navLinks = menu.querySelectorAll('.navbar-nav .nav-link');
    const navbarToggler = document.querySelector('.navbar-toggler');
    const navbarCollapse = document.querySelector('.navbar-collapse');

    navLinks.forEach(function (link) {
        link.addEventListener('click', function () {
            if (window.innerWidth < 992 && navbarCollapse && navbarCollapse.classList.contains('show')) {
                navbarToggler.click(); // chỉ đóng menu
                // KHÔNG dùng e.preventDefault()
                // KHÔNG dùng window.location.href
                // Browser tự xử lý link như bình thường
            }
        });
    });
});
</script>


<?php wp_footer(); ?>
</body>
</html>