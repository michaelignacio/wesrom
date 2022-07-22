<?php

/**
 * Testimonial Slider Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'testimonial-slider-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'testimonial-slider my-slider';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$count = get_field('count') ? get_field('count') : -1;

$args = array(  
    'post_type' => 'testimonial',
    'post_status' => 'publish',
    'posts_per_page' => $count, 
    'orderby' => 'title', 
    'order' => 'ASC', 
);

$loop = new WP_Query( $args ); 
?>


<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <div class="testimonial">
            <div class="inner flex items-center justify-center flex-col bg-[#FAFAFA] h-[414px]">
                <div class="w-[472px] relative">
                    <?php the_content(); ?>
                    <p class="text-[20px] leading-[24px]"><span class="font-bold uppercase"><?php echo get_the_title(); ?></span>, <?php the_field('role', get_the_ID()); ?>, <?php the_field('company', get_the_ID()); ?></p>
                    <svg width="64" height="50" viewBox="0 0 64 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.4709 0C18.648 0 22.0793 1.32353 24.7646 3.97059C27.4499 6.51961 28.7925 9.90196 28.7925 14.1176C28.7925 16.0784 28.5439 18.0392 28.0466 20C27.5493 21.9608 26.5051 24.902 24.9138 28.8235L16.2611 50H1.49184L7.90676 26.7647C5.42036 25.6863 3.48096 24.0686 2.08858 21.9118C0.696193 19.7549 0 17.1569 0 14.1176C0 9.90196 1.34266 6.51961 4.02797 3.97059C6.81274 1.32353 10.2937 0 14.4709 0ZM49.6783 0C53.8555 0 57.2867 1.32353 59.972 3.97059C62.6573 6.51961 64 9.90196 64 14.1176C64 16.0784 63.7514 18.0392 63.2541 20C62.7568 21.9608 61.7125 24.902 60.1212 28.8235L51.4685 50H36.6993L43.1142 26.7647C40.6278 25.6863 38.6884 24.0686 37.296 21.9118C35.9037 19.7549 35.2075 17.1569 35.2075 14.1176C35.2075 9.90196 36.5501 6.51961 39.2354 3.97059C42.0202 1.32353 45.5012 0 49.6783 0Z"/>
                    </svg>
                    <svg width="244" height="135" viewBox="0 0 244 135" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute -bottom-24 right-0">
                        <path opacity="0.1" d="M188.83 0C172.904 0 159.823 5.02941 149.585 15.0882C139.347 24.7745 134.228 37.6275 134.228 53.6471C134.228 61.0981 135.176 68.549 137.072 76C138.968 83.451 142.949 94.6275 149.016 109.529L182.005 190H238.312L213.855 101.706C223.335 97.6078 230.729 91.4608 236.037 83.2647C241.346 75.0686 244 65.1961 244 53.6471C244 37.6275 238.881 24.7745 228.643 15.0882C218.026 5.02941 204.755 0 188.83 0ZM54.6014 0C38.676 0 25.5944 5.02941 15.3567 15.0882C5.11889 24.7745 6.79774e-06 37.6275 6.79774e-06 53.6471C6.79774e-06 61.0981 0.947947 68.549 2.84383 76C4.73971 83.451 8.72106 94.6275 14.7879 109.529L47.7762 190H104.084L79.627 101.706C89.1064 97.6078 96.5004 91.4608 101.809 83.2647C107.117 75.0686 109.772 65.1961 109.772 53.6471C109.772 37.6275 104.653 24.7745 94.4149 15.0882C83.798 5.02941 70.5268 0 54.6014 0Z" fill="white"/>
                    </svg>
                </div>
            </div>
        </div>
    <?php endwhile; ?>

    <?php wp_reset_postdata(); ?>
</div>