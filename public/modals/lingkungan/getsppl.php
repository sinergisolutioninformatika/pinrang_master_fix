<?php
$q = intval($_GET['q']);

$conn = mysqli_connect('127.0.0.1', 'root', 'anumacca','pinrang');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT a.nmaKecamatan, b.jmlSurat FROM kecamatans as a, spplDetails as b, spplMasters as c";
$sql = $sql . " WHERE a.id = b.kecamatan_id and b.spplMaster_id = c.id and c.id = " . $q;
$namabln =array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
$nabul = $namabln[$q];
$result = $conn->query($sql);
echo "
  <div class='modal-content'>
    <div class='modal-header'>

      <h4 class='modal-title'>Data : " .  $nabul . " </h4>
      <button type='button' class='close' data-dismiss='modal'>&times;</button>
    </div>
    <div class='modal-body'>
      <table class='table table-striped table-hover'>
        <thead>
          <tr>
            <th>No.</th>
            <th>Kecamatan</th>
            <th>Jumlah SPPL</th>
          </tr>
        </thead>
";
    $no = 1;
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $no . "</td>";
        echo "<td nowrap>" . $row['nmaKecamatan'] . "</td>";
        echo "<td>" . $row['jmlSurat'] . "</td>";
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
