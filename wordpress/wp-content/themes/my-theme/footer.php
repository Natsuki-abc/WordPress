</div><!-- #content -->
    <footer id="colophon" class="site-footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-info">
                    <div class="footer-logo">
                        <?php
                        if (has_custom_logo()) {
                            the_custom_logo();
                        } else {
                        ?>
                            <p class="site-title"><?php bloginfo('name'); ?></p>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="footer-contact">
                        <p><?php echo esc_html(get_theme_mod('footer_address', '〒100-0000 東京都千代田区千代田1-1-1')); ?></p>
                        <p>TEL: <?php echo esc_html(get_theme_mod('footer_phone', '090-1111-2222')); ?></p>
                        <p>営業時間: <?php echo esc_html(get_theme_mod('footer_hours', '9:00〜18:00')); ?></p>
                    </div>
                </div>
                <div class="footer-menu">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'footer-menu',
                            'menu_id'        => 'footer-menu',
                        )
                    );
                    ?>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?> All Rights Reserved.</p>
            </div>
        </div>
    </footer><!-- #colophon -->
</div><!-- #page -->
</body>
</html>
