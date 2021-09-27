<?php get_header(); ?>
<div class="container-fluid front-page">
    <div class="container py-5">
        <div class="row">
            <!-- Main Content -->
            <div class="col-9">

                <!-- Carousel -->
                <?php
                $carousel_frontpage = new WP_Query([
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
                        while ($carousel_frontpage->have_posts()) : $carousel_frontpage->the_post();
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

                <!-- 3 questions à ... -->
                <div class="mt-5 p-4" style="background-color: #FFFFFF; border-top: 6px solid #33BD94;">
                    <h2>3 questions à ...</h2>
                    <hr style="width: 508px">
                    <div class="row">
                        <p>Depuis 1991, RComSanté reçois mensuellement un expert éminent pour débattre autour d'un thème.</p>
                        <p>Retrouvez-les en vidéo :</p>
                        <div class="col-7">
                            <?php
                            $single_video_intervenant = new WP_Query([
                                'post_type' => 'last-speakers',
                                'posts_per_page' => 1,
                                'order' => 'DESC'
                            ]);
                            ?>
                            <?php
                            while ($single_video_intervenant->have_posts()) : $single_video_intervenant->the_post();
                            ?>
                                <div class="embed-container" style="width: 100%;">
                                    <?php the_field('video_intervenant'); ?>
                                </div>
                                <div class="p-2 m-0" style="box-shadow: 0px 3px 6px #00000029; opacity: 1;">
                                    <h3><?php the_field('identite_intervenant'); ?></h3>
                                    <p><?php the_field('biographie_intervenant'); ?></p>
                                </div>
                            <?php
                            endwhile;
                            wp_reset_postdata();
                            ?>
                        </div>
                        <div class="col-5 test_my_css scroller" style="height: 415px; overflow: scroll; overflow-x: hidden;">
                            <?php
                            $listing_intervenants = new WP_Query([
                                'post_type' => 'last-speakers',
                                'posts_per_page' => 9,
                                'order' => 'DESC',
                            ]);
                            ?>
                            <?php
                            while ($listing_intervenants->have_posts()) : $listing_intervenants->the_post();
                            ?>
                                <div class="permalink-speakers">
                                    <a href="<?php the_permalink(); ?>">
                                        <div class="listing-intervenants px-3" style="background-color: #33BD9426; border: #ffffff solid;">

                                            <div class="miniature">
                                                <?php
                                                $image = get_field('miniature');
                                                if (!empty($image)) : ?>
                                                    <img style="width: 72px; height: 72px; border-radius: 70px; opacity: 1;" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                                <?php endif; ?>
                                            </div>
                                            <div class="informations py-3 ms-3">
                                                <h5><?php the_field('identite_intervenant'); ?></h5>
                                                <p><?php the_field('biographie_intervenant'); ?></p>
                                                <p><?php the_field('date_intervention_intervenant'); ?></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php
                            endwhile;
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                </div>

                <!-- Nos précédents intervenants -->
                <div class="mt-5 p-4" style="background-color: #FFFFFF; border-top: 6px solid #0099CC;">
                    <h2>Nos précédents intervenants</h2>
                    <hr style="width: 508px">
                    <div class="row">
                        <div class="col">
                            <?php
                            $last_speakers = new WP_Query([
                                'post_type' => 'last-speakers',
                                'posts_per_page' => 9,
                                'order' => 'DESC',
                            ]);
                            ?>
                            <div style="display: flex; flex-direction: row; flex-wrap:wrap; justify-content:space-around;">
                                <?php
                                while ($last_speakers->have_posts()) : $last_speakers->the_post();
                                ?>
                                    <div class="last-speakers">
                                        <a href="<?php the_permalink(); ?>" style="text-decoration: none; color:black">
                                            <div class="mx-3 my-3" style="width:141px; height:241px; text-align:center;">
                                                <?php
                                                $image = get_field('miniature');
                                                if (!empty($image)) : ?>
                                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" style="width: 141px; height: 141px; border-radius: 70px; opacity: 1;" />
                                                <?php endif; ?>
                                                <h5 class="mt-3"><?php the_field('identite_intervenant'); ?></h5>
                                            </div>
                                        </a>
                                    </div>
                                <?php
                                endwhile;
                                wp_reset_postdata();
                                ?>
                                <div class="my-3" style="width:141px; height:141px; background: #0099CCCC 0% 0% no-repeat padding-box; border-radius: 70px; opacity: 1;">
                                    <a href="https://rcomsante.ontest.net/liste-intervenants/" style="text-decoration: none;">
                                        <p class="m-0" style="text-align: center; font: normal normal bold 100px/150px Mukta Vaani; letter-spacing: 0px; color: #FFFFFF; opacity: 1;">+</p>
                                    </a>
                                    <h5 style="text-align: center;">Voir plus d'experts</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Side Bar -->
            <div class="col-3">

            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>