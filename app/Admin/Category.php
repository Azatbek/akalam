<?php
use App\Models\Category;
use SleepingOwl\Admin\Model\ModelConfiguration;
use SleepingOwl\Admin\Display\Column\Lists;
AdminSection::registerModel(Category::class, function (ModelConfiguration $model) {
    $model->setTitle('Категории');
    $model->setIcon('fa-folder-o');
    $model->onDisplay(function () {
        $parent = new Category;
        $display = AdminDisplay::table()->with('parent')->setColumns([
            AdminColumn::link('id')->setLabel('ID'),
            AdminColumn::text('name')->setLabel('Название'),
            AdminColumn::relatedLink('parent.name', 'Относится к:')
        ]);
        $display->paginate(15);
        return $display;
    });
    $model->onCreateAndEdit(function () {
        $categories = Category::where('parent_id', NULL)->get();
        $categories = $categories->pluck('name', 'id')->toArray();
        $form = AdminForm::panel()->addBody(
            AdminFormElement::text('name', 'Название'),
            AdminFormElement::text('name_kk', 'Название на казахском'),
            AdminFormElement::select('parent_id', 'Относится к категории:', $categories)
        );
        return $form;
    });
});
