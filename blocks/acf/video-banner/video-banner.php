<?php
/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */

// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'video-banner';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}

// Load values and assign defaults.
$src             = get_field( 'src' ) ?: 'https://www.youtube.com/embed/_MJp64u22RQ';
$playlist        = get_field( 'playlist' ) ?: '_MJp64u22RQ';


// Build a valid style attribute for background and text colors.
$styles = array( 'background-color: ' . $background_color, 'color: ' . $text_color );
$style  = implode( '; ', $styles );

?>
<div class="video-banner-container">
    <div <?php echo $anchor; ?> class="<?php echo esc_attr( $class_name ); ?>" style="<?php echo esc_attr( $style ); ?>">
        <iframe src="<?php echo $src ?>?controls=0&autoplay=1&mute=1&playsinline=1&loop=1&playlist=<?php echo $playlist ?>"></iframe>
        <div class="video-banner__bottom-gradient"></div>
        <div class="video-banner__inner">
            <div class="video-banner__inner-content">
                <InnerBlocks />
            </div>
        </div>
    </div>
</div>