<?php
/**
 * 代码生成服务提供者
 * Create on 2022-04-24 17:41
 * Create by jyjob
 */

namespace jyjob\LumenCodeGenerator\Providers;


use Illuminate\Support\ServiceProvider;
use jyjob\LumenCodeGenerator\Console\MakeXBullAdmin;

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
     * Create by jyjob
     */
    protected function registerKeepCommand()
    {
        $this->app->singleton('jyjob.make.xbull.admin', function ($app) {
            return new MakeXBullAdmin($app['files']);
        });
        $this->commands(['jyjob.make.xbull.admin']);
    }

}
