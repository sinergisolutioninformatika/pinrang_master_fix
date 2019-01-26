<?php
$q = intval($_GET['q']);

$conn = mysqli_connect('127.0.0.1', 'root', 'anumacca','pinrang');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT a.nmaKecamatan, c.ta, b.jmlNelayan, b.jmlNelayanlaut, b.jmlNelayandarat, b.jmlPetanisawah, b.jmlPetanikolam, b.jmlPetanitambak FROM kecamatans as a, nelayanDetails as b, nelayanMasters as c";
$sql = $sql . " WHERE a.id = b.kecamatan_id and b.nelayanMaster_id = c.id and c.id = " . $q;
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
          <th>Kecamatan</th>
          <th>Jumlah Nelayan</th>
          <th>Nelayan Laut</th>
          <th>Nelayan Darat</th>
          <th>Petani Sawah</th>
          <th>Petani Kolam</th>
          <th>Petani Tambak</th>
        </tr>
      </thead>
";
    $no = 1;
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $no . "</td>";
        echo "<td nowrap>" . $row['nmaKecamatan'] . "</td>";
        echo "<td>" . $row['jmlNelayan'] . "</td>";
        echo "<td>" . $row['jmlNelayanlaut'] . "</td>";
        echo "<td>" . $row['jmlNelayandarat'] . "</td>";
        echo "<td>" . $row['jmlPetanisawah'] . "</td>";
        echo "<td>" . $row['jmlPetanikolam'] . "</td>";
        echo "<td>" . $row['jmlPetanitambak'] . "</td>";
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
