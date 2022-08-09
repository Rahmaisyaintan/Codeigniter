<?php
 include "koneksi.php"
?>
<HTML>
<HEAD>
<TITLE>Laporan Penjualan</TITLE>
</HEAD>
<BODY>
<?php
 $query = "SELECT * FROM tbl_transaksi";
 $sql = mysqli_query ($conn,$query);
 echo "<h3>Laporan Penjualan</h3>";
 echo "<table border='1' cellpadding='0'
cellspacing='0'>";
 echo "<tr bgcolor='yellow'><td width=10%>Id Transaksi</td><td
width=40%>Id Pelanggan</td>
<td>No Order</td><td>Tgl Order</td><td>Nama Penerima</td><td>No Hp</td><td>Provinsi</td><td>Kota</td><td>Alamat</td><td>Kode Pos</td><td>Expedisi</td><td>Paket</td>
<td>Estimasi</td><td>ongkir</td><td>berat</td><td>grand_total</td><td>total_bayar</td><td>status_bayar</td><td>bukti_bayar</td>
<td>atas_nama</td><td>nama_bank</td><td>no_rek</td><td>status_order</td><td>no_resi</td>";
 
 while ($hasil = mysqli_fetch_array ($sql)) {
 $kode = $hasil['id_transaksi'];
 $kode = $hasil['id_pelanggan'];
 $no_order = $hasil['no_order'];
 $tgl_order = $hasil['tgl_order'];
 $nama = stripslashes ($hasil['nama_penerima']);
 $phone = stripslashes ($hasil['hp_penerima']);
 $provinsi = $hasil['provinsi'];
 $kota = $hasil['kota'];
 $alamat= $hasil['alamat'];
 $kd_pos = $hasil['kode_pos'];
 $expedisi = $hasil['expedisi'];
 $paket = $hasil['paket'];
 $estimasi = $hasil['estimasi'];
 $ongkir = $hasil['ongkir'];
 $berat = $hasil['berat'];
 $grand_total = $hasil['grand_total'];
 $total_bayar = $hasil['total_bayar'];
 $status_bayar = $hasil['status_bayar'];
 $bukti_bayar= $hasil['bukti_bayar'];
 $atas_nama = $hasil['atas_nama'];
 $nama_bank = $hasil['nama_bank'];
 $no_rek = $hasil['no_rek'];
 $status_order = $hasil['status_order'];
 $no_resi = $hasil['no_resi'];
 //tampilkan barang
 echo "<tr bgcolor='cyan'> 
 <td align='center' width=10%>$kode</td>
 <td align='left' width=40%>$kode</td>
 <td align='left'>$no_order</td>
 <td align='right'>$tgl_order</td>
 <td align='right'>$nama</td>
 <td align='right'>$phone</td>
 <td align='right'>$provinsi</td>
 <td align='right'>$kota</td>
 <td align='right'>$alamat</td>
 <td align='right'>$kd_pos</td>
 <td align='right'>$expedisi</td>
 <td align='right'>$ongkir</td>
 <td align='right'>$berat</td>
 <td align='right'>$grand_total</td>
 <td align='right'>$total_bayar</td>
 <td align='right'>$status_bayar</td>
 <td align='right'>$bukti_bayar</td>
 <td align='right'>$atas_nama</td>
 <td align='right'>$nama_bank</td>
 <td align='right'>$no_rek</td>
 <td align='right'>$status_order</td>
 <td align='right'>$no_resi</td>";
 }
 echo "</table>";
?>
</BODY>
</HTML>