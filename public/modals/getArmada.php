<?php
$q = intval($_GET['q']);

$conn = mysqli_connect('127.0.0.1', 'root', 'anumacca','dss');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT a.nmaKecamatan, b.jmlArmada, b.jmlKapalMotor, b.jmlPerahuMotor, b.jmlPerahu FROM kecamatan as a, armadaDetail as b, armadaMaster as c";
$sql = $sql . " WHERE a.kdeKecamatan = b.kdeKecamatan and b.kdeArmada = c.kdeArmada and c.ta = " . $q;

$result = $conn->query($sql);
echo "
  <div class='modal-content'>
    <div class='modal-header'>

      <h4 class='modal-title'>Data : " .  $q . " </h4>
      <button type='button' class='close' data-dismiss='modal'>&times;</button>
    </div>
    <div class='modal-body'>
      <table class='table table-striped table-hover'>
        <thead>
          <tr>
            <th>No.</th>
            <th>Kecamatan</th>
            <th>Kapal Motor</th>
            <th>Perahu Motor Tempel</th>
            <th>Perahu Tanpa Motor</th>
            <th>Jumlah Armada</th>
          </tr>
        </thead>
";
    $no = 1;
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $no . "</td>";
        echo "<td nowrap>" . $row['nmaKecamatan'] . "</td>";
        echo "<td>" . $row['jmlKapalMotor'] . "</td>";
        echo "<td>" . $row['jmlPerahuMotor'] . "</td>";
        echo "<td>" . $row['jmlPerahu'] . "</td>";
        echo "<td>" . $row['jmlArmada'] . "</td>";
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
