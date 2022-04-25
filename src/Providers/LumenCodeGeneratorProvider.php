<?php
/**
 * 代码生成服务提供者
 * Create on 2022-04-24 17:41
 * Create by jiyongwang
 */

namespace jiyongwang\LumenCodeGenerator\Providers;


use Illuminate\Support\ServiceProvider;
use jiyongwang\LumenCodeGenerator\Console\MakeXBullAdmin;

class LumenCodeGeneratorProvider extends ServiceProvider
{
    public function boot()
    {
    }

    public function register()
    {
        # 注册脚本
        $this->registerKeepCommand();
    }

    /**
     * 注册命令
     * Create on 2022/4/24
     * Create by jiyongwang
     */
    protected function registerKeepCommand()
    {
        $this->app->singleton('jiyongwang.make.xbull.admin', function ($app) {
            return new MakeXBullAdmin($app['files']);
        });
        $this->commands(['jiyongwang.make.xbull.admin']);
    }

}
