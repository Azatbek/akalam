<?php
use App\Models\Lyrics;
use App\Models\Category;
use SleepingOwl\Admin\Model\ModelConfiguration;
AdminSection::registerModel(Lyrics::class, function (ModelConfiguration $model) {
    $model->setTitle('Работы авторов');
    $model->setIcon('fa fa-file');
    $model->onDisplay(function () {
        $display = AdminDisplay::table()->setColumns([
            AdminColumn::text('title')->setLabel('Название'),
            AdminColumn::text('lang')->setLabel('Язык'),
            AdminColumn::text('category')->setLabel('Категория'),
            AdminColumn::text('author')->setLabel('Автор'),
            AdminColumn::text('is_published')->setLabel('Статус активности')
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
