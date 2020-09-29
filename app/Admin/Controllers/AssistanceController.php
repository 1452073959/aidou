<?php

namespace App\Admin\Controllers;

use App\Models\Assistance;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class AssistanceController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Assistance(), function (Grid $grid) {
            $grid->column('id')->sortable();
//            $grid->column('user_id');

            $grid->model()->with(['user']);
            $grid->column('user.nickname', '用户');

            $grid->column('name');
            $grid->column('star');
            $grid->model()->with(['project']);
            $grid->column('project.text', '项目');
//            $grid->model()->with(['project.name']);
            $grid->column('xid');
            $grid->column('endtime');
//            $grid->column('img');
            $grid->column('stocksnum');
            $grid->column('tel');
            $grid->status->using([ 1 => '不通过',2=>'通过'])->filter(
                Grid\Column\Filter\In::make([
                    1 => '不通过',
                    2 => '通过',

                ])
            );;
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
        return Show::make($id, new Assistance(), function (Show $show) {
            $show->field('id');
            $show->field('user_id');
            $show->field('name');
            $show->field('star');
            $show->field('xid');
            $show->field('endtime');
            $show->field('img');
            $show->field('stocksnum');
            $show->field('tel');
            $show->field('status');
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
        return Form::make(new Assistance(['user']), function (Form $form) {
            $form->display('id');
//            $form->text('user_id');
            $form->text('name');
            $form->text('star');
//            $form->text('xid');
            $form->select('xid','项目')->options(config('app.url').'/api/cate')->required();
            $form->text('endtime');
            $form->image('img')->required();
            $form->text('stocksnum');
            $form->text('tel');
//            $form->text('status');
            $form->radio('status')->options(['1' => '不通过', '2'=> '通过'])->help('不通过状态不显示')->required();
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
