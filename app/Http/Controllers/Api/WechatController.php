<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use EasyWeChat\Factory;
use function EasyWeChat\Kernel\Support\generate_sign;
use Cache;
use App\Models\User;
use Storage;
use App\Models\Swipe;
use Overtrue\EasySms\EasySms;
use Illuminate\Support\Str;
use App\Http\Requests\Api\VerificationCodeRequest;
class WechatController extends Controller
{
    //登陆

    public function wechat(Request $request)
    {
        $data = $request->all();

        $app = \EasyWeChat::miniProgram();
        $wq = $app->auth->session($data['code']); // $code 为wx.login里的code
//        dd($wq);
        if (isset($wq['errcode'])) {
            return $this->failed('code已过期或不正确');
        }
        $weappOpenid = $wq['openid'];
        $weixinSessionKey = encrypt( $wq['session_key']);
        $user = User::where('weapp_openid', $weappOpenid)->first();
        //没有，就注册一个用户
        if (!$user) {
            $user = new User();
            $user->weapp_openid = $weappOpenid;
            $user->token = $weixinSessionKey;
            $user->nickname = $data['userInfo']['nickName'];
            $user->weapp_avatar = $data['userInfo']['avatarUrl'];
            $user->pid = request('pid','0');
            $user->save();

        }else{
            $user->weapp_openid=$weappOpenid;
            $user->token=$weixinSessionKey;
            $user->nickname=$data['userInfo']['nickName'];
            $user->weapp_avatar=$data['userInfo']['avatarUrl'];
            $user->save();
        }

//        $token= auth('api')->login($user);
        $token =auth('api')->tokenById($user['id']);
        return $this->respondWithToken($token);
//        return $this->success(['openid'=>$weappOpenid,'token'=>$user['token']]);
    }

    //刷新token
    public function tokenupdate()
    {
        $token = auth('api')->refresh();
        return $this->respondWithToken($token);
    }
    //获取用户信息
    public function user(Request $request)
    {
        dd($this->user);
        $user = auth('api')->user();
        return $this->success($user);
    }

    public function cache()
    {

        $value = Cache::get('key');
        $value1 = Cache::get('key1');
        dump($value);
        dump($value1);
    }

    public function ma()
    {
        $app = \EasyWeChat::miniProgram();
        $user = auth('api')->user();
        $str=$user['id'];
        $response =  $app->app_code->getUnlimit($str);
        // 保存小程序码到文件
        if ($response instanceof \EasyWeChat\Kernel\Http\StreamResponse) {
            $filename = $response->save(public_path('uploads'));
            return Storage::disk('admin')->url($filename);
        }
//        return Storage::disk('admin')->url($filename);

// 或
//        if ($response instanceof \EasyWeChat\Kernel\Http\StreamResponse) {
//            $filename = $response->saveAs('/public/uploads/img', 'appcode.png');
//        }
        return $response;
    }

    public function image()
    {
        $data=Swipe::all();
//        $data2=[];
//        foreach ($data as $k=>$v)
//        {
//            $data2=json_decode($v['img'],true);
//        }
//
//        foreach ($data2 as $k=>$v)
//        {
//            $data3[]=config('app.url') . 'uploads/' .$v;
//        }

        return $this->success($data);
    }

//发送验证码
    public function store(VerificationCodeRequest $request, EasySms $easySms)
    {
        $phone = $request->phone;

        // 生成4位随机数，左侧补0
        $code = str_pad(random_int(1, 9999), 4, 0, STR_PAD_LEFT);

        try {
            $result = $easySms->send($phone, [
                'template' => 'SMS_192385332',
                'data' => [
                    'code' => $code
                ],
            ]);
        } catch (\Overtrue\EasySms\Exceptions\NoGatewayAvailableException $exception) {
            $message = $exception->getException('aliyun')->getMessage();
            abort(500, $message ?: '短信发送异常');
        }

        $key = 'verificationCode_'.Str::random(15);
        $expiredAt = now()->addMinutes(5);
        // 缓存验证码 5 分钟过期。
        \Cache::put($key, ['phone' => $phone, 'code' => $code], $expiredAt);

        return response()->json([
            'key' => $key,
            'expired_at' => $expiredAt->toDateTimeString(),
        ])->setStatusCode(201);
    }




}
