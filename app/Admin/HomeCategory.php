<?php
use App\Models\Settings;
use App\Models\Category;
use SleepingOwl\Admin\Model\ModelConfiguration;
use SleepingOwl\Admin\Display\Column\Lists;
AdminSection::registerModel(Settings::class, function (ModelConfiguration $model) {
    $model->setTitle('Список настроек');
    $model->setIcon('fa fa-folder-o');
    $model->onDisplay(function () {
        $settings = new Settings;
        $display = AdminDisplay::table()->setColumns([
            AdminColumn::link('id')->setLabel('ID'),
            AdminColumn::text('parameter')->setLabel('Параметр'),
            AdminColumn::text('values', 'Значение')
        ]);
        $display->paginate(15);
        return $display;
    });
    $model->onCreateAndEdit(function () {
        $form = AdminForm::panel()->addBody(
            AdminFormElement::text('parameter', 'Параметр'),
            AdminFormElement::multiselect('values', 'Значение')->setModelForOptions(new App\Models\Category())->setDisplay('name')
        );
        return $form;
    });
});
