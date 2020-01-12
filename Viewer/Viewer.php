<?php


class Viewer
{
    protected $startIterator;

    public function __construct()
    {
        $this->startIterator = new DirectoryIterator('C:');
        $this->run();
    }

    public function run()
    {
        if (!isset($_GET['prevPath'])) {
            $this->startIterator;
            $this->showCatalog($this->startIterator);
        } else {
            $curName = $_GET['curName'];
            $prevPath = $_GET['prevPath'];
            $this->getBackBtn($prevPath);
            $this->getDirectory($curName, $prevPath);
        }
    }

    public function showCatalog($iterator)
    {
        foreach ($iterator as $fileinfo) {
            if ($fileinfo->isFile()) {
                echo $fileinfo->getFilename() . "<br>";
            } else {
                $dirPath = $fileinfo->getPath();
                $curName = $fileinfo->getFilename();
                if ($fileinfo->getExtension() == 'sys') {
                    echo $fileinfo->getFilename() . "<br>";
                } else {
                    echo "<a href='?prevPath={$dirPath}&curName={$curName}'>" . $curName . "</a><br>";
                }
            }
        }
    }

    //Функция перехода внутрь
    public function getDirectory($curName, $prevPath)
    {
        $newPath = $prevPath . '/' . $curName;
        $curIterator = new DirectoryIterator($newPath);
        $this->showCatalog($curIterator);
    }

//Функция кнопки возврата
    public function getBackBtn($prevPath)
    {
        $backPath = explode('/', $prevPath);
        if (count($backPath) == 1) {
            $rootPath = $_SERVER['SCRIPT_NAME'];
            echo "<a href='{$rootPath}'>BACK</a><br>";
        } else {
            $backPath1 = $backPath;
            array_pop($backPath1);
            $backPrev = implode('/', $backPath1);
            $backCur = $backPath[count($backPath) - 1];
            echo "<a href='?prevPath={$backPrev}&curName={$backCur}'>BACK</a><br>";
        }

    }
}