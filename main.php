
<?php
include './app/database/db.php';

error_reporting(E_ALL);
ini_set('display_errors', true);

class Tree
{

    public $numberFruckt;
    public $name;

    // Колличество плодов на дереве рандомное исходя из входных данных
    function __construct($name)
    {
        $this->name = $name;

        if ($this->name === 'apple') {
            $this->numberFruckt = rand(40, 50);
            $this->name = $name;
        } elseif ($this->name === 'pear') {
            $this->numberFruckt = rand(0, 20);
            $this->name = $name;
        }
    }
}


class Garden
{

    public $numberAppl = 0;
    public $numberTree = 0;

    // Входной массив с деревьями
    public $tree = [];
    public $arrTree = [];

    function __construct($tree)
    {
        $this->tree = $tree;
    }
    function start()
    {
        // Добавление деревьев в сад

        foreach ($this->tree as $name => $number) {

            for ($i = 0; $i < $number; $i++) {
                array_push($this->arrTree, new Tree($name));
            }
        }

        // Сбор урожая

        foreach ($this->arrTree as $keyTree) {

            if ($keyTree->name === 'apple') {
                $this->numberAppl += $keyTree->numberFruckt;
            } elseif ($keyTree->name === 'pear') {
                $this->numberTree += $keyTree->numberFruckt;
            }
        }

        // Колличество фруктов с каждым запуском скрипта будет разным так как задаётся параметр рандомно

        print_r("Колличество яблок: " . $this->numberAppl . "\n" . "Колличество груш: " . $this->numberTree . "\n" . "Колличество деревьев: " . count($this->arrTree) . "\n");
    }
}

// Исходный массив с деревьями

$tree = [
    'apple' => 10,
    'pear' => 15
];

$garden = new Garden($tree);
$garden->start();
