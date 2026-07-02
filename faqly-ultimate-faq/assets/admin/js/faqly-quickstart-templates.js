jQuery(document).ready(function ($) {
    $(document).on('click', '.faqly-quickstart-use-btn', function () {
        var $button = $(this);

        if ($button.prop('disabled')) {
            return;
        }

        var slug = $button.data('template');
        var originalLabel = $button.text();

        $button.prop('disabled', true).text(faqly_quickstart_vars.i18n.applying);

        $.post(faqly_quickstart_vars.ajax_url, {
            action: 'faqly_apply_faq_template',
            nonce: faqly_quickstart_vars.nonce,
            slug: slug
        }).done(function (response) {
            if (response.success && response.data.edit_url) {
                window.location.href = response.data.edit_url;
                return;
            }

            window.alert((response.data && typeof response.data === 'string') ? response.data : faqly_quickstart_vars.i18n.error);
            $button.prop('disabled', false).text(originalLabel);
        }).fail(function () {
            window.alert(faqly_quickstart_vars.i18n.error);
            $button.prop('disabled', false).text(originalLabel);
        });
    });
});
