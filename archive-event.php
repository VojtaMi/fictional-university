<?php
get_header();
?>

<div class="page-banner">
    <div class="page-banner__bg-image" <?php bg_image("images/ocean.jpg") ?>></div>
    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title">Events</h1>
        <div class="page-banner__intro">
            <p>What is going on</p>
        </div>
    </div>
</div>

<div class="container container--narrow page-section">
    <?php
    $frontpage_events = new WP_Query([
        'posts_per_page' => 2,
        'post_type' => 'event',
    ]);
    while ($frontpage_events->have_posts()) {
        $frontpage_events->the_post()
    ?>

        <div class="event-summary">
            <a class="event-summary__date t-center" href="<?php the_permalink() ?>">
                <span class="event-summary__month">Jan</span>
                <span class="event-summary__day">1</span>
            </a>
            <div class="event-summary__content">
                <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h5>
                <p><?php echo wp_trim_words(get_the_content(), 18) ?> <a href="<?php the_permalink() ?>" class="nu gray">Learn more</a></p>
            </div>
        </div>
    <?php   }
    wp_reset_postdata();
    echo paginate_links();
    ?>
</div>

<?php
get_footer();
?>