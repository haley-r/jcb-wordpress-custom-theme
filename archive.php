<?php get_header(); ?>
<main id="content" class="work-index-content">
    <h1 class="index-title">Index of Work</h1>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h2>
                    <a href="<?php echo get_permalink() ?>">
                        <?php the_title(); ?>
                    </a>
                    <?php $worktypes = get_field('work_type');
                    if ($worktypes) :
                        foreach ($worktypes as $worktype) :  ?>
                            <span class="work-type"><a href="<?php echo home_url(); ?>/<?php echo $worktype['value']; ?>">(<?php echo $worktype['label']; ?>)</a></span>
                    <?php endforeach;
                    endif; ?>
                    <?php if (get_post_type() == 'work' && get_field('completion_date') != null) {
                        $completionDate = new DateTime(get_field('completion_date'));
                    ?><span class="work-page-completed-date">- <?php echo $completionDate->format('Y'); ?></span><?php
                    } ?>
                </h2>
            </article>
    <?php endwhile;
    endif; ?>
</main>
<?php get_footer(); ?>