<?php
use App\Models\Advertisement;
use SleepingOwl\Admin\Model\ModelConfiguration;
AdminSection::registerModel(Advertisement::class, function (ModelConfiguration $model) {
    $model->setTitle('Реклама');
    $model->setIcon('fa fa-file-audio-o');
    $model->onDisplay(function () {
        $display = AdminDisplay::datatables()->setColumns([
            AdminColumn::text('name')->setLabel('Название'),
            AdminColumn::custom('type', function ($instance) {
                   return $instance->type == 1 ? 'Видео реклама' : 'Фото баннер';
               })->setLabel('Тип рекламы'),
            AdminColumn::custom('type', function ($instance) {
                   return $instance->is_published == 1 ? 'Активен' : 'Заблокирован';
               })->setLabel('Активность'),
            AdminColumn::text('created_at')->setLabel('Дата создания')
        ]);
        $display->paginate(15);
        return $display;
    });
    $model->onCreateAndEdit(function () {
        $form = AdminForm::panel()->addBody(
            AdminFormElement::select('lang', 'Показывать рекламу на какой версии сайта?', [1=>'На русской', 0=>'На казахской']),
            AdminFormElement::text('name', 'Название'),
            AdminFormElement::text('link', 'Ссылка на сайт рекламодателя'),
            AdminFormElement::image('src_pic', 'Загрузить рекламный баннер'),
            AdminFormElement::text('src', 'Вставить ссылку на видео (youtube)'),
            AdminFormElement::select('type', 'Тип рекламы', [1=>'Видео', 0=>'Фото баннер']),
            AdminFormElement::checkbox('is_published', 'Опубликовать')
        );
        return $form;
    });
});