# wp-secure-feedback-widget# WP Secure Feedback Widget

A simple, secure WordPress plugin that adds a feedback form via shortcode.

- Uses nonces, sanitization, escaping
- Built following WordPress Coding Standards (WPCS + VIPCS)
- Demonstrates learning effort in WordPress plugin security & VIP readiness
## Usage
Add this shortcode anywhere:

The form will appear. On submit, it securely handles input using:
- Nonces (`wp_nonce_field`)
- Sanitization (`sanitize_textarea_field`)
- Escaping (`esc_html`)
## Code Quality
Checked with:
- PHPCS + WordPress Coding Standards
- VIPCS

No errors, fully standards-compliant
