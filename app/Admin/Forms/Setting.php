<?php

namespace App\Admin\Forms;

use Dcat\Admin\Widgets\Form;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Settings;
class Setting extends Form
{
    /**
     * Handle the form request.
     *
     * @param array $input
     *
     * @return Response
     */
    public function handle(array $input)
    {

        $data=Settings::first();
        $data->img=$input['img'];
        $data->save();
        return $this->success('更新成功.', '/');
    }

    /**
     * Build a form here.
     */
    public function form()
    {

        $this->multipleImage('img','背景图')->saving(function ($paths) {
            // 可以转化为由 , 隔开的字符串格式
            // return implode(',', $paths);
            // 也可以转化为json
            return json_encode($paths);
        })->uniqueName()->required();

    }

    /**
     * The data of the form.
     *
     * @return array
     */
    public function default()
    {

        $data=Settings::first();
        return [
            'img' => $data['img'],
        ];
    }
}
