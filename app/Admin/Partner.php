<?php
use App\Models\Partner;
use SleepingOwl\Admin\Model\ModelConfiguration;
AdminSection::registerModel(Partner::class, function (ModelConfiguration $model) {
    $model->setTitle('Споносоры');
    $model->setIcon('fa fa-money');
    $model->onDisplay(function () {
        $display = AdminDisplay::datatables()->setColumns([
            AdminColumn::image('logo')->setLabel('Логотип'),
            AdminColumn::text('link')->setLabel('Ссылка')
        ]);
        $display->paginate(15);
        return $display;
    });
    $model->onCreateAndEdit(function () {
        $form = AdminForm::panel()->addBody(
            AdminFormElement::text('link', 'Ссылка'),
            AdminFormElement::image('logo', 'Логотип'),
            AdminFormElement::checkbox('is_published', 'Опубликовать')
        );
        return $form;
    });
});
