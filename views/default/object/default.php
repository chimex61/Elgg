<?php
/**
 * ElggObject default view.
 *
 * @warning This view may be used for other ElggEntity objects
 *
 * @package Elgg
 * @subpackage Core
 */

$icon = elgg_view_entity_icon($vars['entity'], 'small');

$title = $vars['entity']->title;
if (!$title) {
	$title = $vars['entity']->name;
}
if (!$title) {
	$title = get_class($vars['entity']);
}

if ($vars['entity'] instanceof ElggObject) {
	$metadata = elgg_view('navigation/menu/metadata', $vars);
}

$owner_link = '';
$owner = $vars['entity']->getOwnerEntity();
if ($owner) {
	$owner_link = elgg_view('output/url', [
		'href' => $owner->getURL(),
		'text' => $owner->name,
		'is_trusted' => true,
	]);
}

$date = elgg_view_friendly_time($vars['entity']->getTimeCreated());

$subtitle = "$owner_link $date";

$params = [
	'entity' => $vars['entity'],
	'title' => $title,
	'metadata' => $metadata,
	'subtitle' => $subtitle,
];
$params = $params + $vars;
$body = elgg_view('object/elements/summary', $params);

echo elgg_view_image_block($icon, $body, $vars);
