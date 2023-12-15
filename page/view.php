<?php require_once '../connection.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view resep</title>
</head>

<body>
    <table border=1 cellpadding=10 cellspacing=0>
        <tr>
            <td>id pengguna</td>

            <td>id resep</td>
            <td>judul</td>
            <td>foto resep</td>
            <td>aksi</td>

        </tr>
        <?php
        $users = $db->query("select * from resep");

        $i = 1;

        foreach ($users as $user) {
            $gambar = "../images/" . $user["image"];
        ?>
            <tr>
                <td><?php echo $user['Id_pengguna'] ?></td>

                <td><?php echo $user['Id_resep'] ?></td>
                <td><?php echo $user["Judul"]; ?></td>
                <td><img src="../images/<?php echo $user["image"]; ?>" width="200"></td>
                <td>
                    <a href="edit.php?id_resep=<?php echo $user['Id_resep']; ?>&id_pengguna=<?php echo $user['Id_pengguna']; ?>">Edit</a>
                    </form>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>