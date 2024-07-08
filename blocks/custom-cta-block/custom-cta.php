<?php
/**
 * Custom CTA Block template.
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.

$bg_image= get_field('background_image');
$title = get_field('title');
$button_label = get_field('button_label');
$button_url = get_field('button_url');
$bg_color = get_field('background_color');
$text_color = get_field('text_color');
$button_color= get_field('button_color');

?>

<div class="cta" style=' background: <?php echo esc_attr($bg_color)?>'>
    <?php if($bg_image) { ?>
    <figure class="featured-image">
        <?php echo wp_get_attachment_image($bg_image['ID'], 'full'); ?>
    </figure>
    <?php } else {?>
    <figure class="featured-image">
        <img src="<?php echo get_stylesheet_directory_uri() . '/img/placeholder.png'; ?>" alt="no-img">
    </figure>
    <?php
	}
		?>
    <div class="cta-content-wrap">
        <?php if($title) : ?>
        <div class="title">
            <h2 style='color: <?php echo esc_attr($text_color)?>'><?php echo esc_html($title); ?></h2>
        </div>

        <?php endif; ?>
        <?php if($button_label) : ?>
        <div class="cta-btn" style='background: <?php echo esc_attr($button_color)?>'>
            <a href="<?php echo esc_url( $button_url)?>"><?php echo esc_html($button_label); ?></a>
        </div>
        <?php endif; ?>
    </div>
</div>