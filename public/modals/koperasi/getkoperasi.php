<?php
$q = intval($_GET['q']);

$conn = mysqli_connect('127.0.0.1', 'root', 'anumacca','pinrang');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT a.nmaKoperasi, c.ta, b.jmlKoperasi, b.jmlAktif, b.jmlTidakaktif FROM daftar_koperasis as a, koperasiDetails as b, koperasiMasters as c";
$sql = $sql . " WHERE a.id = b.koperasi_id and b.koperasiMaster_id = c.id and c.id = " . $q;
$result = $conn->query($sql);
$result1 = $conn->query($sql);
$rows = $result1->fetch_assoc();
echo "
  <div class='modal-content'>
    <div class='modal-header'>

      <h4 class='modal-title'>Data : " .  $rows['ta'] . " </h4>
      <button type='button'  class='close' data-dismiss='modal'>&times;</button>
    </div>
    <div class='modal-body'>
      <table class='table table-striped table-hover'>
      <thead>
        <tr>
          <th>No.</th>
          <th>Jenis Koperasi</th>
          <th>Jumlah Koperasi</th>
          <th>Aktif</th>
          <th>Tidak Aktif</th>
        </tr>
      </thead>
";
    $no = 1;
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $no . "</td>";
        echo "<td nowrap>" . $row['nmaKoperasi'] . "</td>";
        echo "<td>" . $row['jmlKoperasi'] . "</td>";
        echo "<td>" . $row['jmlAktif'] . "</td>";
        echo "<td>" . $row['jmlTidakaktif'] . "</td>";
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
