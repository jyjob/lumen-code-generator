<?php
/**
 * admin-代码生成命令
 * Create on 2022-04-24 17:41
 * Create by Abc
 */

namespace jyjob\LumenCodeGenerator\Console;


use Illuminate\Console\GeneratorCommand;
use Illuminate\Filesystem\Filesystem;
use jyjob\LumenCodeGenerator\Objects\InputParamObject;
use jyjob\LumenCodeGenerator\Objects\Admin\MakeFileObject;
use jyjob\LumenCodeGenerator\Vo\Admin\PathVo;

class MakeXBullAdmin extends GeneratorCommand
{
    /**
     * 控制台命令 signature 的名称。
     * @var string
     */
    protected $signature = 'make:xbull_admin {name?} {--namespace=} {--table=} {--name_text=} {--fillable=} {--author=}';

    /**
     * 控制台命令说明。
     * @var string
     */
    protected $description = 'xbull-admin代码生成器';

    /** @var InputParamObject */
    protected $params;

    /** @var MakeFileObject */
    protected $makeFile;

    /**
     * MakeXBullAdmin constructor.
     * @param Filesystem $files
     */
    public function __construct(Filesystem $files)
    {
        $this->params = new InputParamObject();
        $this->makeFile = new MakeFileObject($this->params, $files);
        parent::__construct($files);
    }

    /**
     * 命令入口
     * Create on 2022/4/24
     * Create by jyjob
     * @return bool|void|null
     */
    public function handle()
    {
        $this->laravel->call([$this, 'fire'], func_get_args());
    }

    /**
     * 执行方法
     * Create on 2022/4/24
     * Create by jyjob
     */
    public function fire()
    {
        $this->params->setName(ucfirst($this->argument('name')));
        while (empty($this->params->getName())) {
            $this->params->setName(ucfirst($this->ask('请输入Name，例如：Help，必填')));
        }

        $this->params->setNamespace(ucfirst($this->option('namespace')));
        while (empty($this->params->getNamespace())) {
            $this->params->setNamespace(ucfirst($this->ask('请输入命名空间相对路径，分文件夹例如：Help，必填')));
        }

        $this->params->setNameText($this->option('name_text'));
        while (empty($this->params->getNameText())) {
            $this->params->setNameText($this->ask('请输入对应的功能名称用于备注，例如：帮助中心，必填'));
        }

        $this->params->setAuthor($this->option('author'));
        while (empty($this->params->getAuthor())) {
            $this->params->setAuthor($this->ask('请输入作者，例如：abc，必填'));
        }

        $this->params->setFillAble($this->option('fillable'));
        if (empty($this->params->getFillAble())) {
            $this->params->setFillAble($this->ask('请输入需要生成的代码层级：1.controller 2.request_vo 3.transform 4.service 5.repository 6.model' . PHP_EOL
                . '数字以逗号隔开,输入n代表都需要，可选，默认为n'));
        }

        if ($this->params->getFillAble() == 'n' || $this->params->getFillAble() == '1') {
            $this->params->setTable($this->option('table'));
            while (empty($this->params->getTable())) {
                $this->params->setTable($this->ask('请输入对应的数据库表表名，例如：xb_help，需要表前缀，必填'));
            }
        }

        if ($this->params->getFillAble() == 'n' || empty($this->params->getFillAble())) {
            $this->params->setFillAble('1,2,3,4,5,6');
        }

        $fillArr = explode(',', $this->params->getFillAble());

        in_array("1", $fillArr) && $this->makeController();

        in_array("2", $fillArr) && $this->makeRequestVo();

        in_array("3", $fillArr) && $this->makeTransform();

        in_array("4", $fillArr) && $this->makeService();

        in_array("5", $fillArr) && $this->makeRepository();

        in_array("6", $fillArr) && $this->makeModel();
    }

    /**
     * 生成表模型
     * Create on 2022/4/24
     * Create by jyjob
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function makeModel()
    {
        $this->makeFile->setMakeFileType(PathVo::MAKE_MODEL)->makeFile();
    }

    /**
     * 生成数据访问层
     * Create on 2022/4/24
     * Create by jyjob
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function makeRepository()
    {
        $this->makeFile->setMakeFileType(PathVo::MAKE_REPOSITORY)->makeFile();
    }

    /**
     * 生成服务层
     * Create on 2022/4/24
     * Create by jyjob
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function makeService()
    {
        $this->makeFile->setMakeFileType(PathVo::MAKE_SERVICE)->makeFile();
    }

    /**
     * 生成控制器
     * Create on 2022/4/24
     * Create by jyjob
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function makeController()
    {
        $this->makeFile->setMakeFileType(PathVo::MAKE_CONTROLLER)->makeFile();
    }

    /**
     * 生成表单验证
     * Create on 2022/4/24
     * Create by jyjob
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function makeRequestVo()
    {
        $this->makeFile->setMakeFileType(PathVo::MAKE_REQUEST_BO_ADD)->makeFile();
        $this->makeFile->setMakeFileType(PathVo::MAKE_REQUEST_BO_GET)->makeFile();
        $this->makeFile->setMakeFileType(PathVo::MAKE_REQUEST_BO_GET_PAGE_LIST)->makeFile();
        $this->makeFile->setMakeFileType(PathVo::MAKE_REQUEST_BO_DEL)->makeFile();
    }

    /**
     * 生成数据传输层
     * Create on 2022/4/24
     * Create by jyjob
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function makeTransform()
    {
        $this->makeFile->setMakeFileType(PathVo::MAKE_TRANSFORM_GET)->makeFile();
        $this->makeFile->setMakeFileType(PathVo::MAKE_TRANSFORM_GET_PAGE_LIST)->makeFile();
    }

    /**
     * 重写
     * Create on 2022/4/24
     * Create by jyjob
     * @return string
     */
    protected function getStub()
    {
        return '';
    }
}
