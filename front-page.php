<?php get_header(); ?>
<main id="content">
    <div id="splash-div">
        <h1 class="splash-title"><?php echo esc_html(get_bloginfo('name')); ?></h1>
    </div>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="page-header">
                    <h2 class="entry-title"><?php the_title(); ?></h2>
                </header>
                <section class="main-content">
                    <?php the_content(); ?>
                </section>
            </article>
    <?php endwhile;
    endif; ?>
</main>
<?php get_footer(); ?>