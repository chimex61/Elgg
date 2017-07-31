<?php
/**
 * Outputs entity previous/next navigation elements
 *
 * @uses $vars['entity'] Entity used to determine previous/next urls
 */

$entity = elgg_extract('entity', $vars);
if (!($entity instanceof \ElggEntity)) {
	return;
}

echo elgg_format_element('div', [
	'class' => 'elgg-listing-full-navigation',
], elgg_view_menu('entity_navigation', $vars));
