<?php
/**
 * 生成文件对象
 * Create on 2022/4/24
 * Create by jyjob
 */

namespace jyjob\LumenCodeGenerator\Objects\Admin;


use Illuminate\Filesystem\Filesystem;
use jyjob\LumenCodeGenerator\Objects\InputParamObject;
use jyjob\LumenCodeGenerator\Vo\Admin\PathVo;

class MakeFileObject
{
    protected $inputParams;
    protected $files;
    protected $makeFilesName;
    protected $makeFilesPath;
    protected $makeFileType;
    protected $spaceName;
    protected $fileName;

    /**
     * MakeFileObject constructor.
     * @param InputParamObject $inputParams
     * @param Filesystem $files
     */
    public function __construct(InputParamObject $inputParams, Filesystem $files)
    {
        $this->inputParams = $inputParams;
        $this->files = $files;
    }


    /**
     * @return mixed
     */
    public function getInputParams()
    {
        return $this->inputParams;
    }

    /**
     * @param mixed $inputParams
     */
    public function setInputParams($inputParams)
    {
        $this->inputParams = $inputParams;
    }

    /**
     * @return mixed
     */
    public function getMakeFilesName()
    {
        switch ($this->getMakeFileType()) {
            case PathVo::MAKE_SERVICE:
                $this->setMakeFilesName(PathVo::MAKE_SERVICE);
                break;
            case PathVo::MAKE_MODEL:
                $this->setMakeFilesName(PathVo::MAKE_MODEL);
                break;
            case PathVo::MAKE_CONTROLLER:
                $this->setMakeFilesName(PathVo::MAKE_CONTROLLER);
                break;
            case PathVo::MAKE_REPOSITORY:
                $this->setMakeFilesName(PathVo::MAKE_REPOSITORY);
                break;
            case PathVo::MAKE_REQUEST_BO_ADD:
                $this->setMakeFilesName(PathVo::MAKE_REQUEST_BO_ADD);
                break;
            case PathVo::MAKE_REQUEST_BO_GET:
                $this->setMakeFilesName(PathVo::MAKE_REQUEST_BO_GET);
                break;
            case PathVo::MAKE_REQUEST_BO_GET_PAGE_LIST:
                $this->setMakeFilesName(PathVo::MAKE_REQUEST_BO_GET_PAGE_LIST);
                break;
            case PathVo::MAKE_REQUEST_BO_DEL:
                $this->setMakeFilesName(PathVo::MAKE_REQUEST_BO_DEL);
                break;
            case PathVo::MAKE_TRANSFORM_GET:
                $this->setMakeFilesName(PathVo::MAKE_TRANSFORM_GET);
                break;
            case PathVo::MAKE_TRANSFORM_GET_PAGE_LIST:
                $this->setMakeFilesName(PathVo::MAKE_TRANSFORM_GET_PAGE_LIST);
                break;
        }
        return $this->makeFilesName;
    }

    /**
     * @param mixed $makeFilesName
     * @return MakeFileObject
     */
    public function setMakeFilesName($makeFilesName)
    {
        $this->makeFilesName = $makeFilesName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMakeFilesPath()
    {
        switch ($this->getMakeFileType()) {
            case PathVo::MAKE_SERVICE:
                $this->setMakeFilesPath(PathVo::ServicesPath());
                break;
            case PathVo::MAKE_MODEL:
                $this->setMakeFilesPath(PathVo::ModelsPath());
                break;
            case PathVo::MAKE_CONTROLLER:
                $this->setMakeFilesPath(PathVo::ControllersPath());
                break;
            case PathVo::MAKE_REPOSITORY:
                $this->setMakeFilesPath(PathVo::RepositoriesPath());
                break;
            case PathVo::MAKE_REQUEST_BO_ADD:
            case PathVo::MAKE_REQUEST_BO_GET:
            case PathVo::MAKE_REQUEST_BO_GET_PAGE_LIST:
            case PathVo::MAKE_REQUEST_BO_DEL:
                $this->setMakeFilesPath(PathVo::RequestBoPath());
                break;
            case PathVo::MAKE_TRANSFORM_GET:
            case PathVo::MAKE_TRANSFORM_GET_PAGE_LIST:
                $this->setMakeFilesPath(PathVo::TransformPath());
                break;
        }
        return $this->makeFilesPath;
    }

    /**
     * @param mixed $makeFilesPath
     */
    public function setMakeFilesPath($makeFilesPath)
    {
        $this->makeFilesPath = $makeFilesPath;
    }

    /**
     * @return mixed
     */
    public function getFiles()
    {
        return $this->files;
    }

    /**
     * @param mixed $files
     */
    public function setFiles($files)
    {
        $this->files = $files;
    }

    /**
     * @return mixed
     */
    public function getMakeFileType()
    {
        return $this->makeFileType;
    }

    /**
     * @param mixed $makeFileType
     * @return MakeFileObject
     */
    public function setMakeFileType($makeFileType)
    {
        $this->makeFileType = $makeFileType;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSpaceName()
    {
        switch ($this->getMakeFileType()) {
            case PathVo::MAKE_SERVICE:
                $this->setSpaceName('App\Services');
                break;
            case PathVo::MAKE_MODEL:
                $this->setSpaceName('App\Models');
                break;
            case PathVo::MAKE_CONTROLLER:
                $this->setSpaceName('App\Http\Controllers');
                break;
            case PathVo::MAKE_REPOSITORY:
                $this->setSpaceName('App\Repositories');
                break;
            case PathVo::MAKE_REQUEST_BO_ADD:
            case PathVo::MAKE_REQUEST_BO_GET:
            case PathVo::MAKE_REQUEST_BO_GET_PAGE_LIST:
            case PathVo::MAKE_REQUEST_BO_DEL:
                $this->setSpaceName('App\Http\RequestBo');
                break;
            case PathVo::MAKE_TRANSFORM_GET:
            case PathVo::MAKE_TRANSFORM_GET_PAGE_LIST:
                $this->setSpaceName('App\Transform');
                break;
        }
        $this->setSpaceName($this->spaceName . '\\' . $this->getFileName());
        return $this->spaceName;
    }

    /**
     * @param mixed $spaceName
     */
    public function setSpaceName($spaceName)
    {
        $this->spaceName = $spaceName;
    }

    /**
     * @return mixed
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @param mixed $fileName
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;
    }

    /**
     * 生成文件
     * Create on 2022/4/24
     * Create by jyjob
     * @return bool
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function makeFile()
    {
        $name_arr = explode('/', $this->inputParams->getNamespace());
        $name_count = count($name_arr);

        $path = $this->getMakeFilesPath();
        if ($name_count > 0) {
            for ($i = 0; $i < $name_count; $i++) {
                $path .= DIRECTORY_SEPARATOR . ucfirst($name_arr[$i]);
            }
        }
        $this->setFileName(ucfirst($this->inputParams->getName()));

        if (!$this->files->isDirectory($path)) {
            $this->files->makeDirectory($path, 0755, true);
        }

        $stub = $this->files->get($this->getStub());
        $templateData = [
            'name' => $this->inputParams->getName(),
            'desc' => $this->inputParams->getNameText(),
            'author' => $this->inputParams->getAuthor(),
            'tb_name' => $this->inputParams->getTable(),
            'end_name' => ucfirst($this->getFileName()),
            'date' => date('Y-m-d'),
            'time' => date('H:i'),
            'space' => $this->getSpaceName(),
        ];

        $renderStub = $this->getRenderStub($templateData, $stub);
        $path .= DIRECTORY_SEPARATOR . $this->getFileName() . $this->getMakeFileType() . '.php';
        // 仅测试用
        if ($this->files->exists($path)) {
            $this->files->delete($path);
        }
        if (!$this->files->exists($path)) {
            $this->files->put($path, $renderStub);
            $filename = substr(strrchr($path, "/"), 1);
            echo 'create : ' . $path . '  success' . PHP_EOL;
            return true;
        } else {
            $filename = substr(strrchr($path, "/"), 1);
            echo 'The file : ' . $path . '  already exists' . PHP_EOL;
            return false;
        }
    }

    /**
     * 替换模板变量
     * Create on 2022/4/24
     * Create by jyjob
     * @param $templateData
     * @param $stub
     * @return string|string[]
     */
    protected function getRenderStub($templateData, $stub)
    {
        foreach ($templateData as $search => $replace) {
            $stub = str_replace('$' . $search, $replace, $stub);
        }

        return $stub;
    }

    /**
     * 获取模板文件
     * Create on 2022/4/24
     * Create by jyjob
     * @return string
     */
    protected function getStub()
    {
        $stubPath = dirname(dirname(__DIR__)) . "/stubs/admin/{$this->getMakeFilesName()}.stub";
        return $stubPath;
    }


}
