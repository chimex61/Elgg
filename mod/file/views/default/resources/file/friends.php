<?php
/**
 * Friends Files
 *
 * @package ElggFile
 */

$owner = elgg_get_page_owner_entity();
if (!$owner) {
	forward('', '404');
}

elgg_push_breadcrumb(elgg_echo('file'), "file/all");
elgg_push_breadcrumb($owner->getDisplayName(), "file/owner/$owner->username");

elgg_register_title_button('file', 'add', 'object', 'file');

$title = elgg_echo("file:friends");

$content = elgg_list_entities([
	'type' => 'object',
	'subtype' => 'file',
	'full_view' => false,
	'relationship' => 'friend',
	'relationship_guid' => $owner->guid,
	'relationship_join_on' => 'owner_guid',
	'no_results' => elgg_echo("file:none"),
	'preload_owners' => true,
	'preload_containers' => true,
]);

$body = elgg_view_layout('content', [
	'filter_context' => 'friends',
	'content' => $content,
	'title' => $title,
]);

echo elgg_view_page($title, $body);
