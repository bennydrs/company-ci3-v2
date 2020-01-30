<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    table,
    th,
    td {
        border: 1px solid black;
        padding: 10px;
    }

    h3 {
        text-align: center;
    }
</style>

<h3>Data Pegawai</h3>

<table>
    <tr>
        <th>No.</th>
        <th>NIP</th>
        <th>Nama</th>
        <th>Jabatan</th>
        <th>Jenis Kelamin</th>
        <th>Alamat</th>
    </tr>
    <?php $no = 1; ?>
    <?php foreach ($pegawai as $p) : ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $p['e_id_number'] ?></td>
            <td><?= $p['name'] ?></td>
            <td><?= $p['name_position'] ?></td>
            <td><?= $p['sex'] ?></td>
            <td><?= $p['address'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>