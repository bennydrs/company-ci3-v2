<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Aloha!</title>

	<style type="text/css">
		* {
			font-family: Verdana, Arial, sans-serif;
		}

		table {
			font-size: x-small;
			padding: 8px;
		}

		tr td {
			font-weight: bold;
			font-size: 11px;
		}

		.gray {
			background-color: lightgray
		}

		.tabel,
		th,
		td {
			padding: 8px;
		}

		.garis {
			border-top: 1px solid black;
			border-bottom: 1px solid black;
		}
	</style>

</head>

<body>

	<table width="100%">
		<tr>
			<!-- <td valign="top"><img src="" alt="" width="150" /></td> -->
			<td align="left">
				<h3>PT. Lorem ipsum dolor</h3>
				<!-- <pre>
                Company representative name
                Company address
                Tax ID
                phone
                fax
            </pre> -->
				<h2 align="center">SLIP GAJI</h2>
			</td>

		</tr>

	</table>

	<table width="100%">
		<tr>
			<td><strong>Periode : </strong> <?= $salary['month'] ?></td>
			<td><strong>Dicetak Tgl : </strong> <?= date('d F Y') ?></td>
		</tr>

	</table>
	<hr>

	<table>
		<tr>
			<td><strong>NIP </td>
			<td>: <?= $salary['e_id_number'] ?></td>
			<td style="padding-left: 200px;"><strong>Jabatan </strong></td>
			<td>: <?= $salary['name_position'] ?></td>
		</tr>
		<tr>
			<td><strong>Nama </strong></td>
			<td>: <?= $salary['name'] ?></td>
		</tr>

	</table>

	<table width="100%" class="tabel">
		<thead style="background-color: lightgray;">
			<tr>
				<th width="30px">#</th>
				<th>Keterangan</th>
				<th>Pendapatan</th>
			</tr>
		</thead>
		<tbody>
			<?php

			if ($salary['status'] == "Married") {
				$tj_husbend = "150000";
			} else {
				$tj_husbend = "0";
			}

			$total_absen = $salary['present'] + $salary['permission'] + $salary['alpha'];
			$total_lembur = $salary['overtime'] * $salary['lembur'];

			$pendapatan = $salary['salary'] + $salary['tj_married'] + $total_lembur;
			$uang_makan = $salary['meal'] * $salary['present'];

			$salarylpha_cut = $salary['alpha'] * $salary['alpha_cuts'];
			// $permission_cut = $salary['permission'] * $salary['permission_cuts'];
			// $total_cuts = $salarylpha_cut;
			$total = $pendapatan + $uang_makan - $salarylpha_cut
			// $salaryb = $salary['present'] + $salary['permission'] + $salary['alpha'];
			?>
			<tr>
				<th scope="row">1</th>
				<td>Gaji Pokok</td>
				<td align="right"><?= rupiah($salary['salary']) ?></td>
			</tr>
			<tr>
				<th scope="row">2</th>
				<td>Tunjangan</td>
				<td align="right"><?= rupiah($salary['tj_married']) ?></td>
			</tr>
			<tr>
				<th scope="row">3</th>
				<td>Lembur</td>
				<td align="right"><?= rupiah($total_lembur) ?></td>
			</tr>
			<tr>
				<th scope="row">4</th>
				<td>Uang Makan</td>
				<td align="right"><?= rupiah($uang_makan) ?></td>
			</tr>
			<tr>
				<th scope="row">5</th>
				<td>Potongan</td>
				<td align="right"><?= rupiah($salarylpha_cut) ?></td>
			</tr>
		</tbody>

	</table>

	<table width="100%" class="table">
		<tr>
			<td align="right" class="garis">Total Gaji : <span style="padding-left: 50%;"> <?= rupiah($total) ?></span></td>
		</tr>

	</table>




</html>