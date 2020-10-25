</div>
<footer id="footer">
    <div id="copyright">
        &copy; <?php echo esc_html(date_i18n(__('Y', 'blankslate'))); ?> <?php echo esc_html(get_bloginfo('name')); ?>
    </div>
    <div id="footer-contact">
        <p class="contact-toggle contact-toggle-open">connect</p>
        <p class="contact-toggle contact-toggle-close">&Chi;</p>
        <?php wp_nav_menu(array('theme_location' => 'contact-link-menu')); ?>
    </div>
</footer>
</div>
<?php wp_footer(); ?>
</body>

</html>