<?php
$q = intval($_GET['q']);

$conn = mysqli_connect('127.0.0.1', 'root', 'anumacca','dss');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT a.nmaKecamatan, c.ta, b.jmlPanjangjalan, b.jmlKondisiBaik, b.jmlKondisiSedang, b.jmlRusakRingan, b.jmlRusakBerat FROM kecamatan as a, panjangjalanDetail as b, panjangjalanMaster as c";
$sql = $sql . " WHERE a.kdeKecamatan = b.kdeKecamatan and b.kdePJ = c.kdePJ and c.kdePJ = " . $q;
$result = $conn->query($sql);
$result1 = $conn->query($sql);
$rows = $result1->fetch_assoc();
echo "
  <div class='modal-content'>
    <div class='modal-header'>

      <h4 class='modal-title'>Data : " .  $rows['ta'] . " </h4>
      <button type='button' class='close' data-dismiss='modal'>&times;</button>
    </div>
    <div class='modal-body'>
      <table class='table table-striped table-hover'>
      <thead>
      <tr>
        <th>No.</th>
        <th>Kecamatan</th>
        <th>Panjang Jalan (KM)</th>
        <th>Kondisi Baik</th>
        <th>Rusak Sedang</th>
        <th>Rusak Ringan</th>
        <th>Rusak Berat</th>
      </tr>
      </thead>
";
    $no = 1;
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $no . "</td>";
        echo "<td nowrap>" . $row['nmaKecamatan'] . "</td>";
        echo "<td>" . $row['jmlPanjangjalan'] . "</td>";
        echo "<td>" . $row['jmlKondisiBaik'] . "</td>";
        echo "<td>" . $row['jmlKondisiSedang'] . "</td>";
        echo "<td>" . $row['jmlRusakRingan'] . "</td>";
        echo "<td>" . $row['jmlRusakBerat'] . "</td>";
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
