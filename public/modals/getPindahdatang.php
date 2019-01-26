<?php
$q = intval($_GET['q']);

$conn = mysqli_connect('127.0.0.1', 'root', 'anumacca','dss');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$namabulan =array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
$sql = "SELECT a.nmaKecamatan, c.bln, b.jmlPindahK4, b.jmlPindahK5, b.jmlDatangK4, b.jmlDatangK5 FROM kecamatan as a, pindahdatangDetail as b, pindahdatangMaster as c";
$sql = $sql . " WHERE a.kdeKecamatan = b.kdeKecamatan and b.kdePD = c.kdePD and c.kdePD = " . $q;
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
          <th colspan='2'>Jumlah Pindah (K4/K5)</th>
          <th colspan='2'>Jumlah Datang (K4/K5)</th>
        </tr>
        <tr>
          <th>K4</th>
          <th>K5</th>
          <th>K4</th>
          <th>K5</th>
        </tr>
      </thead>
";
    $no = 1;
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $no . "</td>";
        echo "<td nowrap>" . $row['nmaKecamatan'] . "</td>";
        echo "<td>" . $row['jmlPindahK4'] . "</td>";
        echo "<td>" . $row['jmlPindahK5'] . "</td>";
        echo "<td>" . $row['jmlDatangK4'] . "</td>";
        echo "<td>" . $row['jmlDatangK5'] . "</td>";
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
