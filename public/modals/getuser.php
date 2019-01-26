<?php
$q = intval($_GET['q']);

$conn = mysqli_connect('127.0.0.1', 'root', 'anumacca','dss');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT a.nmaKecamatan, b.jmlTK, b.jmlKB, b.jmlSPS FROM kecamatan as a, sekolahTKDetail as b, sekolahTKMaster as c";
$sql = $sql . " WHERE a.kdeKecamatan = b.kdeKecamatan and b.kdesekolahTK = c.kdesekolahTK and c.ta = " . $q;

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
            <th>TK/RA</th>
            <th>KB</th>
            <th>SPS</th>
          </tr>
        </thead>
";
    $no = 1;
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $no . "</td>";
        echo "<td>" . $row['nmaKecamatan'] . "</td>";
        echo "<td>" . $row['jmlTK'] . "</td>";
        echo "<td>" . $row['jmlKB'] . "</td>";
        echo "<td>" . $row['jmlSPS'] . "</td>";
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
