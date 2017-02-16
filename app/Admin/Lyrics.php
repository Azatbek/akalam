<?php
use App\Models\Lyrics;
use App\Models\Category;
use SleepingOwl\Admin\Model\ModelConfiguration;
AdminSection::registerModel(Lyrics::class, function (ModelConfiguration $model) {
    $model->setTitle('Работы авторов');
    $model->setIcon('fa fa-file');
    $model->onDisplay(function () {
        $display = AdminDisplay::table()->with('category')->setColumns([
            AdminColumn::text('title')->setLabel('Название'),
            AdminColumn::custom('lang', function ($instance) {
                   return $instance->lang ? 'На русском' : 'На казахском';
                })->setLabel('Язык публикации'),
            AdminColumn::text('category.name')->setLabel('Категория'),
            AdminColumn::text('author')->setLabel('Автор'),
            AdminColumn::custom('is_published', function ($instance) {
                   return $instance->is_published ? 'Опубликовано' : 'Не опубликовано';
                })->setLabel('Статус активности')
        ]);
        $display->paginate(15);
        return $display;
    });
    $model->onCreateAndEdit(function () {
        $categories = Category::all();
        $categories = $categories->pluck('name', 'id')->toArray();
        $form = AdminForm::panel()->addBody(
            AdminFormElement::select('lang', 'На каком языке работа?', [1=>'На русском', 0=>'На казахском']),
            AdminFormElement::text('title', 'Заголовок')->required(),
            AdminFormElement::ckeditor('content', 'Контент')->required(),
            AdminFormElement::select('category_id', 'Категория', $categories),
            AdminFormElement::select('is_published', 'Опубликовать?', [1=>'Да', 0=>'Опубликовать позже']),
            AdminFormElement::text('author', 'Автор:')
        );
        return $form;
    });
});
