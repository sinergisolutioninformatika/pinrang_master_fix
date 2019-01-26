<?php
$q = intval($_GET['q']);

$conn = mysqli_connect('127.0.0.1', 'root', 'anumacca','pinrang');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$namabulan =array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
$sql = "SELECT a.nmaKecamatan, c.bln, b.jmlPenduduk, b.jmlPendLaki, b.jmlPendPerempuan, b.jmlWKTP, b.jmlWKTPLaki, b.jmlWKTPPerempuan, b.jmlCetak FROM kecamatans as a, pendudukDetails as b, pendudukMasters as c";
$sql = $sql . " WHERE a.id = b.kecamatan_id and b.pendudukMaster_id = c.id and c.id = " . $q;
$result = $conn->query($sql);
$result1 = $conn->query($sql);
$row = $result1->fetch_assoc();
echo "
  <div class='modal-content'>
    <div class='modal-header'>
      <h4 class='modal-title'>Data : " . $namabulan[$row['bln']] . " </h4>
      <button type='button' class='close' data-dismiss='modal'>&times;</button>
    </div>
    <div class='modal-body'>
      <table class='table table-striped table-hover'>
      <thead>
        <tr>
          <th rowspan='2'>No.</th>
          <th rowspan='2'>Kecamatan</th>
          <th colspan='3'>Jumlah Penduduk</th>
          <th colspan='3'>Wajib KTP</th>
          <th rowspan='2'>Cetak <br>KTP-El</th>
        </tr>
        <tr>
          <th><img src='/pics/sigma.png' alt='Jumlah'></th>
          <th><img src='/pics/male-sign.png' alt='Laki-laki'></th>
          <th><img src='/pics/female-sign.png' alt='Perempuan'></th>
          <th><img src='/pics/sigma.png' alt='Jumlah'></th>
          <th><img src='/pics/male-sign.png' alt='Laki-laki'></th>
          <th><img src='/pics/female-sign.png' alt='Perempuan'></th>
        </tr>
      </thead>
";
    $no = 1;
    while($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $no . "</td>";
      echo "<td nowrap>" . $row['nmaKecamatan'] . "</td>";
      echo "<td>" . $row['jmlPenduduk'] . "</td>";
      echo "<td>" . $row['jmlPendLaki'] . "</td>";
      echo "<td>" . $row['jmlPendPerempuan'] . "</td>";
      echo "<td>" . $row['jmlWKTP'] . "</td>";
      echo "<td>" . $row['jmlWKTPLaki'] . "</td>";
      echo "<td>" . $row['jmlWKTPPerempuan'] . "</td>";
      echo "<td>" . $row['jmlCetak'] . "</td>";
      echo "</tr>";
      $no++;
    }
    echo "
      </table>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
      </div>
    </div>
      ";
$conn->close();
?>
