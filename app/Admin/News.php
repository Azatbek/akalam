<?php
use App\Models\News;
use SleepingOwl\Admin\Model\ModelConfiguration;
AdminSection::registerModel(News::class, function (ModelConfiguration $model) {
    $model->setTitle('Новости');
    $model->setIcon('fa fa-newspaper-o');
    $model->onDisplay(function () {
        $display = AdminDisplay::datatables()->setColumns([
            AdminColumn::text('title')->setLabel('Заголовок'),
            AdminColumn::text('anons')->setLabel('Анонс'),
            AdminColumn::image('poster')->setLabel('Изображение'),
        ]);
        $display->paginate(15);
        return $display;
    });
    $model->onCreateAndEdit(function () {
        $form = AdminForm::panel()->addBody(
            AdminFormElement::text('title', 'Заголовок'),
            AdminFormElement::text('title_kk', 'Заголовок на казахском'),
            AdminFormElement::ckeditor('anons', 'Анонс'),
            AdminFormElement::ckeditor('anons_kk', 'Анонс на казахском'),
            AdminFormElement::ckeditor('description', 'Описание'),
            AdminFormElement::ckeditor('description_kk', 'Описание на казахском'),
            AdminFormElement::image('poster', 'Рисунок/Сурет'),
            AdminFormElement::checkbox('press', 'На слайдере')
        );
        return $form;
    });
});
