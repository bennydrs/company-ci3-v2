<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee</title>
</head>

<body>

    <h2>DAFTAR PEGAWAI</h2>
    <table border="1" cellPadding="9" cellspacing="0">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">ID Employee</th>
                <th scope="col">Name</th>
                <th scope="col">Position</th>
                <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($employee as $e) : ?>
                <tr>
                    <th scope="row"><?= $i;  ?></th>
                    <td><?= $e['e_id_number'] ?></td>
                    <td><?= $e['name'] ?></td>
                    <td><?= $e['name_position'] ?></td>
                    <td><?= $e['email'] ?></td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>