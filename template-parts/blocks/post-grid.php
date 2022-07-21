<?php

/**
 * Post Grid Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'post-grid-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'post-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-[32px]';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$args = array(  
    'post_type' => 'service',
    'post_status' => 'publish',
    'posts_per_page' => 8, 
    'orderby' => 'title', 
    'order' => 'ASC', 
);

$loop = new WP_Query( $args ); 
?>


<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <div class="bg-[#f5f5f5] p-10 item flex flex-col border-t-8 border-primary">
            <h3 class="font-bold mb-[16px] pr-16"><?php echo get_the_title(); ?></h3>
            <?php the_content(); ?>
            <a class="uppercase font-bold mt-auto learn-more" href="<?php the_permalink(); ?>">Learn More</a>
        </div>
    <?php endwhile; ?>

    <?php wp_reset_postdata(); ?>
</div>