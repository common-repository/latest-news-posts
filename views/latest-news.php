<div class="lnpa-wrapper flex mx-auto">

    <?php

    $args = array(
        'post_type' => lnpa_option_val('lnpa_post_type'),
        'posts_per_page' => lnpa_option_val('lnpa_how_many_news')
    );

    $lnap_loop = new WP_Query($args);

    if ($lnap_loop->have_posts()) :
        while ($lnap_loop->have_posts()) :
            $lnap_loop->the_post();
    ?>
            <div class="lnpa-news-item">
                <article>
                    <div class="lnpa-article-inner">
                        <header class="lnpa-relative">
                            <figure class="lnpa-thumbnail">
                                <a href="<?php echo esc_url(get_the_permalink()); ?>">
                                    <picture title="<?php the_title() ?>">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="<?php the_title() ?>">
                                        <?php else : ?>
                                            <img src="<?php echo esc_url(LNPA__PLUGIN_URL); ?>assets/img/388x273.svg" alt="No Image">
                                        <?php endif; ?>
                                    </picture>
                                </a>
                            </figure>

                            <div class="lnpa-absolute lnpa-day-month">
                                <span class="lnpa-db text-center lnpa-day">
                                    <?php echo esc_html(get_the_date('j')); ?> </span>
                                <span class="lnpa-db text-center lnpa-month">
                                    <?php echo substr(esc_html(get_the_date('F')), 0, 3); ?> </span>
                            </div>
                        </header><!-- .entry-header -->

                        <div class="lnpa-article-body">

                            <ul class="lnpa-meta-ul">
                                <li>
                                    <time>
                                        <?php echo esc_html(get_the_date('Y')); ?>
                                    </time>
                                </li>
                                <li class="meta-author">
                                    <span>
                                        By
                                    </span>
                                    <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" rel="author">
                                        <span class="author author_name">
                                            <span><?php the_author(); ?></span>
                                        </span>
                                    </a>
                                </li>


                                <li class="meta-reply">
                                    <a href="<?php echo esc_url(get_comments_link()); ?>">

                                        <span class="replies-count"><?php echo absint(get_comments_number()) ? absint(get_comments_number()) : absint(0); ?></span> <span class="replies-count-label">comment</span>
                                    </a>
                                </li>
                            </ul>

                            <h3 class="lnpa-article-title">
                                <a href="<?php echo esc_url(get_the_permalink()); ?>" rel="bookmark"><?php the_title(); ?></a>
                            </h3>

                            <div class="lnpa-article-content">

                                <p><?php echo lnpa_limit_words(get_the_content(), lnpa_option_val('lnpa_how_many_words')); ?>
                                    <a class="lnpa-read-more" href="<?php echo esc_url(get_the_permalink()); ?>">Read More <span>&#8594;</span></a>
                                </p>

                            </div><!-- .entry-content -->
                        </div>
                    </div>
                </article>
            </div>
        <?php endwhile; ?>
    <?php else :  ?>
        <p class="lnpa-alert"><?php _e('Sorry, no news/post/article found. Please add one.'); ?></p>
    <?php endif; ?>

</div>

<style>
    .lnpa-wrapper {
        width: <?php echo lnpa_option_val('lnpa_wrapper_width'); ?>px;
    }

    .lnpa-news-item {
        max-width: <?php echo lnpa_option_val('lnpa_item_max_width'); ?>px;
    }

    .lnpa-thumbnail picture img {
        height: <?php echo lnpa_option_val('lnpa_item_image_height'); ?>px;
    }

    .lnpa-article-inner {
        min-height: <?php echo lnpa_option_val('lnpa_item_max_height'); ?>px;
    }
</style>