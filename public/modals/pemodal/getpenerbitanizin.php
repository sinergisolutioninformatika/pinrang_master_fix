<?php
$q = intval($_GET['q']);

$conn = mysqli_connect('127.0.0.1', 'root', 'anumacca','pinrang');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT a.nmaBidang, c.ta, b.jmlPenerbitan, b.jmlRetribusi FROM bidang_izins as a, penerbitanizinDetails as b, penerbitanizinMasters as c";
$sql = $sql . " WHERE a.id = b.bidang_izin_id and b.penerbitanizinMaster_id = c.id and c.id = " . $q;
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
          <th>Bidang Usaha</th>
          <th>Jumlah Penerbitan Izin</th>
          <th>Jumlah Retribusi (.000)</th>
          </tr>
        </thead>
";
    $no = 1;
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $no . "</td>";
        echo "<td nowrap>" . $row['nmaBidang'] . "</td>";
        echo "<td>" . $row['jmlPenerbitan'] . "</td>";
        echo "<td>" . $row['jmlRetribusi'] . "</td>";
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
