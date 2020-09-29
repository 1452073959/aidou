<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Swoole extends Command
{
    protected $signature = 'swoole:demo';
    protected $description = '这是关于swoole的一个测试demo';
    private static $server = null;


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
     * @return int
     */
    public function handle()
    {
        $server = self::getWebSocketServer();
        $server->on('open',[$this,'onOpen']);
        $server->on('message', [$this, 'onMessage']);
        $server->on('close', [$this, 'onClose']);
        $server->on('request', [$this, 'onRequest']);
        $this->line("swoole服务启动成功 ...");
        $server->start();
    }

    // 获取服务
    public static function getWebSocketServer()
    {
        if (!(self::$server instanceof \swoole_websocket_server)) {
            self::setWebSocketServer();
        }
        return self::$server;
    }
    // 服务处始设置
    protected static function setWebSocketServer():void
    {
        self::$server = new \swoole_websocket_server("0.0.0.0", 9600);
        self::$server->set([
            'worker_num' => 1,
            'heartbeat_check_interval' => 60, // 60秒检测一次
            'heartbeat_idle_time' => 121, // 121秒没活动的
        ]);
    }

    // 打开swoole websocket服务回调代码
    public function onOpen($server, $request)
    {
        if ($this->checkAccess($server, $request)) {
            self::$server->push($request->fd,"打开swoole服务成功！");
        }
    }
    // 给swoole websocket 发送消息回调代码
    public function onMessage($server, $frame)
    {
        $server->push($frame->fd, '第几个用户给我发送'.$frame->fd);
    }

    // websocket 关闭回调代码
    public function onClose($serv,$fd)
    {
        $this->line("客户端 {$fd} 关闭");
    }
    // 校验客户端连接的合法性,无效的连接不允许连接
    public function checkAccess($server, $request):bool
    {
        $bRes = true;
        if (!isset($request->get) || !isset($request->get['token'])) {
            self::$server->close($request->fd);
            $this->line("接口验证字段不全");
            $bRes = false;
        } else if ($request->get['token'] !== "123456") {
            $this->line("接口验证错误");
            $bRes = false;
        }
        return $bRes;
    }
    // 启动websocket服务
    public function start()
    {
        self::$server->start();
    }
}

