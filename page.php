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
        <!-- if the page has a parent display fast links to go back -->
        <?php
        $parent_ID = wp_get_post_parent_id(get_the_ID());
        if ($parent_ID) {
        ?>
            <div class="metabox metabox--position-up metabox--with-home-link">
                <p>
                    <a class="metabox__blog-home-link"
                        href="<?php echo get_permalink($parent_ID); ?>">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        Back to <?php echo get_the_title($parent_ID); ?>
                    </a>
                    <span class="metabox__main"><?php echo the_title(); ?></span>
                </p>

            </div>
        <?php
        }
        ?>

        <!-- If the section has subsections, display a menu for parent and children pages -->
        <?php if (is_submenu_page(get_the_ID())) { ?>
            <div class="page-links">
                <h2 class="page-links__title"><a href="<?php echo submenu_permalink(get_the_ID()); ?>"><?php echo submenu_title(get_the_ID()); ?></a></h2>
                <ul class="min-list">
                    <?php list_submenu_sections(get_the_ID()); ?>
                </ul>
            </div>
        <?php } ?>

        <div class="generic-content">
            <?php the_content() ?>
        </div>
    <?php
}
get_footer();
    ?>