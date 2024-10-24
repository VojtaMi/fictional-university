<?php
get_header();
?>
<?php while (have_posts()) {
        the_post()
    ?>

<div class="page-banner">
    <div class="page-banner__bg-image" <?php bg_image("images/ocean.jpg") ?>></div>
    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title"><?php the_title() ?></h1> 
        <div class="page-banner__intro">
            <p>TODO subheading</p> 
        </div>
    </div>
</div>

<div class="container container--narrow page-section">
    
        <div class="post-item">

            <div class="metabox metabox--position-up metabox--with-home-link">
                <p>
                    <a class="metabox__blog-home-link"
                        href="<?php echo get_post_type_archive_link('event'); ?>">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        Back to Events
                    </a>
                    <span class="metabox__main"><?php echo the_title(); ?></span>
                </p>

            </div>

            <div class="generic-content">
                <?php the_excerpt(); ?>
            </div>
        </div>

    <?php
    }
    echo paginate_links();
    ?>
</div>

<?php
get_footer();
?>