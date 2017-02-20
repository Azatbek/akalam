<?php
use App\Models\Page;
use SleepingOwl\Admin\Model\ModelConfiguration;
AdminSection::registerModel(Page::class, function (ModelConfiguration $model) {
    $model->setTitle('Страницы');
    $model->setIcon('fa fa-file');
    $model->onDisplay(function () {
        $display = AdminDisplay::datatables()->setColumns([
            AdminColumn::link('id')->setLabel('ID'),
            AdminColumn::text('title')->setLabel('Заголовок'),
            AdminColumn::text('slug')->setLabel('ЧПУ'),
            AdminColumn::text('display_on_menu')->setLabel('Показать в меню?')
        ]);
        $display->paginate(15);
        return $display;
    });
    $model->onCreateAndEdit(function () {
        $form = AdminForm::panel()->addBody(
            AdminFormElement::text('title', 'Заголовок')->required(),
            AdminFormElement::text('title_kk', 'Заголовок на казахском'),
            AdminFormElement::text('slug', 'ЧПУ')->required(),
            AdminFormElement::ckeditor('content', 'Контент')->required(),
            AdminFormElement::ckeditor('content_kk', 'Контент на казахском'),
            AdminFormElement::select('display_on_menu', 'Показать на главной?', [1=>'Да, показать в меню', 0=>'Нет, не показывать'])->required()
        );
        return $form;
    });
});
