<?php get_header(); ?>
<main id="content" class="work-index-content">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h2 class="work-page-title">
                    <a href="<?php echo get_permalink() ?>">
                        <?php the_title(); ?>
                    </a>
                </h2>
                <?php $worktypes = get_field('work_type');
                if ($worktypes) :
                    foreach ($worktypes as $worktype) :  ?>
                        <a href="<?php echo home_url(); ?>/<?php echo $worktype['value']; ?>">(<?php echo $worktype['label']; ?>)</a>
                <?php endforeach;
                endif; ?>
                <?php if (get_post_type() == 'work' && get_field('completion_date') != null) {
                    $completionDate = new DateTime(get_field('completion_date'));
                ?><p class="work-page-completed-date"><?php echo $completionDate->format('Y'); ?></p><?php
                                                                                                        } ?>
            </article>
    <?php endwhile;
    endif; ?>
</main>
<?php get_footer(); ?>