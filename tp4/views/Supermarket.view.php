<?php
class SupermarketView
{
    public function render($data)
    {
        $no = 1;
        $dataSupermarket = null;
        foreach ($data as $val) {
            list($id_supermarket, $nama_supermarket, $alamat_supermarket) = $val;
            $dataSupermarket .= "<tr>
                <td>" . $no++ . "</td>
                <td>" . $nama_supermarket . "</td>
                <td>" . $alamat_supermarket . "</td>
                <td>
                <a href='./templates/editSupermarket.php?id_supermarket=" . $id_supermarket . "&nama_supermarket=" . $nama_supermarket . "&alamat_supermarket=" . $alamat_supermarket . "' class='btn btn-primary''>Edit</a>
                <a href='supermarket.php?id_hapus=" . $id_supermarket . "' class='btn btn-danger''>Hapus</a>
                </td>
                </tr>";
        }
        $tpl = new Template("templates/supermarket.html");
        $tpl->replace("DATA_TABEL", $dataSupermarket);
        $tpl->write();
    }
}
