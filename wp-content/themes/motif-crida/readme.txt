=== Motif ===
Contributors: automattic
Tags: gray, red, white, light, two-columns, right-sidebar, custom-colors, responsive-layout, custom-background, custom-menu, featured-images, full-width-template, microformats, rtl-language-support, sticky-post, translation-ready

Requires at least: 3.8
Tested up to: 4.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Source for the photo on the screenshot: https://unsplash.com/

== Frequently Asked Questions ==

= How to setup the front page like the demo site? =

The demo site URL: https://motifdemo.wordpress.com/?demo

1. Create or edit a page, and assign it to the Front Page template from the Page Attributes module.
2. Go to Settings > Reading and set "Front page displays" to "A static page".
3. Select the page you just assigned the Front Page template to as "Front page" and then choose another page as "Posts page" to serve your blog posts.
4. Make sure you add a featured image to your front page. This image will be shown in the large hero area below the top menu.

The front page also can display widgets and two testimonials. The page has two dedicated widget areas, First Front Page Sidebar and Second Front Page Sidebar. You can add as many as widgets you want!

Below the widget areas, two randomly chosen testimonials (see below) will be displayed. All you need to do is add at least two testimonials, and you're all set.

= How to use the grid page template? =

Another useful page template is the grid template. It's great for a portfolio page, a case study page, or a page to introduce your team members.

1. Create or edit a page, and assign it to the Grid Page template from the Page Attributes module. This placeholder page will be used to display a small blurb and thumbnail image for each of the child pages (aka sub-pages) you'll create next.
2. Create additional pages that you want to show on the grid page you've just created above. In the Page Attributes box on each child page, select the grid page you created above as the parent page.
3. For the best result, make sure you add a featured images to each child page, so it'll be displayed above the blurb on the main grid page.

= I don't see the Testimonials menu in my admin, where can I find it? =

To make the Testimonials menu appear in your admin, you need to install the [Jetpack plugin](http://jetpack.me) because it has the required code needed to make [custom post types](http://codex.wordpress.org/Post_Types#Custom_Post_Types) work for the Motif theme.

Once Jetpack is active, the Testimonials menu will appear in your admin, in addition to standard blog posts. No special Jetpack module is needed and a WordPress.com connection is not required for the Testimonials feature to function. Testimonials will work on a localhost installation of WordPress if you add this line to `wp-config.php`:

`define( 'JETPACK_DEV_DEBUG', TRUE );`

On your site, two randomly chosen testimonials appear on the front page template so that every testimonial has an equal chance to be there. All testimonials are displayed in a testimonial archive page.

= Where is the page that lists all testimonials? =

Let's say you have a WordPress site at: http://mygroovydomain.com

The URL of the testimonial archive page will be: http://mygroovydomain.com/testimonial/

You'll need pretty permalinks (any structure) for this URL to work though. If you're stuck with default permalinks - your links have a query string at the end, like ?p=123 - then your testimonial archive can be accessed by adding this immediately after your URL:

`/?post_type=jetpack-testimonial`

= How to customize the testimonial archive page? =

Once you have published a testimonial, under the Testimonials menu in your admin, you will see a link that takes you to the Customizer where you can edit the page title, add an intro text and a featured image. Just make sure you have pretty permalinks (any structure) for this to work.

== Quick Specs (all measurements in pixels) ==

	1.	On single posts and the default page template the main column maximum width is 705.
	2.	On the full width and grid page templates the main column maximum width is 1072.
	3.	The featured image on the homepage works best with images at least 1140 wide.

== Changelog ==

= 1.0.4 - November 12 2014 =
* Initial release.