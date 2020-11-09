<?php

namespace App\Admin\Controllers;

use App\Models\User;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class UserController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new User(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('nickname');
            $grid->column('weapp_avatar')->image();
//            $grid->column('weapp_openid');
//            $grid->column('defaultaddress_id');
            $grid->column('diamondnum');
            $grid->column('votenum');
//            $grid->column('box');
            //$grid->disableDeleteButton();
//            $grid->disableEditButton();
            $grid->disableQuickEditButton();
            //关闭新增按钮
            $grid->disableCreateButton();
            // 禁用过滤器按钮
//            $grid->disableFilterButton();
            $grid->disableViewButton();
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            $grid->filter(function (Grid\Filter $filter) {
//                $filter->equal('id');
                $filter->like('nickname', '名称');
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
        return Show::make($id, new User(), function (Show $show) {
            $show->field('id');
            $show->field('nickname');
            $show->field('weapp_avatar');
            $show->field('weapp_openid');
            $show->field('defaultaddress_id');
            $show->field('diamondnum');
            $show->field('votenum');
            $show->field('box');
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
        return Form::make(new User(), function (Form $form) {
            $form->display('id');
            $form->text('nickname');
            $form->image('weapp_avatar');
            $form->text('weapp_openid');
            $form->text('diamondnum');
            $form->text('votenum');
            $form->text('box');
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
