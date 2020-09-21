<?php

namespace App\Admin\Controllers;

use App\Models\Task;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class TaskController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Task(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('title');
            $grid->column('award');
            $grid->column('num');
            $grid->column('type');
        
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
        return Show::make($id, new Task(), function (Show $show) {
            $show->field('id');
            $show->field('title');
            $show->field('award');
            $show->field('num');
            $show->field('type');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Task(), function (Form $form) {
            $form->display('id');
            $form->text('title')->required();
            $form->text('award')->required();
            $form->text('num')->required();
            $form->radio('type')->options([
                '1' => '新手任务', '2'=> '日常',
            ])->required();
            $form->radio('what','行为')->options([

                '1' => '看视频', '2'=> '打榜',3=>'群集结',
                4=>'应援助力' ,5=>'开箱子',6=>'跳小程序 ',7=>'分享好友'


            ])->required();
            $form->number('linit','行为次数')->default(1)->required();
        });
    }
}
