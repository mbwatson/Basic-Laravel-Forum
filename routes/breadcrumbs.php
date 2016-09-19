<?php

// Forum
Breadcrumbs::register('posts.index', function($breadcrumbs) {
    $breadcrumbs->push('Forum', route('posts.index'));
});
// Forum / Create Post
Breadcrumbs::register('posts.create', function($breadcrumbs) {
	$breadcrumbs->parent('posts.index');
	$breadcrumbs->push('Create Post', route('posts.create'));
});
// Forum / Everything
Breadcrumbs::register('posts.all', function($breadcrumbs) {
	$breadcrumbs->parent('posts.index');
	$breadcrumbs->push('Everything', route('posts.index'));
});
// Forum / Channel
Breadcrumbs::register('posts.channel', function($breadcrumbs, $channel) {
	$breadcrumbs->parent('posts.index');
	$breadcrumbs->push($channel->title, route('posts.channel', $channel));
});
// Forum / Some Post
Breadcrumbs::register('posts.show', function($breadcrumbs, $post) {
	$breadcrumbs->parent('posts.channel', $post->channel);
	$breadcrumbs->push($post->title, route('posts.show', $post));
});
// Forum / Some Post / Edit
Breadcrumbs::register('posts.edit', function($breadcrumbs, $post) {
	$breadcrumbs->parent('posts.show', $post);
	$breadcrumbs->push('Edit', route('posts.edit', $post));
});

// Users
Breadcrumbs::register('users.index', function($breadcrumbs) {
	$breadcrumbs->push('Users');
});
// Users / A User
Breadcrumbs::register('users.show', function($breadcrumbs, $user) {
	$breadcrumbs->parent('users.index');
	$breadcrumbs->push($user->name, $user);
});

// Account / Edit
Breadcrumbs::register('account.edit', function($breadcrumbs) {
	$breadcrumbs->push('Account / Edit');
});

