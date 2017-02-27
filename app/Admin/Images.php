<?php
use App\Models\Images;
use App\Models\Gallery;
use SleepingOwl\Admin\Model\ModelConfiguration;
AdminSection::registerModel(Images::class, function (ModelConfiguration $model) {
    $model->setTitle('Изображеия галереи');
    $model->setIcon('fa fa-picture-o  ');
    $model->onDisplay(function () {
        $gallery = new Gallery;
        $display = AdminDisplay::datatables()->with('gallery')->setColumns([
            AdminColumn::image('image')->setLabel('Изображение'),
            AdminColumn::text('description')->setLabel('Описание'),
            AdminColumn::text('description_kk')->setLabel('Описание на казахском'),
            AdminColumn::relatedLink('gallery.name', 'Относится к:')
        ]);
        $display->paginate(15);
        return $display;
    });
    $model->onCreateAndEdit(function () {
        $gal = Gallery::all();
        $gal = $gal->pluck('name', 'id')->toArray();
        $form = AdminForm::panel()->addBody(
            AdminFormElement::image('image', 'Рисунок/Сурет'),
            AdminFormElement::select('gallery_id', 'Галлерея', $gal),
            AdminFormElement::ckeditor('description', 'Описание'),
            AdminFormElement::ckeditor('description_kk', 'Описание на казахском')
        );
        return $form;
    });
});
