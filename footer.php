</div>
<footer id="footer">
    <div id="copyright">
        &copy; <?php echo esc_html(date_i18n(__('Y', 'blankslate'))); ?> <?php echo esc_html(get_bloginfo('name')); ?>
    </div>
    <div id="footer-contact">
        <?php
        //this custom query gets content from the contact/link page
        $contactPageContent = new WP_Query(array(
            'post_type' => 'page',
            'name' => 'contact-links'
        ));
        //run the above query and get the content of the contact/links page on the DOM
        while ($contactPageContent->have_posts()) {
            $contactPageContent->the_post(); ?>
            <h5 class="contact-toggle contact-toggle-open"><button><?php the_title(); ?></button></h5>
            <button class="contact-toggle contact-toggle-close">&Chi;</button>
            <div class="contact-content"><?php the_content(); ?></div>
            <?php //wp_nav_menu(array('theme_location' => 'contact-link-menu')); 
            ?>
        <?php
        }
        wp_reset_postdata(); //end custom query, reset
        ?>
    </div>
</footer>
</div>
<?php wp_footer(); ?>
</body>

</html>