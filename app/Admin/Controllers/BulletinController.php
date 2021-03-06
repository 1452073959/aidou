<?php

namespace App\Admin\Controllers;

use App\Models\Bulletin;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class BulletinController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Bulletin(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('text');
            $grid->column('url');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();
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
        return Show::make($id, new Bulletin(), function (Show $show) {
            $show->field('id');
            $show->field('text');
            $show->field('url');
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
        return Form::make(new Bulletin(), function (Form $form) {
            $form->display('id');
            $form->text('text');
            $form->text('url');
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
