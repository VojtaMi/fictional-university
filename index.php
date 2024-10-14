<?php
get_header();
?>

<div class="page-banner">
    <div class="page-banner__bg-image" <?php bg_image("images/ocean.jpg") ?>></div>
    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title">Blog</h1>
        <div class="page-banner__intro">
            <p>See the latest posts</p>
        </div>
    </div>
</div>

<div class="container container--narrow page-section">
    <?php while (have_posts()){
        the_post()
        ?>
        <div class="post-item" >
            <h2> <a href="<?php the_permalink() ?>"><?php the_title() ?></a> </h2> 
        </div> 
         <?php
    } ?>
</div>

<?php
get_footer();
?>