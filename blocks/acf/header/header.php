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
$class_name = 'header';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}

// Load values and assign defaults.
// $text             = get_field( 'video' ) ?: 'video banner';


// Build a valid style attribute for background and text colors.
// $styles = array( 'background-color: ' . $background_color, 'color: ' . $text_color );
// $style  = implode( '; ', $styles );

?>
    <header class="site-header">
      <div class="site-header__inner p-4">
        <div class="site-branding">

          <p class="site-title">
            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                <span class="screen-reader-text"><?php bloginfo('name'); ?></span>
                <div class="site-header__logo">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 102.25 37.392">
                        <g id="Layer_2" data-name="Layer 2" transform="translate(0 0)">
                            <g id="Layer_1" data-name="Layer 1" transform="translate(0 0)">
                            <path id="Path_1" data-name="Path 1" d="M247.982,13.2a5.774,5.774,0,0,1-2.213,2.5,7.234,7.234,0,0,1-4,1H236.2l1.77-10.457c.437-.061,1.037-.119,1.8-.166s1.456-.07,2.114-.07a16.216,16.216,0,0,1,3.786.364,4.091,4.091,0,0,1,2.228,1.27,3.789,3.789,0,0,1,.757,2.5,7.431,7.431,0,0,1-.67,3.052m5.5,15.978q-.058-.146-.128-.341c-.047-.128-.1-.268-.157-.413a18.537,18.537,0,0,0-1.747-4.077,8.759,8.759,0,0,0-2.242-2.621,11.7,11.7,0,0,0,7.044-4.543,13.39,13.39,0,0,0,2.257-7.755,7.854,7.854,0,0,0-3.684-7.059Q251.139-.009,242.854,0h-17.69a8.66,8.66,0,0,1,5.212,8.153,10.939,10.939,0,0,1-4.933,9.318,10.552,10.552,0,0,1,1.587,1.252,8.532,8.532,0,0,1,2.72,6.368,11.878,11.878,0,0,1-6.7,11.144,21.341,21.341,0,0,1-2.6,1.15H232.7l2.429-13.977h4.484q.486,0,1.165.769a10.65,10.65,0,0,1,1.4,2.245,20.7,20.7,0,0,1,1.3,3.494q.8,2.589,1.112,3.736.513,1.805.772,2.574a3.4,3.4,0,0,0,.6,1.165h11.2a10.055,10.055,0,0,1-1.372-2.33q-.6-1.377-2.315-5.87" transform="translate(-156.256 0)" fill="#fff"/>
                            <path id="Path_2" data-name="Path 2" d="M59.162,13.618A5.007,5.007,0,0,0,61.2,9.18a2.576,2.576,0,0,0-1.485-2.574,10.852,10.852,0,0,0-4.4-.69H52.124l-1.6,9.106H53.1a10.682,10.682,0,0,0,6.057-1.4M56.11,30.961a5.7,5.7,0,0,0,3.028-1.77,5.419,5.419,0,0,0,1.1-3.625,4.65,4.65,0,0,0-.786-2.868,4.243,4.243,0,0,0-2.443-1.456,18.406,18.406,0,0,0-4.426-.428q-1.747,0-3.058.1L47.779,31.287a28.57,28.57,0,0,0,3.494.172,20.145,20.145,0,0,0,4.843-.489M68.9,20.2a6.587,6.587,0,0,1,2.085,4.95,9.852,9.852,0,0,1-5.512,9.318q-5.512,2.953-15.625,2.964H36.711L42.966.08h14.14q14.51,0,14.51,8.153A8.832,8.832,0,0,1,69.432,14.3a10.7,10.7,0,0,1-6.441,3.2,11.146,11.146,0,0,1,5.914,2.685M30.136.08,27.841,13.787c-7.51.149-11.962,2.263-14.469,4.182l.291-1.677L16.368.08H6.255L0,37.432H10.11l.25-1.494c1.057-3.494,4.752-11.9,15.824-12.277L23.878,37.432H34.1L40.36.08Z" transform="translate(0 -0.057)" fill="#fff"/>
                            </g>
                            </g>
                    </svg>
                </div>
            </a>
          </p>

        </div>

        <div class="site-header__nav-container">
          <InnerBlocks />
        </nav>
      </div>
    </header>