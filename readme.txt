=== Preload Fullpage Cache ===
Contributors: pothi
Donate link: https://paypal.me/pothi
Tags: preload, cache, fullpage cache, mobile, amp
Requires at least: 3.0
Tested up to: 4.7
Stable tag: 1.0.0
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html

Preloads any new or recently updated post into fullpage cache. Requires a fullpage caching layer or plugin, such as Varnish or WP Super Cache.

== Description ==

Preload Fullpage Cache plugin is created to address a unique scenario in high traffic sites where the visitors rush to the website upon publishing the new post, even before the cached version of the post is ready to serve the initial traffic spike.

= What this plugin does: =

* Whenever you publish a new post, this plugin fetches the post using WordPress HTTP API. If your site has a fullpage caching, then its cache would have the newly published post, so that the post is served instantly from the cache when a real visitor arrives.
* This plugin works when a post is updated too.
* This plugin fetches a maximum of three version of the post... desktop version, mobile version and AMP version.

= What this plugin doesn't do (yet): =

* This plugin doesn't work as a caching layer. Use Varnish or a plugin like WP Super Cache.
* Since, AMP doesn't work on pages (yet), this plugin doesn't preload AMP version for pages, either.

== Installation ==

This section describes how to install the plugin and get it working.

1. Upload the plugin files to the `/wp-content/plugins/preload-fullpage-cache` directory, or install the plugin through the WordPress plugins screen directly.
1. Activate the plugin through the 'Plugins' screen in WordPress
1. Sit back and relax!

== Frequently Asked Questions ==

= Where can I change the settings? =

This plugin doesn't come with any settings screen on purpose. Settings screen may be included in the future, depending on the feedback from the users.

= How do I test, if this plugin works? =

Usually, you can check if a post is served from the cache or not by looking at the headers info. So, create a new blog post or update an existing post and look for its headers info. For example, if your site is behind Varnish, you may see the 'Age' information that is greater than zero. Uncached posts (for example, a search query such as example.com/s=test) will have 'Age' as zero.

== Screenshots ==

No screenshots at the moment.

== Upgrade Notice ==
none

== Changelog ==

= 1.0.0 =
* First commit
