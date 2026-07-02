<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if (!function_exists('faqly_get_faq_content_templates')) {
    function faqly_get_faq_content_templates()
    {
        return [
            'general-business' => [
                'title' => __('General Business FAQ', 'faqly-ultimate-faq'),
                'description' => __('Common questions every business website needs answered.', 'faqly-ultimate-faq'),
                'is_pro' => false,
                'items' => [
                    ['title' => __('What are your business hours?', 'faqly-ultimate-faq'), 'description' => __('We are open Monday to Friday, 9 AM to 6 PM. Feel free to reach out anytime and we will respond as soon as possible.', 'faqly-ultimate-faq')],
                    ['title' => __('How can I contact support?', 'faqly-ultimate-faq'), 'description' => __('You can reach our support team via email, phone, or the contact form on our website.', 'faqly-ultimate-faq')],
                    ['title' => __('Do you offer refunds?', 'faqly-ultimate-faq'), 'description' => __('Yes, we offer a 30-day money-back guarantee on all purchases.', 'faqly-ultimate-faq')],
                    ['title' => __('Where are you located?', 'faqly-ultimate-faq'), 'description' => __('Our main office details are listed on our Contact page.', 'faqly-ultimate-faq')],
                    ['title' => __('Do you offer custom solutions?', 'faqly-ultimate-faq'), 'description' => __('Yes, we work with clients to build solutions tailored to their needs. Contact us to discuss your requirements.', 'faqly-ultimate-faq')],
                ],
            ],
            'ecommerce-store' => [
                'title' => __('E-commerce Store FAQ', 'faqly-ultimate-faq'),
                'description' => __('Answer the shipping, returns, and payment questions shoppers ask most.', 'faqly-ultimate-faq'),
                'is_pro' => false,
                'items' => [
                    ['title' => __('What payment methods do you accept?', 'faqly-ultimate-faq'), 'description' => __('We accept all major credit cards, PayPal, and other secure payment options at checkout.', 'faqly-ultimate-faq')],
                    ['title' => __('How long does shipping take?', 'faqly-ultimate-faq'), 'description' => __('Orders are typically processed within 1-2 business days and delivered within 5-7 business days.', 'faqly-ultimate-faq')],
                    ['title' => __('What is your return policy?', 'faqly-ultimate-faq'), 'description' => __('Items can be returned within 30 days of delivery for a full refund, provided they are unused and in original packaging.', 'faqly-ultimate-faq')],
                    ['title' => __('Do you ship internationally?', 'faqly-ultimate-faq'), 'description' => __('Yes, we ship to most countries worldwide. Shipping costs and times vary by destination.', 'faqly-ultimate-faq')],
                    ['title' => __('How do I track my order?', 'faqly-ultimate-faq'), 'description' => __('Once your order ships, you will receive a tracking number by email.', 'faqly-ultimate-faq')],
                ],
            ],
            'saas-software' => [
                'title' => __('SaaS / Software FAQ', 'faqly-ultimate-faq'),
                'description' => __('Cover pricing, trials, and account questions for software products.', 'faqly-ultimate-faq'),
                'is_pro' => true,
                'items' => [
                    ['title' => __('Is there a free trial?', 'faqly-ultimate-faq'), 'description' => __('Yes, we offer a 14-day free trial with full access to all features. No credit card required.', 'faqly-ultimate-faq')],
                    ['title' => __('Can I cancel my subscription anytime?', 'faqly-ultimate-faq'), 'description' => __('Yes, you can cancel your subscription at any time from your account settings with no cancellation fees.', 'faqly-ultimate-faq')],
                    ['title' => __('Do you offer discounts for annual billing?', 'faqly-ultimate-faq'), 'description' => __('Yes, switching to annual billing saves you up to 20% compared to monthly billing.', 'faqly-ultimate-faq')],
                    ['title' => __('Is my data secure?', 'faqly-ultimate-faq'), 'description' => __('We use industry-standard encryption and security practices to keep your data safe.', 'faqly-ultimate-faq')],
                    ['title' => __('Can I upgrade or downgrade my plan?', 'faqly-ultimate-faq'), 'description' => __('Yes, you can change your plan at any time and the difference will be prorated.', 'faqly-ultimate-faq')],
                ],
            ],
            'real-estate' => [
                'title' => __('Real Estate FAQ', 'faqly-ultimate-faq'),
                'description' => __('Address buying, selling, and listing questions for property sites.', 'faqly-ultimate-faq'),
                'is_pro' => true,
                'items' => [
                    ['title' => __('How do I schedule a property viewing?', 'faqly-ultimate-faq'), 'description' => __('You can request a viewing directly from any listing page or by contacting one of our agents.', 'faqly-ultimate-faq')],
                    ['title' => __('What documents do I need to buy a property?', 'faqly-ultimate-faq'), 'description' => __('Typically you will need identification, proof of income, and financing pre-approval. Our agents can guide you through the full checklist.', 'faqly-ultimate-faq')],
                    ['title' => __('Do you help with mortgage financing?', 'faqly-ultimate-faq'), 'description' => __('We partner with trusted lenders and can connect you with financing options that suit your needs.', 'faqly-ultimate-faq')],
                    ['title' => __('How is a property\'s listing price determined?', 'faqly-ultimate-faq'), 'description' => __('Pricing is based on a comparative market analysis of similar properties in the area, condition, and current demand.', 'faqly-ultimate-faq')],
                    ['title' => __('Can you help me sell my current home?', 'faqly-ultimate-faq'), 'description' => __('Yes, our agents provide full listing, marketing, and negotiation services to help you sell.', 'faqly-ultimate-faq')],
                ],
            ],
            'restaurant-hospitality' => [
                'title' => __('Restaurant & Hospitality FAQ', 'faqly-ultimate-faq'),
                'description' => __('Handle reservations, menu, and hours questions for hospitality sites.', 'faqly-ultimate-faq'),
                'is_pro' => true,
                'items' => [
                    ['title' => __('Do you take reservations?', 'faqly-ultimate-faq'), 'description' => __('Yes, reservations can be made online through our booking page or by phone.', 'faqly-ultimate-faq')],
                    ['title' => __('Do you accommodate dietary restrictions?', 'faqly-ultimate-faq'), 'description' => __('Yes, we offer vegetarian, vegan, and gluten-free options. Please let us know about any allergies when booking.', 'faqly-ultimate-faq')],
                    ['title' => __('Is there parking available?', 'faqly-ultimate-faq'), 'description' => __('Yes, we offer on-site parking as well as nearby street parking.', 'faqly-ultimate-faq')],
                    ['title' => __('Do you offer private event bookings?', 'faqly-ultimate-faq'), 'description' => __('Yes, we host private events and celebrations. Contact us for availability and packages.', 'faqly-ultimate-faq')],
                    ['title' => __('What are your opening hours?', 'faqly-ultimate-faq'), 'description' => __('We are open seven days a week; please check our Hours page for daily times.', 'faqly-ultimate-faq')],
                ],
            ],
        ];
    }
}
