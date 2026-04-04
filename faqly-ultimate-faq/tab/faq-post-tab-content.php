<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Prefixed variables
$faqly_post_type = get_post_meta( get_the_ID(), '_faq_post_type', true );
$faqly_order_by  = get_post_meta( get_the_ID(), '_faq_order_by', true );
$faqly_order     = get_post_meta( get_the_ID(), '_faq_order', true );
$faqly_is_premium_user = get_option('faqly_pro_is_premium', false);

?>

<div class="form-group">
    <label for="faq_post_type"><?php esc_html_e( 'Post Type:', 'faqly-ultimate-faq' ); ?></label>
    <select name="faq_post_type" id="faq_post_type" class="form-control">
        <option value="faqly_faq" <?php selected( $faqly_post_type, 'faqly_faq' ); ?>><?php esc_html_e( 'All Posts (FAQ)', 'faqly-ultimate-faq' ); ?></option>
        <option value="post" <?php selected( $faqly_post_type, 'post' ); ?>><?php esc_html_e( 'Normal Posts', 'faqly-ultimate-faq' ); ?></option>
        <option value="page" <?php selected( $faqly_post_type, 'page' ); ?><?php echo esc_attr(faqly_field_disabled_attr( $faqly_is_premium_user )); ?>><?php esc_html_e( 'Pages(', 'faqly-ultimate-faq' ); ?><?php echo wp_kses_post(faqly_pro_label( $faqly_is_premium_user )); ?><?php esc_html_e( ')', 'faqly-ultimate-faq' ); ?></option>
        <option value="product" <?php selected( $faqly_post_type, 'product' ); ?><?php echo esc_attr(faqly_field_disabled_attr( $faqly_is_premium_user )); ?>><?php esc_html_e( 'Product(', 'faqly-ultimate-faq' ); ?><?php echo wp_kses_post(faqly_pro_label( $faqly_is_premium_user )); ?><?php esc_html_e( ')', 'faqly-ultimate-faq' ); ?></option>
        <option value="custom" <?php selected( $faqly_post_type, 'custom' ); ?><?php echo esc_attr(faqly_field_disabled_attr( $faqly_is_premium_user )); ?>><?php esc_html_e( 'All Custom Posts(', 'faqly-ultimate-faq' ); ?><?php echo wp_kses_post(faqly_pro_label( $faqly_is_premium_user )); ?><?php esc_html_e( ')', 'faqly-ultimate-faq' ); ?></option>
    </select>
    <input type="text" name="faq_custom_post_type" id="faq_custom_post_type" class="form-control" style="margin-top:10px; display: <?php echo ($faqly_post_type === 'custom') ? 'block' : 'none'; ?>;" placeholder="Enter custom post type" value="<?php echo esc_attr( get_post_meta( get_the_ID(), '_faq_custom_post_type', true ) ); ?>">

    <!-- New Filter Posts dropdown -->
    <div class="form-group" style="margin-top: 15px;">
        <label for="faq_filter_posts"><?php esc_html_e( 'Filter Posts:', 'faqly-ultimate-faq' ); ?></label>
        <select name="faq_filter_posts" id="faq_filter_posts" class="form-control">
            <option value="latest" <?php selected( get_post_meta( get_the_ID(), '_faq_filter_posts', true ), 'latest' ); ?>><?php esc_html_e( 'Latest', 'faqly-ultimate-faq' ); ?></option>
            <option value="taxonomy" <?php selected( get_post_meta( get_the_ID(), '_faq_filter_posts', true ), 'taxonomy' ); ?><?php echo esc_attr(faqly_field_disabled_attr( $faqly_is_premium_user )); ?>><?php esc_html_e( 'Taxonomy (', 'faqly-ultimate-faq' ); ?><?php echo wp_kses_post(faqly_pro_label( $faqly_is_premium_user )); ?><?php esc_html_e( ')', 'faqly-ultimate-faq' ); ?></option>
            <option value="specific" <?php selected( get_post_meta( get_the_ID(), '_faq_filter_posts', true ), 'specific' ); ?><?php echo esc_attr(faqly_field_disabled_attr( $faqly_is_premium_user )); ?>><?php esc_html_e( 'Specific Posts(', 'faqly-ultimate-faq' ); ?><?php echo wp_kses_post(faqly_pro_label( $faqly_is_premium_user )); ?><?php esc_html_e( ')', 'faqly-ultimate-faq' ); ?></option>
        </select>
    </div>

    <!-- Taxonomy Filter Input -->
    <div class="form-group taxonomy-filter" style="margin-top: 10px; display: <?php echo (get_post_meta( get_the_ID(), '_faq_filter_posts', true ) === 'taxonomy') ? 'block' : 'none'; ?>;">
        <label for="faq_taxonomy_name"><?php esc_html_e( 'Taxonomy Name:', 'faqly-ultimate-faq' ); ?></label>
        <input type="text" name="faq_taxonomy_name" id="faq_taxonomy_name" class="form-control"
               placeholder="e.g. category, post_tag, custom_taxonomy"
               value="<?php echo esc_attr( get_post_meta( get_the_ID(), '_faq_taxonomy_name', true ) ); ?>"<?php echo esc_attr(faqly_field_disabled_attr( $faqly_is_premium_user )); ?>>
        <small class="form-text text-muted"><?php esc_html_e( 'Enter the taxonomy slug (e.g. category, post_tag, or custom taxonomy name)', 'faqly-ultimate-faq' ); ?></small>
    </div>

    <!-- Taxonomy Terms Input -->
    <div class="form-group taxonomy-terms" style="margin-top: 10px; display: <?php echo (get_post_meta( get_the_ID(), '_faq_filter_posts', true ) === 'taxonomy') ? 'block' : 'none'; ?>;">
        <label for="faq_taxonomy_terms"><?php esc_html_e( 'Taxonomy Terms:', 'faqly-ultimate-faq' ); ?></label>
        <input type="text" name="faq_taxonomy_terms" id="faq_taxonomy_terms" class="form-control"
               placeholder="e.g. term-slug-1, term-slug-2"
               value="<?php echo esc_attr( get_post_meta( get_the_ID(), '_faq_taxonomy_terms', true ) ); ?>"<?php echo esc_attr(faqly_field_disabled_attr( $faqly_is_premium_user )); ?>>
        <small class="form-text text-muted"><?php esc_html_e( 'Enter term slugs separated by commas (leave empty for all terms in the taxonomy)', 'faqly-ultimate-faq' ); ?></small>
    </div>

    <!-- Specific Posts Input -->
    <div class="form-group specific-posts" style="margin-top: 10px; display: <?php echo (get_post_meta( get_the_ID(), '_faq_filter_posts', true ) === 'specific') ? 'block' : 'none'; ?>;">
        <label for="faq_specific_posts"><?php esc_html_e( 'Specific Post IDs:', 'faqly-ultimate-faq' ); ?></label>
        <input type="text" name="faq_specific_posts" id="faq_specific_posts" class="form-control"
               placeholder="e.g. 12,45,89"
               value="<?php echo esc_attr( get_post_meta( get_the_ID(), '_faq_specific_posts', true ) ); ?>">
        <small class="form-text text-muted"><?php esc_html_e( 'Enter post IDs separated by commas', 'faqly-ultimate-faq' ); ?></small>
    </div>
</div>

<div class="form-group">
    <label for="faq_order_by"><?php esc_html_e( 'Order By:', 'faqly-ultimate-faq' ); ?></label>
    <select name="faq_order_by" id="faq_order_by" class="form-control">
        <option value="title" <?php selected( $faqly_order_by, 'title' ); ?>><?php esc_html_e( 'Title', 'faqly-ultimate-faq' ); ?></option>
        <option value="date" <?php selected( $faqly_order_by, 'date' ); ?>><?php esc_html_e( 'Date', 'faqly-ultimate-faq' ); ?></option>
        <option value="ID" <?php selected( $faqly_order_by, 'ID' ); ?>><?php esc_html_e( 'ID', 'faqly-ultimate-faq' ); ?></option>
    </select>
</div>

<div class="form-group">
    <label for="faq_order"><?php esc_html_e( 'Order (Ascending/Descending):', 'faqly-ultimate-faq' ); ?></label>
    <select name="faq_order" id="faq_order" class="form-control">
        <option value="ASC" <?php selected($faqly_order, 'ASC'); ?>><?php esc_html_e( 'Ascending', 'faqly-ultimate-faq' ); ?></option>
        <option value="DESC" <?php selected($faqly_order, 'DESC'); ?>><?php esc_html_e( 'Descending', 'faqly-ultimate-faq' ); ?></option>
    </select>
</div>

<div class="form-group">
    <label for="faq_exclude_ids"><?php esc_html_e( 'Exclude by ID (comma separated):', 'faqly-ultimate-faq' ); ?></label>
    <input type="text" name="faq_exclude_ids" id="faq_exclude_ids" class="form-control"
           value="<?php echo esc_attr( get_post_meta( get_the_ID(), '_faq_exclude_ids', true ) ); ?>"
           placeholder="e.g. 12,45,89">
</div>
