<?php get_header(); ?>
<main id="content">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </header>
                <section>
                    <?php
                    $worktypes = get_field('work_type');
                    if ($worktypes) : ?>
                        <ul>
                            <?php foreach ($worktypes as $worktype) : ?>
                                <li><?php echo $worktype; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <?php
                    //use the url to figure out the type of work to query for!
                    $thisPageWorkPosts = new WP_Query(array(
                        'post_type' => 'work',
                        'meta_key' => 'work_type',
                        // 'orderby' => 'meta_value_num',
                        'order' => 'ASC',
                        // meta query says only include ones where the work type equals page slug

                        'meta_query' => array(
                            array(
                                'key' => 'work_type',
                                'compare' => 'LIKE',
                                'value' => $pagename,
                            )
                        )
                    ));

                    while ($thisPageWorkPosts->have_posts()) {
                        $completionDate = new DateTime(get_field('completion_date'));
                        $thisPageWorkPosts->the_post(); ?>
                        <div class="work-item">
                            <h5><?php the_title(); ?></h5>
                            <p><?php the_content(); ?></p>
                            <p>completed: <?php echo $completionDate->format('F Y'); ?></p>
                            <p>work type: <?php the_field('work_type'); ?></p>
                            <p>page name: <?php echo $pagename ?></p>
                            <a href="<?php the_permalink(); ?>"><?php the_permalink(); ?></a>
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