<?php
/**
 * 命令收入对象
 * Create on 2022/4/24
 * Create by jiyongwang
 */

namespace jiyongwang\LumenCodeGenerator\Objects;

class InputParamObject
{
    private $author;
    private $name;
    private $name_text;
    private $namespace;
    private $table;
    private $fill_able;

    /**
     * InputParamObject constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return InputParamObject
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNameText()
    {
        return $this->name_text;
    }

    /**
     * @param mixed $name_text
     * @return InputParamObject
     */
    public function setNameText($name_text)
    {
        $this->name_text = $name_text;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNamespace()
    {
        return $this->namespace;
    }

    /**
     * @param mixed $namespace
     * @return InputParamObject
     */
    public function setNamespace($namespace)
    {
        $this->namespace = $namespace;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * @param mixed $table
     * @return InputParamObject
     */
    public function setTable($table)
    {
        $this->table = $table;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFillAble()
    {
        return $this->fill_able;
    }

    /**
     * @param mixed $fill_able
     * @return InputParamObject
     */
    public function setFillAble($fill_able)
    {
        $this->fill_able = $fill_able;
        return $this;
    }


}
