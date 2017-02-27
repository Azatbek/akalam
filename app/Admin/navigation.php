<?php

use SleepingOwl\Admin\Navigation\Page;

// Default check access logic
// AdminNavigation::setAccessLogic(function(Page $page) {
// 	   return auth()->user()->isSuperAdmin();
// });
//
// AdminNavigation::addPage(\App\User::class)->setTitle('test')->setPages(function(Page $page) {
// 	  $page
//		  ->addPage()
//	  	  ->setTitle('Dashboard')
//		  ->setUrl(route('admin.dashboard'))
//		  ->setPriority(100);
//
//	  $page->addPage(\App\User::class);
// });
//
// // or
//
AdminSection::addMenuPage(\App\Models\Page::class)->setPriority(1);
AdminSection::addMenuPage(\App\Models\News::class)->setPriority(2);
AdminSection::addMenuPage(\App\Models\Lyrics::class)->setPriority(3);
AdminSection::addMenuPage(\App\Models\Category::class)->setPriority(4);
AdminSection::addMenuPage(\App\Models\AudioCategories::class)->setPriority(5);
AdminSection::addMenuPage(\App\Models\Audiobook::class)->setPriority(6);
AdminSection::addMenuPage(\App\Models\Partner::class)->setPriority(8);
AdminSection::addMenuPage(\App\Models\Gallery::class)->setPriority(9);
AdminSection::addMenuPage(\App\Models\Images::class)->setPriority(10);
AdminSection::addMenuPage(\App\Models\Advertisement::class)->setPriority(11);
return [
    [
        'title' => 'Административная панель',
        'icon'  => 'fa fa-dashboard',
        'url'   => route('admin.dashboard'),
    ]
  ];
    // Examples
    // [
    //    'title' => 'Content',
    //    'pages' => [
    //
    //        \App\User::class,
    //
    //        // or
    //
    //        (new Page(\App\User::class))
    //            ->setPriority(100)
    //            ->setIcon('fa fa-user')
    //            ->setUrl('users')
    //            ->setAccessLogic(function (Page $page) {
    //                return auth()->user()->isSuperAdmin();
    //            }),
    //
    //        // or
    //
    //        new Page([
    //            'title'    => 'News',
    //            'priority' => 200,
    //            'model'    => \App\News::class
    //        ]),
    //
    //        // or
    //        (new Page(/* ... */))->setPages(function (Page $page) {
    //            $page->addPage([
    //                'title'    => 'Blog',
    //                'priority' => 100,
    //                'model'    => \App\Blog::class
	//		      ));
    //
	//		      $page->addPage(\App\Blog::class);
    //	      }),
    //
    //        // or
    //
    //        [
    //            'title'       => 'News',
    //            'priority'    => 300,
    //            'accessLogic' => function ($page) {
    //                return $page->isActive();
    //		      },
    //            'pages'       => [
    //
    //                // ...
    //
    //            ]
    //        ]
    //    ]
    // ]
