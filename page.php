<?php get_header(); ?>
<main id="content">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="page-header">
                    <h2 class="entry-title"><?php the_title(); ?></h2>
                </header>
                <?php if ($post->post_name != 'artist-statement' && $post->post_name != 'contact-links') { ?>
                    <p id="now-viewing">Now Viewing: <span class="page-title-span"><?php the_title(); ?></span></p>
                <?php } ?>
                <section class="main-content">
                    <?php
                    //for work type pages there may or may not be any content associated with that page
                    //it might be title only, but could have text too.
                    the_content()
                    ?>
                    <?php
                    //custom query below will only yield results on work pages
                    //but no harm in running it on all of them?
                    //because it'll just return nothing
                    //use the url to figure out the type of work to query for!
                    $thisPageWorkPosts = new WP_Query(array(
                        'post_type' => 'work',
                        'meta_key' => 'work_type',
                        // order by completion date? post order?(drag to reorder plugin??)
                        // 'orderby' => _______,
                        // 'order' => 'ASC',

                        // meta query says only include ones where the work type equals page slug
                        'meta_query' => array(
                            array(
                                'key' => 'work_type',
                                'compare' => 'LIKE',
                                'value' => $pagename,
                            )
                        )
                    ));
                    //this gets the posts that fit the above query's criteria (IF ANY) and puts em on the page

                    while ($thisPageWorkPosts->have_posts()) {
                        $thisPageWorkPosts->the_post(); ?>
                        <div class="work-item">
                            <?php $completionDate = new DateTime(get_field('completion_date')); ?>
                            <h5 class="work-item-header" id="<?php echo $post->post_name ?>"><?php the_title(); ?></h5>
                            <h6 class="work-item-subtitle"><?php the_field('subtitle') ?></h6>
                            <?php if (get_post_type() == 'work' && get_field('completion_date') != null) {
                            ?><p class="completed-date">completed <?php echo $completionDate->format('F Y'); ?></p><?php
                                                                                                                } ?>
                            <div class="work-item-content"><?php the_content(); ?></div>
                            <div class="thumbnail-link">
                                <?php the_post_thumbnail(); ?>
                                <?php if (get_field('link_to_view_work') != null) { 
                                    //if the link is to somewhere else on the site (contains '/work'), open it in this tab
                                    if (strpos(get_field('link_to_view_work'), '/work')){?>
                                        <a href="<?php the_field('link_to_view_work'); ?>" class="custom-view-link">
                                            <?php the_field('label_for_view_link') ?>
                                        </a><?php
                                    }
                                    //if the link is external (anything else), open in new tab
                                    else {?>
                                    <a href="<?php the_field('link_to_view_work'); ?>" target="_blank" class="custom-view-link">
                                        <?php the_field('label_for_view_link') ?>
                                    </a><?php
                                    }
                                } ?>
                            </div>
                        </div>
                    <?php
                    }
                    wp_reset_postdata(); //this is good to do right after any custom query
                    ?>
                </section>
            </article>
    <?php endwhile;
    endif; ?>
</main>
<?php get_footer(); ?>