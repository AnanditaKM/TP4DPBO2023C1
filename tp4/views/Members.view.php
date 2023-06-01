<?php
class MembersView
{
    public function render($data, $dataSupermarket)
    {
        $no = 1;
        $dataMembers = null;
        foreach ($data as $val) {
            list($id, $name, $email, $phone, $join_date, $id_supermarket) = $val;
            $nama_supermarket = '';
            $id_member = $id;
            foreach ($dataSupermarket as $supermarket) {
                list($id, $nama) = $supermarket;
                if ($id == $id_supermarket) {
                    $nama_supermarket = $nama;
                    break;
                }
            }
            $dataMembers .= "<tr>
                <td>" . $no++ . "</td>
                <td>" . $name . "</td>
                <td>" . $email . "</td>
                <td>" . $phone . "</td>
                <td>" . $join_date . "</td>
                <td>" . $nama_supermarket . "</td>
                <td>
                <a href='index.php?editForm=" . $id_member . "' class='btn btn-primary''>Edit</a>
                <a href='index.php?id_hapus=" . $id_member . "' class='btn btn-danger''>Hapus</a>
                </td>
                </tr>";
        }

        $tpl = new Template("templates/index.html");
        $tpl->replace("DATA_TABEL", $dataMembers);
        $tpl->write();
    }

    public function listSupermarket($dataSupermarket)
    {
        $listSupermarket = null;
        foreach ($dataSupermarket as $val) {
            list($id, $nama) = $val;
            $listSupermarket .= "<option value='" . $id . "'>" . $nama . "</option>";
        }

        $tpl = new Template("templates/addMembers.html");
        $tpl->replace("OPTION", $listSupermarket);
        $tpl->write();
    }

    public function editMember($idMember, $data, $dataSupermarket)
    {
        $dataMember = null;
        $supermarketMember = 0;
        foreach ($data as $val) {
            list($id, $name, $email, $phone, $join_date, $id_supermarket) = $val;
            if ($idMember == $id) {
                $dataMember .=
                    "<input type='hidden' name='id_edit' value='$id' class='form-control'> <br>

                <label> NAME: </label>
                <input type='text' name='name' value='$name' class='form-control'> <br>
                <label> EMAIL: </label>
                <input type='text' name='email' value='$email' class='form-control'> <br>
                <label> PHONE: </label>
                <input type='text' name='phone' value='$phone' class='form-control'> <br>
                 <label> JOIN DATE: </label>
                <input type='date' name='join_date' value='$join_date' class='form-control''> <br>
                <label> SUPERMARKET:</label>
            ";
                $supermarketMember = $id_supermarket;
                break;
            }
        }

        $listSupermarket = null;
        foreach ($dataSupermarket as $val) {
            list($id, $nama) = $val;
            if ($id == $supermarketMember) {
                $listSupermarket .= "<option selected value='" . $id . "'>" . $nama . "</option>";
            } else {
                $listSupermarket .= "<option value='" . $id . "'>" . $nama . "</option>";
            }
        }

        $tpl = new Template("templates/editMembers.php");
        $tpl->replace("FORM_MEMBER", $dataMember);
        $tpl->replace("SUPERMARKET_MEMBER", $listSupermarket);
        $tpl->write();
    }
}
