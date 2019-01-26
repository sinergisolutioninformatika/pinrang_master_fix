<?php
$q = intval($_GET['q']);

$conn = mysqli_connect('127.0.0.1', 'root', 'anumacca','pinrang');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT a.nmaKecamatan, c.ta, b.jmlProduksi, b.jmlLaut, b.jmlRawa, b.jmlSungai, b.jmlWaduk FROM kecamatans as a, produksiikanDetails as b, produksiikanMasters as c";
$sql = $sql . " WHERE a.id = b.kecamatan_id and b.produksiikanMaster_id = c.id and c.id = " . $q;
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
          <th>Jumlah Produksi</th>
          <th>Perikanan Laut</th>
          <th>Perikanan Rawa</th>
          <th>Petani Sungai</th>
          <th>Petani Waduk</th>
        </tr>
      </thead>
";
    $no = 1;
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $no . "</td>";
        echo "<td nowrap>" . $row['nmaKecamatan'] . "</td>";
        echo "<td>" . $row['jmlProduksi'] . "</td>";
        echo "<td>" . $row['jmlLaut'] . "</td>";
        echo "<td>" . $row['jmlRawa'] . "</td>";
        echo "<td>" . $row['jmlSungai'] . "</td>";
        echo "<td>" . $row['jmlWaduk'] . "</td>";
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
