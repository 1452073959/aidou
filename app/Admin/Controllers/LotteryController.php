<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Lottery;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class LotteryController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Lottery(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('title');
            $grid->column('type');
            $grid->column('sum');
        
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
        return Show::make($id, new Lottery(), function (Show $show) {
            $show->field('id');
            $show->field('title');
            $show->field('type');
            $show->field('sum');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Lottery(), function (Form $form) {
            $form->display('id');
            $form->text('title')->required();
            $form->radio('type')->options([
                '1' => '钻石', '2'=> '票',
            ])->required();
            $form->text('sum')->required();
        });
    }
}
