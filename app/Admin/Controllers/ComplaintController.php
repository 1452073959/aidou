<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Complaint;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class ComplaintController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Complaint(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('tel','电话');
            $grid->column('content','内容');

            //   $grid->disableDeleteButton();
//            $grid->disableEditButton();
            $grid->disableQuickEditButton();
            //关闭新增按钮
            $grid->disableCreateButton();
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
        return Show::make($id, new Complaint(), function (Show $show) {
            $show->field('id');
            $show->field('tel');
            $show->field('content');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Complaint(), function (Form $form) {
            $form->display('id');
            $form->text('tel','电话');
            $form->text('content','内容');
        });
    }
}
