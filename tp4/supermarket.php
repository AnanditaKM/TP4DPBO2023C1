<?php

include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Supermarket.controller.php");

$supermarket = new SupermarketController();

if (isset($_POST['add'])) {
    //memanggil add
    $supermarket->add($_POST);
}
//mengecek apakah ada id_hapus, jika ada maka memanggil fungsi delete
else if (!empty($_GET['id_hapus'])) {
    //memanggil add
    $id = $_GET['id_hapus'];
    $supermarket->delete($id);
} else if (isset($_POST['edit'])) {
    $supermarket->edit($_POST);
} else {
    $supermarket->index();
}
