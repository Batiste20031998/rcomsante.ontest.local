<?php get_header(); ?>
<div class="container-fluid front-page">
    <div class="container py-5">
        <div class="row">
            <!-- Main Content -->
            <div class="col-9">

                <!-- Carousel -->
                <?php
                $query = new WP_Query([
                    'post_type' => 'carousel-frontpage',
                    'posts_per_page' => 3,
                    'order' => 'ASC',
                ]);
                ?>

                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <?php $count = 0; ?>
                        <?php $button_article = 0; ?>
                        <?php
                        while ($query->have_posts()) : $query->the_post();
                        ?>

                            <div class="carousel-item <?php
                                                        if ($count == 0) {
                                                            echo "active";
                                                        } else {
                                                            echo " ";
                                                        }
                                                        ?>">
                                <?php
                                $image = get_field('image');
                                if (!empty($image)) : ?>
                                    <img class="class=d-block w-100" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                <?php endif; ?>
                                <div class="carousel-caption-new d-md-block p-3">
                                    <h5><?php the_field('titre'); ?></h5>
                                    <p><?php the_field('description'); ?></p>
                                    <?php
                                    if ($button_article == 0) {
                                        echo ' ';
                                    } elseif ($button_article == 1) {
                                        echo '<div class="d-grid gap-2 d-md-flex justify-content-md-end me-3">
                                    <a href="" class="btn btn-success mb-3 active" role="button" aria-pressed="true">Découvrir l\'interview</a>
                                    </div>';
                                    } else {
                                        echo '<div class="d-grid gap-2 d-md-flex justify-content-md-end me-3">
                                        <a href="https://www.youtube.com/watch?v=LHBiHjee8S4" class="btn btn-primary mb-3 active" role="button" aria-pressed="true">Découvrir la chaîne YouTube RComSanté</a>
                                    </div>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <?php $count++; ?>
                            <?php $button_article++; ?>
                        <?php
                        endwhile;
                        wp_reset_postdata();
                        ?>

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>


            </div>
            <!-- Side Bar -->
            <div class="col-3">

            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>