=== WebStartAvenue Endnotes ===
Contributors: webstartavenue
Donate link: http://webstartavenue.com/wordpress-plugins/donate
Tags: references, footnotes, endnotes, bibliography, refering, referring, associations, notes, hints, attributing
Requires at least: 3.0
Tested up to: 3.3.1
Stable tag: trunk

Add endnotes to your posts or pages using shortcodes.

== Description ==

Use Endnotes to cite sources or provide in-depth explanations in your posts or pages.
All the functionality is provided by an easy to use shortcode. To insert an endnote,
use any of the following formats:

	[endnote This is an example endnote!]
	
	[end This is another alias for endnotes!]
	
	[note Last one!]
	
For each of the above shortcodes you can also use the open/close syntax which looks like:

	[note]Don't forget to close your endnote shortcodes.[/note]

Each of the above shortcodes does the same thing:

1) Replaces the text by a number, in the order they appear in the document, starting
at 1.

2) Places a note at the bottom, in an ordered list corresponding to the number placed
in the content's text.

3) Links the endnote and text reference using anchor tags for easy clicking between 
references and back to the text.

All styles can be customized by adding appropriate CSS styles to your theme.

== Installation ==

1. Copy the wsa-endnotes directory into wp-content/plugins
1. Activate the plugin through the 'Plugins' menu in WordPress

== Screenshots ==

1. Example of an endnote on a basic blog post.

== Changelog ==

= 1.2 =
* Endnotes should now appear before other plugin output such as similar posts

= 1.1 =
* Only show endnotes on single pages (hide in the blogroll)
* In the blogroll, link citations directly to on page endnote
* Added open/close syntax for shortcode

= 1.0 =
* Initial release with basic features
