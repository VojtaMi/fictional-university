<?php
get_header();
while (have_posts()) {
    the_post();
?>
    <div class="page-banner">
        <div class="page-banner__bg-image" <?php bg_image("images/ocean.jpg") ?>></div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title"><?php the_title() ?></h1>
            <div class="page-banner__intro">
                <p>TODO: subheading</p>
            </div>
        </div>
    </div>

    <div class="container container--narrow page-section">
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p>
                <a class="metabox__blog-home-link" href="<?php echo home_url('/blog'); ?>">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    Back to Blogs
                </a>
                <span class="metabox__main">posted by <?php the_author_posts_link() ?> on <?php the_time("M j, Y") ?> in <?php echo get_the_category_list(", ") ?></span>
            </p>

        </div>
        <?php the_content() ?>
    </div>

<?php
}
get_footer();
?>