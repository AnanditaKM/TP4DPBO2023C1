<?php

class Members extends DB
{
    function getMembers()
    {
        $query = "SELECT * FROM members";
        return $this->execute($query);
    }

    function add($data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];
        $id_supermarket = $data['id_supermarket'];

        $query = " INSERT INTO `members`(`name`, `email`, `phone`,`join_date`,`id_supermarket`) VALUES ('$name', '$email', '$phone','$join_date','$id_supermarket')";

        return $this->execute($query);
    }

    function delete($id)
    {

        $query = "delete FROM members WHERE id = '$id'";
        return $this->execute($query);
    }

    function edit($data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $id_supermarket = $data['id_supermarket'];
        $join_date = $data['join_date'];
        $id = $data['id_edit'];
        $query = "update members set name='$name', email='$email', phone='$phone', join_date='$join_date' ,id_supermarket='$id_supermarket' where id='$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}
