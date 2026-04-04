<?php
if (!defined('ABSPATH')) {
    exit;
}

// Get the current selected theme
$faqly_selected_theme = get_post_meta(get_the_ID(), '_faqly_selected_theme', true) ?: 'faqly-one';
$faqly_is_premium_user = get_option('faqly_pro_is_premium', false);

// Define available themes
$faqly_themes = [
    'faqly-one'   => 'Theme One',
    'faqly-two'   => 'Theme Two', 
    'faqly-three' => 'Theme Three',
    'faqly-four'  => 'Theme Four',
    'faqly-five'  => 'Theme Five',
    'faqly-six'   => 'Theme Six',
    'faqly-seven' => 'Theme Seven',
    'faqly-eight' => 'Theme Eight',
    'faqly-nine'  => 'Theme Nine',
    'faqly-ten'   => 'Theme Ten',
    'faqly-eleven'   => 'Theme Eleven',
    'faqly-twelve'   => 'Theme Twelve',
    'faqly-thirteen' => 'Theme Thirteen',
    'faqly-fourteen' => 'Theme Fourteen',
    'faqly-fifteen'  => 'Theme Fifteen',
    'faqly-sixteen'  => 'Theme Sixteen',
    'faqly-seventeen'=> 'Theme Seventeen'
];

$faqly_is_selected_theme_valid = !in_array($faqly_selected_theme, ['faqly-one', 'faqly-two', 'faqly-three']) ? $faqly_is_premium_user : true;

if (!$faqly_is_selected_theme_valid) {
    $faqly_selected_theme = 'faqly-one';
}

?>
<div class="theme-settings-content">
    <h3><?php esc_html_e( 'Select FAQ Theme', 'faqly-ultimate-faq' ); ?></h3>
    <p><?php esc_html_e( 'Choose from our pre-designed themes to style your FAQ accordion.', 'faqly-ultimate-faq' ); ?></p>
    
    <div class="row theme-selection-container">
        <?php foreach ($faqly_themes as $faqly_theme_slug => $faqly_theme_name):
            $faqly_is_pro_theme = !in_array($faqly_theme_slug, ['faqly-one', 'faqly-two', 'faqly-three']);
            $faqly_is_disabled = $faqly_is_pro_theme && !$faqly_is_premium_user;
            $faqly_is_selected = $faqly_selected_theme === $faqly_theme_slug;
            $faqly_is_selectable = !$faqly_is_disabled || $faqly_is_selected;
        ?>
            <div class="col-md-4 mb-4">
                <div class="card theme-card <?php echo $faqly_is_selected ? 'theme-selected' : ''; ?> <?php echo $faqly_is_disabled ? 'theme-disabled' : ''; ?>"
                     data-theme="<?php echo esc_attr($faqly_theme_slug); ?>"
                     style="<?php echo $faqly_is_disabled ? 'opacity: 0.7; cursor: not-allowed;' : 'cursor: pointer;'; ?>">
                    <div class="card-body text-center">
                        <div class="theme-preview">
                            <img src="<?php echo esc_url(FAQLY_PLUGIN_URL . 'assets/images/theme-preview/' . $faqly_theme_slug . '.png'); ?>"
                                 alt="<?php echo esc_attr($faqly_theme_name); ?>"
                                 class="img-fluid theme-preview-image">
                        </div>
                        <h5 class="card-title mt-3"><?php echo esc_html($faqly_theme_name); ?> <?php echo $faqly_is_pro_theme ? wp_kses_post(faqly_pro_label($faqly_is_premium_user)) : ''; ?></h5>
                        <div class="theme-selection-indicator">
                            <?php if ($faqly_is_selected): ?>
                                <span class="badge bg-success"><?php esc_html_e( 'Selected', 'faqly-ultimate-faq' ); ?></span>
                            <?php elseif ($faqly_is_selectable): ?>
                                <span class="badge bg-secondary"><?php esc_html_e( 'Select', 'faqly-ultimate-faq' ); ?></span>
                            <?php else: ?>
                                <span class="badge bg-secondary"><?php esc_html_e( 'Select', 'faqly-ultimate-faq' ); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    
    <input type="hidden" name="faqly_selected_theme" id="faqly_selected_theme" value="<?php echo esc_attr($faqly_selected_theme); ?>">
</div>


