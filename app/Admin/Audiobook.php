<?php
use App\Models\Audiobook;
use App\Models\AudioCategories;
use SleepingOwl\Admin\Model\ModelConfiguration;
AdminSection::registerModel(Audiobook::class, function (ModelConfiguration $model) {
    $model->setTitle('Аудиокниги');
    $model->setIcon('fa fa-file-audio-o ');
    $model->onDisplay(function () {
        $display = AdminDisplay::datatables()->setColumns([
            AdminColumn::text('title')->setLabel('Название'),
            AdminColumn::text('readers')->setLabel('Читатели'),
            AdminColumn::text('hits')->setLabel('Просмотры')

        ]);
        $display->paginate(15);
        return $display;
    });
    $model->onCreateAndEdit(function () {
        $categories = AudioCategories::all();
        $categories = $categories->pluck('name', 'id')->toArray();
        $form = AdminForm::panel()->addBody(
            AdminFormElement::select('lang', 'На каком языке работа?', [1=>'На русском', 0=>'На казахском']),
            AdminFormElement::text('title', 'Название'),
            AdminFormElement::text('readers', 'Читатели'),
            AdminFormElement::file('file', 'Аудио'),
            AdminFormElement::select('category_id', 'Категория', $categories),
            AdminFormElement::checkbox('is_published', 'Опубликовать')
        );
        return $form;
    });
});