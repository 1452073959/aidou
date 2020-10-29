<?php

namespace App\Admin\Controllers;

use App\Models\Celebrity;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class CelebrityController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Celebrity(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('name');
            $grid->column('avatar')->image();
            $grid->column('backimage')->image();
            $grid->column('wenzi','文字');
            $grid->column('influencenum','数量');
            $grid->column('qrcode','小程序码')->image();;
            $grid->column('created_at');
//            $grid->column('updated_at')->sortable();
//            $grid->disableDeleteButton();
//            $grid->disableEditButton();
            $grid->disableQuickEditButton();
            //关闭新增按钮
//            $grid->disableCreateButton();
            // 禁用过滤器按钮
            $grid->disableFilterButton();
            $grid->disableViewButton();
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
        return Show::make($id, new Celebrity(), function (Show $show) {
            $show->field('id');
            $show->field('name');
            $show->field('avatar');
            $show->field('backimage');
            $show->field('influencenum');
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
        return Form::make(new Celebrity(), function (Form $form) {
            $form->display('id');
            $form->text('name')->required();;
            $form->image('avatar')->disableRemove()->uniqueName()->required();
            $form->image('backimage')->disableRemove()->uniqueName()->required();
            $form->text('wenzi','文字')->required();
            $form->number('influencenum');

            $form->disableResetButton();
            $form->disableViewCheck();
            $form->disableEditingCheck();
            $form->disableCreatingCheck();
            // 去除整个工具栏内容
            $form->disableHeader();
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
