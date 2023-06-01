<?php

class Supermarket extends DB
{
    function getSupermarket()
    {
        $query = "SELECT * FROM supermarket";
        return $this->execute($query);
    }

    function add($data)
    {
        $nama = $data['nama_supermarket'];
        $alamat = $data['alamat_supermarket'];

        $query = " INSERT INTO supermarket (`nama_supermarket`, `alamat_supermarket`) VALUES ('$nama', '$alamat')";
        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "DELETE FROM supermarket WHERE id_supermarket = '$id'";
        return $this->execute($query);
    }

    function edit($data)
    {
        $nama = $data["nama_supermarket"];
        $alamat = $data["alamat_supermarket"];
        $id = $data["id_edit"];

        $query = "UPDATE supermarket SET nama_supermarket='$nama', alamat_supermarket='$alamat' WHERE id_supermarket='$id'";
        return $this->execute($query);
    }
}
