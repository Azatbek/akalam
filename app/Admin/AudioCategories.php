<?php
use App\Models\AudioCategories;
use SleepingOwl\Admin\Model\ModelConfiguration;
use SleepingOwl\Admin\Display\Column\Lists;
AdminSection::registerModel(AudioCategories::class, function (ModelConfiguration $model) {
    $model->setTitle('Аудио Категории');
    $model->setIcon('fa fa-folder-o');
    $model->onDisplay(function () {
        $parent = new AudioCategories;
        $display = AdminDisplay::datatables()->with('parent')->setColumns([
            AdminColumn::link('id')->setLabel('ID'),
            AdminColumn::text('name')->setLabel('Название'),
            AdminColumn::relatedLink('parent.name', 'Относится к:')
        ]);
        $display->paginate(15);
        return $display;
    });
    $model->onCreateAndEdit(function () {
        $categories = AudioCategories::where('parent_id', NULL)->get();
        $categories = $categories->pluck('name', 'id')->toArray();
        $form = AdminForm::panel()->addBody(
            AdminFormElement::text('name', 'Название'),
            AdminFormElement::text('name_kk', 'Название на казахском'),
            AdminFormElement::select('parent_id', 'Относится к категории:', $categories)
        );
        return $form;
    });
});