<?php
if (!defined('ABSPATH')) {
    exit;
}

class Faqly_General_Settings_Metabox
{

    public static function faqly_render_metabox($post)
    {
        $accordion_event = get_post_meta($post->ID, '_accordion_event', true) ?: '.click';
        $accordion_mode = get_post_meta($post->ID, '_accordion_mode', true) ?: '.first_open';
        $faq_search = get_post_meta($post->ID, '_faq_search', true) ?: 'disable';

        $faq_title_font_size = get_post_meta($post->ID, '_faq_title_font_size', true) ?: '25'; // Default font size
        $faq_desc_font_size = get_post_meta($post->ID, '_faq_desc_font_size', true) ?: '18';  // Default font size

        $layout_selection = get_post_meta($post->ID, '_layout_selection', true) ?: 'vertical';
        $icon_style = get_post_meta($post->ID, '_faq_icon_style', true) ?: 'theme-default';
        $icon_position = get_post_meta($post->ID, '_faq_icon_position', true) ?: 'right';
        $faq_schema_markup_enable = get_post_meta($post->ID, '_faq_schema_markup_enable', true) ?: 'disable';

        $faqly_is_premium_user = get_option('faqly_pro_is_premium', false);

        wp_nonce_field('save_faq_settings', 'faq_settings_nonce');
        ?>
        <div id="faqly-general-settings-tabs">
            <ul class="nav nav-tabs" id="faqlySettingsTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="accordion-settings-tab" data-bs-toggle="tab" data-bs-target="#accordion-settings" type="button" role="tab" aria-controls="accordion-settings" aria-selected="true"><?php esc_html_e( 'Accordion Settings', 'faqly-ultimate-faq' ); ?></button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="theme-settings-tab" data-bs-toggle="tab" data-bs-target="#theme-settings" type="button" role="tab" aria-controls="theme-settings" aria-selected="false"><?php esc_html_e( 'Theme Settings', 'faqly-ultimate-faq' ); ?></button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="display-settings-tab" data-bs-toggle="tab" data-bs-target="#display-settings" type="button" role="tab" aria-controls="display-settings" aria-selected="false"><?php esc_html_e( 'Display Settings', 'faqly-ultimate-faq' ); ?></button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="typography-settings-tab" data-bs-toggle="tab" data-bs-target="#typography-settings" type="button" role="tab" aria-controls="typography-settings" aria-selected="false"><?php esc_html_e( 'Typography Settings', 'faqly-ultimate-faq' ); ?></button>
                </li>
                <?php if(!$faqly_is_premium_user){
                    ?>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pro-tab" href="<?php echo esc_url( FAQLY_PLUGIN_MAIN_URL. 'products/the-ultimate-faq-wordpress-plugin'); ?>" target="_blank" role="tab" aria-selected="false"><?php esc_html_e( 'Upgrade To Pro!', 'faqly-ultimate-faq' ); ?> </a>
                </li>
                <?php
                } ?>

            </ul>
            <div class="tab-content" id="faqlySettingsTabContent" style="margin-top: 15px;">
                <div class="tab-pane fade show active" id="accordion-settings" role="tabpanel" aria-labelledby="accordion-settings-tab">
                    <!-- Accordion Settings Content -->

                    <div class="setting-group">
                        <p class="setting-label"><strong><?php esc_html_e( 'Layout Selection:', 'faqly-ultimate-faq' ); ?></strong></p>
                        <div class="radio-group">
                            <label class="radio-option">
                                <input type="radio" name="layout_selection" value="vertical" <?php checked($layout_selection, 'vertical'); ?> /> <?php esc_html_e( 'Vertical', 'faqly-ultimate-faq' ); ?>
                            </label>
                            <label class="radio-option">
                                <input type="radio" name="layout_selection" value="multicolumn" <?php checked($layout_selection, 'multicolumn'); ?><?php echo esc_attr(faqly_field_disabled_attr( $faqly_is_premium_user )); ?> /> <?php esc_html_e( 'Multicolumn', 'faqly-ultimate-faq' ); ?>  <?php echo wp_kses_post(faqly_pro_label( $faqly_is_premium_user )); ?>
                            </label>
                            <label class="radio-option">
                                <input type="radio" name="layout_selection" value="horizontal" <?php checked($layout_selection, 'horizontal'); ?><?php echo esc_attr(faqly_field_disabled_attr( $faqly_is_premium_user )); ?> /> <?php esc_html_e( 'Horizontal', 'faqly-ultimate-faq' ); ?>  <?php echo wp_kses_post(faqly_pro_label( $faqly_is_premium_user )); ?>
                            </label>
                           
                        </div>
                    </div>

                    <hr class="setting-divider" />

                    <div class="setting-group">
                        <p class="setting-label"><strong><?php esc_html_e( 'Accordion Event:', 'faqly-ultimate-faq' ); ?></strong></p>
                        <div class="radio-group">
                            <label class="radio-option">
                                <input type="radio" name="accordion_event" value=".click" <?php checked($accordion_event, '.click'); ?> /> <?php esc_html_e( 'Click', 'faqly-ultimate-faq' ); ?>
                            </label>
                            <label class="radio-option">
                                <input type="radio" name="accordion_event" value=".mouseover" <?php checked($accordion_event, '.mouseover'); ?> /> <?php esc_html_e( 'Mouseover', 'faqly-ultimate-faq' ); ?>
                            </label>
                        </div>
                    </div>

                    <hr class="setting-divider" />

                    <div class="setting-group">
                        <p class="setting-label"><strong><?php esc_html_e( 'Accordion Mode:', 'faqly-ultimate-faq' ); ?></strong></p>
                        <div class="radio-group">
                            <label class="radio-option">
                                <input type="radio" name="accordion_mode" value=".first_open" <?php checked($accordion_mode, '.first_open'); ?> /> <?php esc_html_e( 'First Open', 'faqly-ultimate-faq' ); ?> 
                            </label>
                            <label class="radio-option">
                                <input type="radio" name="accordion_mode" value=".all_open" <?php checked($accordion_mode, '.all_open'); ?> /> <?php esc_html_e( 'All Open', 'faqly-ultimate-faq' ); ?> 
                            </label>
                            <label class="radio-option">
                                <input type="radio" name="accordion_mode" value=".all_folded" <?php checked($accordion_mode, '.all_folded'); ?> /> <?php esc_html_e( 'All Folded', 'faqly-ultimate-faq' ); ?> 
                            </label>
                        </div>
                    </div>

                    <hr class="setting-divider" />

                    <div class="setting-group">
                        <p class="setting-label"><strong><?php esc_html_e( 'FAQ Search:', 'faqly-ultimate-faq' ); ?></strong><?php echo wp_kses_post(faqly_pro_label( $faqly_is_premium_user )); ?></p>
                        <div class="radio-group">
                            <label class="radio-option">
                                <input type="radio" name="faq_search" value="enable" <?php checked($faq_search, 'enable'); ?><?php echo esc_attr(faqly_field_disabled_attr( $faqly_is_premium_user )); ?> />
                                <?php esc_html_e( 'Enable', 'faqly-ultimate-faq' ); ?>
                            </label>
                            <label class="radio-option">
                                <input type="radio" name="faq_search" value="disable" <?php checked($faq_search, 'disable'); ?><?php echo esc_attr(faqly_field_disabled_attr( $faqly_is_premium_user )); ?> />
                                <?php esc_html_e( 'Disable', 'faqly-ultimate-faq' ); ?> 
                            </label>
                        </div>
                    </div>

                    <hr class="setting-divider" />

                    <div class="setting-group">
                        <p class="setting-label"><strong>  <?php esc_html_e( 'Expand/Collapse All Button:', 'faqly-ultimate-faq' ); ?></strong><?php echo wp_kses_post(faqly_pro_label( $faqly_is_premium_user )); ?></p>
                        <div class="radio-group">
                            <label class="radio-option">
                                <input type="radio" name="faq_expand_collapse_all" value="enable"
                                    <?php checked(get_post_meta($post->ID, '_faq_expand_collapse_all', true) ?: 'disable', 'enable'); ?>
                                    <?php echo esc_attr(faqly_field_disabled_attr( $faqly_is_premium_user )); ?> />
                                <?php esc_html_e( 'Show', 'faqly-ultimate-faq' ); ?>
                            </label>
                            <label class="radio-option">
                                <input type="radio" name="faq_expand_collapse_all" value="disable"
                                    <?php checked(get_post_meta($post->ID, '_faq_expand_collapse_all', true) ?: 'disable', 'disable'); ?>
                                    <?php echo esc_attr(faqly_field_disabled_attr( $faqly_is_premium_user )); ?> />
                                <?php esc_html_e( 'Hide', 'faqly-ultimate-faq' ); ?> 
                            </label>
                        </div>
                    </div>

                    

                    <hr class="setting-divider" />

                    <div class="setting-group">
                        <p class="setting-label"><strong><?php esc_html_e( 'Multiple Active Together:', 'faqly-ultimate-faq' ); ?></strong><?php echo wp_kses_post(faqly_pro_label( $faqly_is_premium_user )); ?></p>
                        <div class="radio-group">
                            <label class="radio-option">
                                <input type="radio" name="faq_multiple_active" value="enable" <?php checked(get_post_meta($post->ID, '_faq_multiple_active', true) ?: 'disable', 'enable'); ?> <?php echo esc_attr(faqly_field_disabled_attr( $faqly_is_premium_user )); ?> />
                                <?php esc_html_e( 'Enable', 'faqly-ultimate-faq' ); ?>
                            </label>
                            <label class="radio-option">
                                <input type="radio" name="faq_multiple_active" value="disable" <?php checked(get_post_meta($post->ID, '_faq_multiple_active', true) ?: 'disable', 'disable'); ?><?php echo esc_attr(faqly_field_disabled_attr( $faqly_is_premium_user )); ?> />
                                <?php esc_html_e( 'Disable', 'faqly-ultimate-faq' ); ?> Disable
                            </label>
                        </div>
                        <p class="setting-description"><?php esc_html_e( "Don't collapse while expanding another item.", 'faqly-ultimate-faq' ); ?></p>
                    </div>

                    <hr class="setting-divider" />

                    <div class="setting-group">
                        <p class="setting-label"><strong><?php esc_html_e( 'Schema Markup:', 'faqly-ultimate-faq' ); ?></strong><?php echo wp_kses_post(faqly_pro_label( $faqly_is_premium_user )); ?></p>
                        <p class="setting-description"><?php esc_html_e( 'Schema Markup adds structured data to your Accordion FAQs, enhancing search engine visibility and improving the display of your Accordion FAQs in search results.', 'faqly-ultimate-faq' ); ?></p>
                        <div class="radio-group">
                            <label class="radio-option">
                                <input type="radio" name="faq_schema_markup_enable" value="enable" <?php checked($faq_schema_markup_enable, 'enable'); ?><?php checked(get_post_meta($post->ID, '_faq_multiple_active', true) ?: 'disable', 'enable'); ?> <?php echo esc_attr(faqly_field_disabled_attr( $faqly_is_premium_user )); ?> />
                                <?php esc_html_e( 'Enable', 'faqly-ultimate-faq' ); ?>
                            </label>
                            <label class="radio-option">
                                <input type="radio" name="faq_schema_markup_enable" value="disable" <?php checked($faq_schema_markup_enable, 'disable'); ?><?php checked(get_post_meta($post->ID, '_faq_multiple_active', true) ?: 'disable', 'enable'); ?> <?php echo esc_attr(faqly_field_disabled_attr( $faqly_is_premium_user )); ?> />
                                <?php esc_html_e( 'Disable', 'faqly-ultimate-faq' ); ?>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="theme-settings" role="tabpanel" aria-labelledby="theme-settings-tab">
                    <!-- Theme Settings Content -->
                    <?php include FAQLY_PLUGIN_DIR . 'tab/theme-settings-tab-content.php'; ?>
                </div>
                <div class="tab-pane fade" id="display-settings" role="tabpanel" aria-labelledby="display-settings-tab">
                    <!-- Display Settings Content -->
                    <?php include FAQLY_PLUGIN_DIR . 'tab/display-settings-tab-content.php'; ?>
                </div>
                <div class="tab-pane fade" id="typography-settings" role="tabpanel" aria-labelledby="typography-settings-tab">
                    <!-- Theme Settings Content -->
                    <?php include FAQLY_PLUGIN_DIR . 'tab/typography-settings-tab-content.php'; ?>
                </div>
            </div>
        </div>
        <?php
    }


    public static function faqly_save_metabox($post_id)
    {
        // Save layout selection
        if (isset($_POST['layout_selection'])) {
            update_post_meta($post_id, '_layout_selection', sanitize_text_field(wp_unslash($_POST['layout_selection'])));
        }
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
            return;

        if (!isset($_POST['faq_settings_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['faq_settings_nonce'])), 'save_faq_settings')) {
            return;
        }
        update_post_meta($post_id, '_accordion_event', sanitize_text_field(wp_unslash($_POST['accordion_event'] ?? '')));
        update_post_meta($post_id, '_accordion_mode', sanitize_text_field(wp_unslash($_POST['accordion_mode'] ?? '')));
        update_post_meta($post_id, '_faq_title_font_size', intval(wp_unslash($_POST['faq_title_font_size'] ?? '25')));
        update_post_meta($post_id, '_faq_desc_font_size', intval(wp_unslash($_POST['faq_desc_font_size'] ?? '18')));
        update_post_meta($post_id, '_faq_border_radius', intval(wp_unslash($_POST['faq_border_radius'] ?? '0')));

        // Save theme selection
        if (isset($_POST['faqly_selected_theme'])) {
            update_post_meta($post_id, '_faqly_selected_theme', sanitize_text_field(wp_unslash($_POST['faqly_selected_theme'])));
        }


    }
}