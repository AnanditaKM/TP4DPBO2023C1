<?php
include_once("conf.php");
include_once("models/Supermarket.class.php");
include_once("views/Supermarket.view.php");

class SupermarketController
{
    private $supermarket;

    function __construct()
    {
        $this->supermarket = new Supermarket(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    public function index()
    {
        $this->supermarket->open();
        $this->supermarket->getSupermarket();
        $data = array();
        while ($row = $this->supermarket->getResult()) {
            array_push($data, $row);
        }

        $this->supermarket->close();

        $view = new SupermarketView();
        $view->render($data);
    }


    function add($data)
    {
        $this->supermarket->open();
        $this->supermarket->add($data);
        $this->supermarket->close();

        header("location:supermarket.php");
    }

    function edit($id)
    {
        $this->supermarket->open();
        $this->supermarket->edit($id);
        $this->supermarket->close();

        header("location:supermarket.php");
    }

    function delete($id)
    {
        $this->supermarket->open();
        $this->supermarket->delete($id);
        $this->supermarket->close();

        header("location:supermarket.php");
    }
}
