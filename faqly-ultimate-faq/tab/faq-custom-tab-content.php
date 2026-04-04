<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Retrieve saved FAQ data
$faqly_faqs = get_post_meta( get_the_ID(), '_faq_items', true );
$faqly_faqs = is_array( $faqly_faqs ) ? $faqly_faqs : [];

?>

<div id="faq-accordion" class="accordion">
    <?php foreach ( $faqly_faqs as $faqly_index => $faqly_faq ) : ?>
        <div class="accordion-item" id="faq-item-<?php echo esc_attr( $faqly_index ); ?>">
            <h2 class="accordion-header" id="heading-<?php echo esc_attr( $faqly_index ); ?>">
                <button class="accordion-button <?php echo $faqly_index === 0 ? '' : 'collapsed'; ?>" 
                        type="button" 
                        data-bs-toggle="collapse" 
                        data-bs-target="#collapse-<?php echo esc_attr( $faqly_index ); ?>" 
                        aria-expanded="<?php echo $faqly_index === 0 ? 'true' : 'false'; ?>" 
                        aria-controls="collapse-<?php echo esc_attr( $faqly_index ); ?>">
                    <!-- FAQ Title with Icon -->
                    <span class="faq-icon">
                        <i class="<?php echo esc_attr( $faqly_faq['icon'] ?? 'default-icon-class' ); ?>"></i>
                    </span>
                    <?php esc_html_e( 'FAQ #', 'faqly-ultimate-faq' ); ?><?php echo esc_html( $faqly_index + 1 ); ?> 
                </button>
            </h2>
            <div id="collapse-<?php echo esc_attr( $faqly_index ); ?>" 
                 class="accordion-collapse collapse <?php echo $faqly_index === 0 ? 'show' : ''; ?>" 
                 aria-labelledby="heading-<?php echo esc_attr( $faqly_index ); ?>" 
                 data-bs-parent="#faq-accordion">
                <div class="accordion-body">
                    <div class="form-group">
                        <label for="faq_title_<?php echo esc_attr( $faqly_index ); ?>">Title:</label>
                        <input type="text" 
                               name="faq_items[<?php echo esc_attr( $faqly_index ); ?>][title]" 
                               id="faq_title_<?php echo esc_attr( $faqly_index ); ?>" 
                               class="form-control" 
                               value="<?php echo esc_attr( $faqly_faq['title'] ?? '' ); ?>" 
                               placeholder="Enter FAQ title">
                    </div>

                    <div class="form-group mt-3">
                        <label for="faq_description_<?php echo esc_attr( $faqly_index ); ?>"><?php esc_html_e( 'Description:', 'faqly-ultimate-faq' ); ?></label>
                        <?php
                        wp_editor( 
                            $faqly_faq['description'] ?? '', 
                            'faq_description_' . $faqly_index, 
                            [
                                'textarea_name' => 'faq_items[' . $faqly_index . '][description]',
                                'media_buttons' => true,
                                'textarea_rows' => 6,
                                'teeny' => false,
                            ] 
                        );
                        ?>
                    </div>

                    <!-- Remove Button -->
                    <button type="button" class="btn btn-danger mt-3 remove-faq-btn" data-faq-id="<?php echo esc_attr( $faqly_index ); ?>">
                        <?php esc_html_e( 'Remove FAQ', 'faqly-ultimate-faq' ); ?>
                    </button>
                    
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<div class="mt-4">
    <button type="button" id="add-faq-btn" class="btn btn-primary"><?php esc_html_e( 'Add New FAQ', 'faqly-ultimate-faq' ); ?></button>
</div>
