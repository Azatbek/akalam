<?php
use App\Models\Gallery;
use SleepingOwl\Admin\Model\ModelConfiguration;
use SleepingOwl\Admin\Display\Column\Lists;
AdminSection::registerModel(Gallery::class, function (ModelConfiguration $model) {
    $model->setTitle('Галерея');
    $model->setIcon('fa fa-file-image-o');
    $model->onDisplay(function () {
        $display = AdminDisplay::datatables()->setColumns([
            AdminColumn::link('id')->setLabel('ID'),
            AdminColumn::text('name')->setLabel('Название'),
        ]);
        $display->paginate(15);
        return $display;
    });
    $model->onCreateAndEdit(function () {
        $form = AdminForm::panel()->addBody(
            AdminFormElement::text('name', 'Название'),
            AdminFormElement::text('name_kk', 'Название на казахском'),
            AdminFormElement::ckeditor('description', 'Описание'),
            AdminFormElement::ckeditor('description_kk', 'Описание на казахском'),
            AdminFormElement::checkbox('is_published', 'Публикация')
        );
        return $form;
    });
});
