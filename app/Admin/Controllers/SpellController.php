<?php

namespace App\Admin\Controllers;

use App\Models\Spell;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class SpellController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Spell(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('user_id');
            $grid->column('name');
            $grid->column('star');
            $grid->column('money');
            $grid->column('end_time');
            $grid->column('tel');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();
        
            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
        
            });
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new Spell(), function (Show $show) {
            $show->field('id');
            $show->field('user_id');
            $show->field('name');
            $show->field('star');
            $show->field('money');
            $show->field('end_time');
            $show->field('tel');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Spell(), function (Form $form) {
            $form->display('id');
            $form->text('user_id');
            $form->text('name');
            $form->text('star');
            $form->text('money');
            $form->text('end_time');
            $form->text('tel');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
