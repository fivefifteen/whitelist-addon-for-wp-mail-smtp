=== Whitelist Add-on for WP Mail SMTP ===
Contributors: fivefifteenplugins
Tags: addon, domain, email, mail, smtp, whitelist
Requires at least: 5.5
Tested up to: 6.7
Stable tag: 0.0.1
Requires PHP: 7.4
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

An add-on for WP Mail SMTP that allows you to configure a whitelist of email addresses and/or domains that will always be sent emails regardless if WPMS_DO_NOT_SEND is enabled or not in non-production environments.

== Description ==

This is a small and simple add-on for [WP Mail SMTP](https://wordpress.org/plugins/wp-mail-smtp) that allows you to configure a whitelist of email addresses and/or domains that will always be sent emails regardless if WPMS_DO_NOT_SEND is enabled or not in non-production environments. This is extremely useful for testing in staging or development so that you can be sure your emails will work and look the way you expect them to before pushing to production.

== Installation ==

1. Be sure to have the [WP Mail SMTP](https://wordpress.org/plugins/wp-mail-smtp) plugin installed and activated.
2. Install the Whitelist Add-on either via the WordPress.org plugin repository or by uploading the files to your server. (See instructions on [how to install a WordPress plugin](http://www.wpbeginner.com/beginners-guide/step-by-step-guide-to-install-a-wordpress-plugin-for-beginners/))
3. Activate the Whitelist Add-on.
4. Somewhere in your code (such as `wp-config.php` or your theme's `functions.php`) you'll want to define the `WPMS_DOMAIN_WHITELIST` and/or `WPMS_EMAIL_WHITELIST` constants like this:

```php
define('WPMS_DOMAIN_WHITELIST', array(
  'fivefifteen.com'
));

define('WPMS_EMAIL_WHITELIST', array(
  'hello@fivefifteen.com'
));
```

and that's it!

*Note: This plugin could also easily be installed as a "mu-plugin" by copying `whitelist-addon-for-wp-mail-smtp.php` into your `wp-content/mu-plugins` directory.*