<?php
if (!defined('ABSPATH')) {
    exit;
}
?>

<div id="typography-settings-tabs" class="d-flex">
    <ul class="nav flex-column nav-pills me-3" id="typographySettingsTab" role="tablist" aria-orientation="vertical">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="section-title-typography-tab" data-bs-toggle="pill"
                data-bs-target="#section-title-typography" type="button" role="tab"
                aria-controls="section-title-typography" aria-selected="true">
                <?php esc_html_e( 'Section Typography', 'faqly-ultimate-faq' ); ?>
            </button>
        </li>
    </ul>
    <div class="tab-content flex-grow-1" id="typographySettingsTabContent">
        <!-- Section Title Typography -->
        <div class="tab-pane fade show active" id="section-title-typography" role="tabpanel"
            aria-labelledby="section-title-typography-tab">
            <!-- tittle start-->
            <div class="typography-settings-section">

                <div class="faqly-typography-setting-message">
                    <strong><?php esc_html_e( 'Important:', 'faqly-ultimate-faq' ); ?></strong> <?php esc_html_e( 'Before using these typography settings, you must', 'faqly-ultimate-faq' ); ?>
                    <strong><?php esc_html_e( 'disable "Use Theme Default Style Settings"', 'faqly-ultimate-faq' ); ?></strong> <?php esc_html_e( 'in the', 'faqly-ultimate-faq' ); ?> <strong>Display Settings
                        <?php esc_html_e( 'Tab', 'faqly-ultimate-faq' ); ?></strong>.
                </div>

                <h4><?php esc_html_e( 'Item Title Typography', 'faqly-ultimate-faq' ); ?></h4>

                <!-- Load Google Font Toggle -->
                <div class="setting-group">
                    <label for="faq_item_title_load_font" class="setting-label">
                        <strong><?php esc_html_e( 'Load Accordion Item Title Font', 'faqly-ultimate-faq' ); ?></strong>
                        <span class="description"><?php esc_html_e( 'Enable/disable Google fonts for the accordion item
                            title', 'faqly-ultimate-faq' ); ?></span><?php echo wp_kses_post(faqly_pro_label($faqly_is_premium_user)); ?>
                    </label>
                    <?php
                    $faqly_faq_item_title_load_font = get_post_meta(get_the_ID(), '_faq_item_title_load_font', true);
                    if ($faqly_faq_item_title_load_font === '') {
                        $faqly_faq_item_title_load_font = 'off';
                    }
                    ?>
                    <div class="toggle-wrapper">
                        <label class="toggle-switch">
                            <input type="checkbox" name="faq_item_title_load_font" id="faq_item_title_load_font" <?php checked($faqly_faq_item_title_load_font, 'on'); ?><?php echo esc_attr(faqly_field_disabled_attr($faqly_is_premium_user)); ?>>
                            <span class="toggle-slider"></span>
                        </label>
                    </div>
                </div>

                <!-- Item Title Font Properties -->
                <div class="setting-group">
                    <label class="setting-label">
                        <strong><?php esc_html_e( 'Item Title Font', 'faqly-ultimate-faq' ); ?></strong>
                        <span class="description"><?php esc_html_e( 'Set font properties for accordion item
                            titles', 'faqly-ultimate-faq' ); ?></span><?php echo wp_kses_post(faqly_pro_label($faqly_is_premium_user)); ?>
                    </label>
                    <div class="font-properties-wrapper"
                        style="display: flex; flex-wrap: wrap; gap: 15px; align-items: end;">
                        <!-- Font Family -->
                        <div class="font-property-wrapper">
                            <label for="faq_item_title_font_family" style="font-size: 12px; margin-bottom: 2px;"><?php esc_html_e( 'Font
                                Family', 'faqly-ultimate-faq' ); ?></label>
                            <?php
                            $faqly_faq_item_title_font_family = get_post_meta(get_the_ID(), '_faq_item_title_font_family', true) ?: 'Arial';
                            $faqly_google_fonts = [
                                'Roboto' => 'Roboto',
                                'Source Sans 3' => 'Source Sans 3',
                                'Open Sans' => 'Open Sans',
                                'Lato' => 'Lato',
                                'Montserrat' => 'Montserrat',
                                'Poppins' => 'Poppins',
                                'Nunito' => 'Nunito',
                                'Inter' => 'Inter',
                                'Work Sans' => 'Work Sans',
                                // Unique / Creative Fonts
                                'Unica One' => 'Unica One',
                                'Silkscreen' => 'Silkscreen',
                                'Lobster' => 'Lobster',
                                'Fredericka the Great' => 'Fredericka the Great',
                                'Bungee' => 'Bungee',
                                'Orbitron' => 'Orbitron',
                                'Righteous' => 'Righteous',
                                'Monoton' => 'Monoton',
                                'Zen Dots' => 'Zen Dots',
                                'VT323' => 'VT323'
                            ];
                            ?>
                            <select name="faq_item_title_font_family" id="faq_item_title_font_family" <?php echo esc_attr(faqly_field_disabled_attr($faqly_is_premium_user)); ?> class="form-control"
                                style="width: 120px;">
                                <?php foreach ($faqly_google_fonts as $faqly_key => $faqly_label): ?>
                                    <option value="<?php echo esc_attr($faqly_key); ?>" <?php selected($faqly_faq_item_title_font_family, $faqly_key); ?>>
                                        <?php echo esc_html($faqly_label); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Font Style -->
                        <div class="font-property-wrapper">
                            <label for="faq_item_title_font_style" style="font-size: 12px; margin-bottom: 2px;"><?php esc_html_e( 'Font
                                Style', 'faqly-ultimate-faq' ); ?></label>
                            <?php
                            $faqly_faq_item_title_font_style = get_post_meta(get_the_ID(), '_faq_item_title_font_style', true) ?: 'normal';
                            ?>
                            <select name="faq_item_title_font_style" id="faq_item_title_font_style" class="form-control"
                                <?php echo esc_attr(faqly_field_disabled_attr($faqly_is_premium_user)); ?>
                                style="width: 100px;">
                                <option value="normal" <?php selected($faqly_faq_item_title_font_style, 'normal'); ?>>
                                    <?php esc_html_e( 'Normal', 'faqly-ultimate-faq' ); ?>
                                </option>
                                <option value="italic" <?php selected($faqly_faq_item_title_font_style, 'italic'); ?>>
                                    <?php esc_html_e( 'Italic', 'faqly-ultimate-faq' ); ?>
                                </option>
                                <option value="oblique" <?php selected($faqly_faq_item_title_font_style, 'oblique'); ?>>
                                    <?php esc_html_e( 'Oblique', 'faqly-ultimate-faq' ); ?></option>
                            </select>
                        </div>

                        <!-- Font Subset -->
                        <div class="font-property-wrapper">
                            <label for="faq_item_title_font_subset"
                                style="font-size: 12px; margin-bottom: 2px;"><?php esc_html_e( 'Subset', 'faqly-ultimate-faq' ); ?></label>
                            <?php
                            $faqly_faq_item_title_font_subset = get_post_meta(get_the_ID(), '_faq_item_title_font_subset', true) ?: 'latin';
                            ?>
                            <select name="faq_item_title_font_subset" id="faq_item_title_font_subset" <?php echo esc_attr(faqly_field_disabled_attr($faqly_is_premium_user)); ?> class="form-control"
                                style="width: 100px;">
                                <option value="latin" <?php selected($faqly_faq_item_title_font_subset, 'latin'); ?>>
                                    <?php esc_html_e( 'Latin', 'faqly-ultimate-faq' ); ?>
                                </option>
                                <option value="latin-ext" <?php selected($faqly_faq_item_title_font_subset, 'latin-ext'); ?>>
                                    <?php esc_html_e( 'Latin Ext', 'faqly-ultimate-faq' ); ?></option>
                                <option value="cyrillic" <?php selected($faqly_faq_item_title_font_subset, 'cyrillic'); ?>>
                                    <?php esc_html_e( 'Cyrillic', 'faqly-ultimate-faq' ); ?></option>
                                <option value="cyrillic-ext" <?php selected($faqly_faq_item_title_font_subset, 'cyrillic-ext'); ?>><?php esc_html_e( 'Cyrillic Ext', 'faqly-ultimate-faq' ); ?></option>
                                <option value="greek" <?php selected($faqly_faq_item_title_font_subset, 'greek'); ?>>
                                    <?php esc_html_e( 'Greek', 'faqly-ultimate-faq' ); ?>
                                </option>
                                <option value="greek-ext" <?php selected($faqly_faq_item_title_font_subset, 'greek-ext'); ?>>
                                    <?php esc_html_e( 'Greek Ext', 'faqly-ultimate-faq' ); ?></option>
                                <option value="vietnamese" <?php selected($faqly_faq_item_title_font_subset, 'vietnamese'); ?>><?php esc_html_e( 'Vietnamese', 'faqly-ultimate-faq' ); ?></option>
                            </select>
                        </div>

                        <!-- Text Align -->
                        <div class="font-property-wrapper">
                            <label for="faq_item_title_text_align" style="font-size: 12px; margin-bottom: 2px;"><?php esc_html_e( 'Text
                                Align', 'faqly-ultimate-faq' ); ?></label>
                            <?php
                            $faqly_faq_item_title_text_align = get_post_meta(get_the_ID(), '_faq_item_title_text_align', true) ?: 'left';
                            ?>
                            <select name="faq_item_title_text_align" id="faq_item_title_text_align" class="form-control"
                                <?php echo esc_attr(faqly_field_disabled_attr($faqly_is_premium_user)); ?>
                                style="width: 100px;">
                                <option value="left" <?php selected($faqly_faq_item_title_text_align, 'left'); ?>><?php esc_html_e( 'Left', 'faqly-ultimate-faq' ); ?>
                                </option>
                                <option value="center" <?php selected($faqly_faq_item_title_text_align, 'center'); ?>>
                                    <?php esc_html_e( 'Center', 'faqly-ultimate-faq' ); ?>
                                </option>
                                <option value="right" <?php selected($faqly_faq_item_title_text_align, 'right'); ?>>
                                    <?php esc_html_e( 'Right', 'faqly-ultimate-faq' ); ?>
                                </option>
                                <option value="justify" <?php selected($faqly_faq_item_title_text_align, 'justify'); ?>>
                                    <?php esc_html_e( 'Justify', 'faqly-ultimate-faq' ); ?></option>
                            </select>
                        </div>

                        <!-- Text Transform -->
                        <div class="font-property-wrapper">
                            <label for="faq_item_title_text_transform" style="font-size: 12px; margin-bottom: 2px;"><?php esc_html_e( 'Text
                                Transform', 'faqly-ultimate-faq' ); ?></label>
                            <?php
                            $faqly_faq_item_title_text_transform = get_post_meta(get_the_ID(), '_faq_item_title_text_transform', true) ?: 'none';
                            ?>
                            <select name="faq_item_title_text_transform" id="faq_item_title_text_transform" <?php echo esc_attr(faqly_field_disabled_attr($faqly_is_premium_user)); ?> class="form-control"
                                style="width: 120px;">
                                <option value="none" <?php selected($faqly_faq_item_title_text_transform, 'none'); ?>>
                                    <?php esc_html_e( 'None', 'faqly-ultimate-faq' ); ?>
                                </option>
                                <option value="capitalize" <?php selected($faqly_faq_item_title_text_transform, 'capitalize'); ?>><?php esc_html_e( 'Capitalize', 'faqly-ultimate-faq' ); ?></option>
                                <option value="uppercase" <?php selected($faqly_faq_item_title_text_transform, 'uppercase'); ?>><?php esc_html_e( 'Uppercase', 'faqly-ultimate-faq' ); ?></option>
                                <option value="lowercase" <?php selected($faqly_faq_item_title_text_transform, 'lowercase'); ?>><?php esc_html_e( 'Lowercase', 'faqly-ultimate-faq' ); ?></option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- tittle end -->

            <!-- description start -->

            <div class="typography-settings-section">
                <h4><?php esc_html_e( 'Item Description Typography', 'faqly-ultimate-faq' ); ?></h4>
                <p class="description"><?php esc_html_e( 'Configure typography settings for accordion item descriptions.', 'faqly-ultimate-faq' ); ?></p>

                <!-- Load Google Font Toggle -->
                <div class="setting-group">
                    <label for="faq_item_desc_load_font" class="setting-label">
                        <strong><?php esc_html_e( 'Load Accordion Item Description Font', 'faqly-ultimate-faq' ); ?></strong>
                        <span class="description"><?php esc_html_e( 'Enable/disable Google fonts for the accordion item
                            description', 'faqly-ultimate-faq' ); ?></span><?php echo wp_kses_post(faqly_pro_label($faqly_is_premium_user)); ?>
                    </label>
                    <?php
                    $faqly_faq_item_desc_load_font = get_post_meta(get_the_ID(), '_faq_item_desc_load_font', true);
                    if ($faqly_faq_item_desc_load_font === '') {
                        $faqly_faq_item_desc_load_font = 'off';
                    }
                    ?>
                    <div class="toggle-wrapper">
                        <label class="toggle-switch">
                            <input type="checkbox" name="faq_item_desc_load_font" id="faq_item_desc_load_font" <?php checked($faqly_faq_item_desc_load_font, 'on'); ?><?php echo esc_attr(faqly_field_disabled_attr($faqly_is_premium_user)); ?>>
                            <span class="toggle-slider"></span>
                        </label>
                    </div>
                </div>

                <!-- Item Description Font Properties -->
                <div class="setting-group">
                    <label class="setting-label">
                        <strong><?php esc_html_e( 'Description Font', 'faqly-ultimate-faq' ); ?></strong>
                        <span class="description"><?php esc_html_e( 'Set font properties for accordion item
                            descriptions', 'faqly-ultimate-faq' ); ?></span><?php echo wp_kses_post(faqly_pro_label($faqly_is_premium_user)); ?>
                    </label>
                    <div class="font-properties-wrapper"
                        style="display: flex; flex-wrap: wrap; gap: 15px; align-items: end;">
                        <!-- Font Family -->
                        <div class="font-property-wrapper">
                            <label for="faq_item_desc_font_family" style="font-size: 12px; margin-bottom: 2px;"><?php esc_html_e( 'Font
                                Family', 'faqly-ultimate-faq' ); ?></label>
                            <?php
                            $faqly_faq_item_desc_font_family = get_post_meta(get_the_ID(), '_faq_item_desc_font_family', true) ?: 'Arial';
                            ?>
                            <select name="faq_item_desc_font_family" id="faq_item_desc_font_family" class="form-control"
                                <?php echo esc_attr(faqly_field_disabled_attr($faqly_is_premium_user)); ?>
                                style="width: 120px;">
                                <?php foreach ($faqly_google_fonts as $faqly_key => $faqly_label): ?>
                                    <option value="<?php echo esc_attr($faqly_key); ?>" <?php selected($faqly_faq_item_desc_font_family, $faqly_key); ?>>
                                        <?php echo esc_html($faqly_label); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Font Style -->
                        <div class="font-property-wrapper">
                            <label for="faq_item_desc_font_style" style="font-size: 12px; margin-bottom: 2px;"><?php esc_html_e( 'Font
                                Style', 'faqly-ultimate-faq' ); ?></label>
                            <?php
                            $faqly_faq_item_desc_font_style = get_post_meta(get_the_ID(), '_faq_item_desc_font_style', true) ?: 'normal';
                            ?>
                            <select name="faq_item_desc_font_style" id="faq_item_desc_font_style" class="form-control"
                                <?php echo esc_attr(faqly_field_disabled_attr($faqly_is_premium_user)); ?>
                                style="width: 100px;">
                                <option value="normal" <?php selected($faqly_faq_item_desc_font_style, 'normal'); ?>>
                                    <?php esc_html_e( 'Normal', 'faqly-ultimate-faq' ); ?>
                                </option>
                                <option value="italic" <?php selected($faqly_faq_item_desc_font_style, 'italic'); ?>>
                                    <?php esc_html_e( 'Italic', 'faqly-ultimate-faq' ); ?>
                                </option>
                                <option value="oblique" <?php selected($faqly_faq_item_desc_font_style, 'oblique'); ?>>
                                    <?php esc_html_e( 'Oblique', 'faqly-ultimate-faq' ); ?>
                                </option>
                            </select>
                        </div>

                        <!-- Font Subset -->
                        <div class="font-property-wrapper">
                            <label for="faq_item_desc_font_subset"
                                style="font-size: 12px; margin-bottom: 2px;"><?php esc_html_e( 'Subset', 'faqly-ultimate-faq' ); ?></label>
                            <?php
                            $faqly_faq_item_desc_font_subset = get_post_meta(get_the_ID(), '_faq_item_desc_font_subset', true) ?: 'latin';
                            ?>
                            <select name="faq_item_desc_font_subset" id="faq_item_desc_font_subset" class="form-control"
                                <?php echo esc_attr(faqly_field_disabled_attr($faqly_is_premium_user)); ?>
                                style="width: 100px;">
                                <option value="latin" <?php selected($faqly_faq_item_desc_font_subset, 'latin'); ?>>
                                    <?php esc_html_e( 'Latin', 'faqly-ultimate-faq' ); ?>
                                </option>
                                <option value="latin-ext" <?php selected($faqly_faq_item_desc_font_subset, 'latin-ext'); ?>>
                                    <?php esc_html_e( 'Latin Ext', 'faqly-ultimate-faq' ); ?></option>
                                <option value="cyrillic" <?php selected($faqly_faq_item_desc_font_subset, 'cyrillic'); ?>>
                                    <?php esc_html_e( 'Cyrillic', 'faqly-ultimate-faq' ); ?></option>
                                <option value="cyrillic-ext" <?php selected($faqly_faq_item_desc_font_subset, 'cyrillic-ext'); ?>><?php esc_html_e( 'Cyrillic Ext', 'faqly-ultimate-faq' ); ?></option>
                                <option value="greek" <?php selected($faqly_faq_item_desc_font_subset, 'greek'); ?>>
                                    <?php esc_html_e( 'Greek', 'faqly-ultimate-faq' ); ?>
                                </option>
                                <option value="greek-ext" <?php selected($faqly_faq_item_desc_font_subset, 'greek-ext'); ?>>
                                    <?php esc_html_e( 'Greek Ext', 'faqly-ultimate-faq' ); ?></option>
                                <option value="vietnamese" <?php selected($faqly_faq_item_desc_font_subset, 'vietnamese'); ?>>
                                    <?php esc_html_e( 'Vietnamese', 'faqly-ultimate-faq' ); ?></option>
                            </select>
                        </div>

                        <!-- Text Align -->
                        <div class="font-property-wrapper">
                            <label for="faq_item_desc_text_align" style="font-size: 12px; margin-bottom: 2px;"><?php esc_html_e( 'Text
                                Align', 'faqly-ultimate-faq' ); ?></label>
                            <?php
                            $faqly_faq_item_desc_text_align = get_post_meta(get_the_ID(), '_faq_item_desc_text_align', true) ?: 'left';
                            ?>
                            <select name="faq_item_desc_text_align" id="faq_item_desc_text_align" class="form-control"
                                <?php echo esc_attr(faqly_field_disabled_attr($faqly_is_premium_user)); ?>
                                style="width: 100px;">
                                <option value="left" <?php selected($faqly_faq_item_desc_text_align, 'left'); ?>><?php esc_html_e( 'Left', 'faqly-ultimate-faq' ); ?>
                                </option>
                                <option value="center" <?php selected($faqly_faq_item_desc_text_align, 'center'); ?>>
                                    <?php esc_html_e( 'Center', 'faqly-ultimate-faq' ); ?>
                                </option>
                                <option value="right" <?php selected($faqly_faq_item_desc_text_align, 'right'); ?>><?php esc_html_e( 'Right', 'faqly-ultimate-faq' ); ?>
                                </option>
                                <option value="justify" <?php selected($faqly_faq_item_desc_text_align, 'justify'); ?>>
                                    <?php esc_html_e( 'Justify', 'faqly-ultimate-faq' ); ?>
                                </option>
                            </select>
                        </div>

                        <!-- Text Transform -->
                        <div class="font-property-wrapper">
                            <label for="faq_item_desc_text_transform" style="font-size: 12px; margin-bottom: 2px;"><?php esc_html_e( 'Text
                                Transform', 'faqly-ultimate-faq' ); ?></label>
                            <?php
                            $faqly_faq_item_desc_text_transform = get_post_meta(get_the_ID(), '_faq_item_desc_text_transform', true) ?: 'none';
                            ?>
                            <select name="faq_item_desc_text_transform" id="faq_item_desc_text_transform" <?php echo esc_attr(faqly_field_disabled_attr($faqly_is_premium_user)); ?> class="form-control"
                                style="width: 120px;">
                                <option value="none" <?php selected($faqly_faq_item_desc_text_transform, 'none'); ?>>
                                    <?php esc_html_e( 'None', 'faqly-ultimate-faq' ); ?>
                                </option>
                                <option value="capitalize" <?php selected($faqly_faq_item_desc_text_transform, 'capitalize'); ?>><?php esc_html_e( 'Capitalize', 'faqly-ultimate-faq' ); ?></option>
                                <option value="uppercase" <?php selected($faqly_faq_item_desc_text_transform, 'uppercase'); ?>><?php esc_html_e( 'Uppercase', 'faqly-ultimate-faq' ); ?></option>
                                <option value="lowercase" <?php selected($faqly_faq_item_desc_text_transform, 'lowercase'); ?>><?php esc_html_e( 'Lowercase', 'faqly-ultimate-faq' ); ?></option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- description end  -->
        </div>
    </div>
</div>