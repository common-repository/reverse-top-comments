<?php
/*
Plugin Name: Reverse Top Comments
Plugin Script: simple-reversecomments.php
Description: Displays the top level comments in reverse order. Nested comments are displayed in non-reverse order.
Version: 0.1
License: GPL
Author: Sunny Themes
Author URI: http://sunnythemes.com

*/

/**
 * Reverse comments 
 *
 * @param $comments
 */

if (!function_exists('rtc_reverse_comments')) {
	function rtc_reverse_comments($comments) {
		//print_r($comments);
		$reversed = array ();
		$max = count($comments);
		//for ($i = $max-1; $i >= 0; ) {
			/* back up to top level comment */
		//	for ($j = $i; ($j >= 0) && ($comments[$j]->comment_parent != 0); $j--);

			/* copy from $j to $i to end of reversed list */
		//echo "<br>j $j i $i<br>";
		//	$reversed[] = $comments[$j];
		//	$k = $j;
		//	while ($k != $i) {
		//		$k++;
		//		$reversed[] = $comments[$k];
		//	}
		//	$i = $j-1;
		//}
		//print_r($reversed);

		for ($i = $max-1; $i >= 0; $i--) {
			/* Reverse the top level comments */
			if ($comments[$i]->comment_parent == 0) $reversed[] = $comments[$i];
		}
		for ($i = 0; $i < $max; $i++) {
			/* Forward the child comments */
			if ($comments[$i]->comment_parent != 0) $reversed[] = $comments[$i];
		}

		return ($reversed);
	}	
}

add_filter ('comments_array', 'rtc_reverse_comments');
?>