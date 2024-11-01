<?php
/*
Plugin Name: WebStartAvenue EndNotes
Plugin URI: http://wordpress.org/extend/plugins/webstartavenue-endnotes/
Description: Creates a shortcode [end] for creating numbered and linked endnotes for your blog.
Version: 1.0
Author: WebStartAvenue
Author URI: http://webstartavenue.com

Copyright 2012 WebStartAvenue (email: contact@webstartavenue.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 3, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/

remove_filter( 'the_content', 'do_shortcode', 11 );
add_filter( 'the_content', 'do_shortcode', 8 );

add_shortcode('end', 'wsa_shortcode_handler_end');
add_shortcode('note', 'wsa_shortcode_handler_end');
add_shortcode('endnote', 'wsa_shortcode_handler_end');
function wsa_shortcode_handler_end( $atts, $content = null, $code = '' ) {
	global $post;
	$note = ( empty( $content ) ) ? implode( ' ', array_values( $atts ) ) : $content;
	if ( !empty( $note ) ) {
		$n_endnotes = wsa_endnotes( false, $note );
		$url = ( is_single() ) ? '' : get_permalink( $post->ID );
		return sprintf( '<a href="%s#wsa-endnote-%d" name="wsa-inline-%d"><sup>%d</sup></a>', $url, $n_endnotes, $n_endnotes, $n_endnotes );
	} else {
		return '';
	}
}

function wsa_endnotes($return_notes, $note = '') {
	static $endnotes = array();
	if ( $return_notes ) {
		return $endnotes;
	} else {
		$endnotes[] = $note;
		return count( $endnotes );
	}
}

add_filter( 'the_content', 'wsa_the_content_filter', 9 );
function wsa_the_content_filter( $content ) {
	if ( is_single() ) {
		$notes = wsa_endnotes( true );
		if ( !empty($notes) ) {
			$content .= '<div class="wsa-footnotes"><ol>';
			foreach($notes as $i => $note) {
				$num = $i + 1;
				$content .= sprintf( '<li><a name="wsa-endnote-%d"></a>%s &nbsp;<a href="#wsa-inline-%d" class="wsa-up">&#9650;</a></li>',
					$num, $note, $num
				);
			}
			$content .= '</ol></div>';
		}
	}
	return $content;
}

add_action( 'wp_enqueue_scripts', 'wsa_add_endnote_stylesheet' );
function wsa_add_endnote_stylesheet() {
	wp_register_style( 'wsa-endnotes', plugins_url( 'wsa-endnotes.css', __FILE__ ) );
	wp_enqueue_style( 'wsa-endnotes');
}
