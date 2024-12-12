<?php
/*
Plugin Name: Whitelist Add-on for WP Mail SMTP
Plugin URI: https://github.com/fivefifteen/whitelist-addon-for-wp-mail-smtp
Version: 0.0.1
Description: An add-on for WP Mail SMTP that allows you to configure a whitelist of email addresses and/or domains that will always be sent emails regardless if WPMS_DO_NOT_SEND is enabled or not in non-production environments.
Author: Five Fifteen
Author URI: https://plugins.fivefifteen.com
Requires at least: 5.5
*/

add_filter('wp_mail', 'wp_mail_smtp_whitelist');
function wp_mail_smtp_whitelist($args) {
  if (wp_get_environment_type() !== 'production') {
    $domain_whitelist = WPMS_DOMAIN_WHITELIST;
    $email_whitelist = WPMS_EMAIL_WHITELIST;

    $to = is_array($args['to']) ? $args['to'] : explode(',', $args['to']);

    $to_filtered = array_filter($to, function($email) use($domain_whitelist, $email_whitelist) {
      list($handle, $domain) = explode('@', $email, 2);
      return in_array($domain, $domain_whitelist) || in_array($email, $email_whitelist);
    });

    if (!empty($to_filtered)) {
      $test_header = 'X-Mailer-Type:WPMailSMTP/Admin/Test';

      if (count($to) !== count($to_filtered)) {
        $args['to'] = $to_filtered;
      }

      if (!is_array($args['headers'])) {
        $args['headers'] = explode("\n", str_replace("\r\n", "\n", $args['headers']));
      }

      if (!in_array($test_header, $args['headers'])) {
        $args['headers'][] = $test_header;
      }
    }
  }

  return $args;
}
?>