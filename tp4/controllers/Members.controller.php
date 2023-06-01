<?php
include_once("conf.php");
include_once("models/Members.class.php");
include_once("models/Supermarket.class.php");
include_once("views/Members.view.php");

class MembersController
{
    private $members;
    private $supermarket;

    function __construct()
    {
        $this->members = new Members(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
        $this->supermarket = new Supermarket(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    public function index()
    {
        $this->members->open();
        $this->supermarket->open();
        $this->members->getMembers();
        $this->supermarket->getSupermarket();
        $data = array();
        while ($row = $this->members->getResult()) {
            array_push($data, $row);
        }

        $dataSupermarket = array();
        while ($row = $this->supermarket->getResult()) {
            array_push($dataSupermarket, $row);
        }

        $this->members->close();
        $this->supermarket->close();

        $view = new MembersView();
        $view->render($data, $dataSupermarket);
    }

    public function addForm()
    {
        $this->supermarket->open();
        $this->supermarket->getSupermarket();

        $dataSupermarket = array();
        while ($row = $this->supermarket->getResult()) {
            array_push($dataSupermarket, $row);
        }

        $this->supermarket->close();

        $view = new MembersView();
        $view->listSupermarket($dataSupermarket);
    }

    public function editForm($id)
    {
        $this->members->open();
        $this->supermarket->open();
        $this->members->getMembers();
        $this->supermarket->getSupermarket();
        $data = array();
        while ($row = $this->members->getResult()) {
            array_push($data, $row);
        }

        $dataSupermarket = array();
        while ($row = $this->supermarket->getResult()) {
            array_push($dataSupermarket, $row);
        }

        $this->members->close();
        $this->supermarket->close();

        $view = new MembersView();
        $view->editMember($id, $data, $dataSupermarket);
    }

    function add($data)
    {
        $this->members->open();
        $this->members->add($data);
        $this->members->close();

        header("location:index.php");
    }

    function edit($id)
    {
        $this->members->open();
        $this->members->edit($id);
        $this->members->close();

        header("location:index.php");
    }

    function delete($id)
    {
        $this->members->open();
        $this->members->delete($id);
        $this->members->close();

        header("location:index.php");
    }
}
