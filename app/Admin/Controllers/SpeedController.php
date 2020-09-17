<?php

namespace App\Admin\Controllers;

use App\Models\Speed;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class SpeedController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Speed(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('grade');
            $grid->column('num');
            $grid->column('upgrade');
        
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
        return Show::make($id, new Speed(), function (Show $show) {
            $show->field('id');
            $show->field('grade');
            $show->field('num');
            $show->field('upgrade');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Speed(), function (Form $form) {
            $form->display('id');
            $form->text('grade');
            $form->text('num');
            $form->text('upgrade');
        });
    }
}
