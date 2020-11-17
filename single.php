<?php get_header(); ?>
<main id="content" class="work-page-content">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="page-header">
                    <h2 class="work-page-title"><?php the_title(); ?></h2>
                    <?php if (get_post_type() == 'work' && the_field('subtitle') != null) {
                    ?><h3 class="work-page-subtitle"><?php the_field('subtitle') ?></h6><?php } ?>
                </header>
                <section class="main-content work-page-main-content">
                    <?php the_post_thumbnail(); ?>
                    <?php the_content(); ?>
                    <?php if (get_post_type() == 'work' && get_field('completion_date') != null) {
                        $completionDate = new DateTime(get_field('completion_date'));
                    ?><p class="work-page-completed-date">completed <?php echo $completionDate->format('F Y'); ?></p><?php
                                                                                                                    } ?>
                    <div class="link-block">
                        <?php
                        $view_link = get_field('link_to_view_work');
                        $postname = $post->post_name;
                        
                        if (get_field('link_to_view_work') != null && strpos($view_link, $postname) == false) { ?>
                            <!-- maybe should only open in new tab if the url doesnt contain the site url (is external) -->
                            <a href="<?php the_field('link_to_view_work'); ?>" target="_blank" class="custom-view-link">
                                <?php the_field('label_for_view_link') ?>
                            </a>
                        <?php } ?>

                        <?php
                        $worktypes = get_field('work_type');
                        if ($worktypes) :
                            foreach ($worktypes as $worktype) :  ?>
                                <a href="<?php echo home_url(); ?>/<?php echo $worktype['value']; ?>">View All '<?php echo $worktype['label']; ?>'</a>
                        <?php endforeach;
                        endif; ?>
                        <a href="<?php echo home_url(); ?>">Home</a>
                    </div>
                </section>
            </article>
    <?php endwhile;
    endif; ?>
</main>
<?php get_footer(); ?>