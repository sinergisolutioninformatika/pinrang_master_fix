<?php
$q = intval($_GET['q']);

$conn = mysqli_connect('127.0.0.1', 'root', 'anumacca','dss');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT a.nmaKecamatan, c.ta, b.jmlDesaTerlayani, b.jmlDesaBelumTerlayani, b.jmlBTS FROM kecamatan as a, telekomunikasiDetail as b, telekomunikasiMaster as c";
$sql = $sql . " WHERE a.kdeKecamatan = b.kdeKecamatan and b.kdeTel = c.kdeTel and c.kdeTel = " . $q;
$result = $conn->query($sql);
$result1 = $conn->query($sql);
$rows = $result1->fetch_assoc();
echo "
  <div class='modal-content'>
    <div class='modal-header'>

      <h4 class='modal-title'>Data : " .  $rows['ta'] . " </h4>
      <button type='button' class='btn btn-outline-success btn-sm m-btn m-btn--custom' data-dismiss='modal'>&times;</button>
    </div>
    <div class='modal-body'>
      <table class='table table-striped table-hover'>
      <thead>
        <tr>
          <th>No.</th>
          <th>Kecamatan</th>
          <th>Jumlah Desa Terlayani</th>
          <th>Jumlah Desa Belum Terlayani</th>
          <th>Jumlah BTS</th>
        </tr>
      </thead>
";
    $no = 1;
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $no . "</td>";
        echo "<td nowrap>" . $row['nmaKecamatan'] . "</td>";
        echo "<td>" . $row['jmlDesaTerlayani'] . "</td>";
        echo "<td>" . $row['jmlDesaBelumTerlayani'] . "</td>";
        echo "<td>" . $row['jmlBTS'] . "</td>";
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
