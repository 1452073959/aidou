<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Swoole extends Command
{
    public $ws;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'swoole {action?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'swoole';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $action = $this->argument('action');
        switch ($action) {
            case 'restart':
                $this->info('swoole server restarted');
                break;
            case 'close':
                $this->info('swoole server stoped');
                break;
            default:
                $this->start();
                break;
        }
    }

    public function start()
    {
        //创建websocket服务器对象，监听0.0.0.0:9501端口
        $this->ws = new \swoole_websocket_server("0.0.0.0", 9501);

        //开启ssl模式
//        $this->ws = new \swoole_websocket_server("0.0.0.0", 9501,SWOOLE_PROCESS, SWOOLE_SOCK_TCP | SWOOLE_SSL);

        //配置ssl模式
//        $this->ws->set([
//            'ssl_key_file' => '/var/www/html/ssl/4033464_cxh520.top.key',
//            'ssl_cert_file' => '/var/www/html/ssl/4033464_cxh520.top.pem'
//        ]);

        //监听WebSocket连接打开事件
        $this->ws->on('open',[$this,'open']);

        //监听WebSocket消息事件
        $this->ws->on('message',[$this,'message']);

        //监听WebSocket主动推送消息事件
        $this->ws->on('request',[$this,'request']);

        //监听WebSocket连接关闭事件
        $this->ws->on('close',[$this,'close']);

        $this->ws->start();
    
    }

    /**
     * 建立连接
     * @param $ws
     * @param $request
     */
    public function open($ws, $request){
        var_dump($request->fd . "连接成功");
    }

    /**
     * 接收消息
     * @param $ws
     * @param $frame
     */
    public function message($ws,$frame){
        var_dump('发送成功');
        $this->info("client is SendMessage4545\n" . $frame);
             foreach ($ws->connections as $fd) {
                     $ws->push($fd, $frame->data);
             }
    }

    /**
     * 接收请求
     * @param $request
     * @param $response
     */
    public function request($request,$response){

    }

    /**
     * 关闭连接
     * @param $ws
     * @param $fd
     */
    public function close($ws,$fd){

    }
}

