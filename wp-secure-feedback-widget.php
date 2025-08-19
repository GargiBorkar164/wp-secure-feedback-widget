<?php
/**
 * Plugin Name: WP Secure Feedback Widget
 * Description: Adds a secure feedback form using a shortcode.
 * Version: 1.0
 * Author: Your Name
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

function wp_secure_feedback_form() {
    ob_start();
    ?>
    <form method="post">
        <?php wp_nonce_field( 'wp_secure_feedback_action', 'wp_secure_feedback_nonce' ); ?>
        <label for="feedback">Your Feedback:</label><br>
        <textarea name="feedback" required></textarea><br>
        <input type="submit" name="submit_feedback" value="Send Feedback">
    </form>
    <?php

    // Handle form submit
    if ( isset( $_POST['submit_feedback'] ) ) {
        if ( ! isset( $_POST['wp_secure_feedback_nonce'] ) || 
             ! wp_verify_nonce( $_POST['wp_secure_feedback_nonce'], 'wp_secure_feedback_action' ) ) {
            echo "Security check failed.";
            return ob_get_clean();
        }

        $feedback = sanitize_textarea_field( $_POST['feedback'] );

        // In real use: wp_mail( ... )
        echo "✅ Thanks for your feedback: " . esc_html( $feedback );
    }

    return ob_get_clean();
}
add_shortcode( 'secure_feedback', 'wp_secure_feedback_form' );
