<?php

Breadcrumbs::register('admin.announcements.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.announcements.management'), route('admin.announcements.index'));
});

Breadcrumbs::register('admin.announcements.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.announcements.index');
    $breadcrumbs->push(trans('menus.backend.announcements.create'), route('admin.announcements.create'));
});

Breadcrumbs::register('admin.announcements.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.announcements.index');
    $breadcrumbs->push(trans('menus.backend.announcements.edit'), route('admin.announcements.edit', $id));
});
