<?php
$q = intval($_GET['q']);

$conn = mysqli_connect('127.0.0.1', 'root', 'anumacca','pinrang');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT a.nmaKecamatan, c.ta, b.jmlKejadian, b.jmlBanjir, b.jmlKebakaran, b.jmlKekeringan,
b.jmlAnginkencang, b.jmlTanahlongsor FROM kecamatans as a, bencanaalamDetails as b, bencanaalamMasters as c";
$sql = $sql . " WHERE a.id = b.kecamatan_id and b.bencanaalamMaster_id = c.id and c.id = " . $q;
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
          <th>Tahun</th>
          <th>Jml. Kejadian</th>
          <th>Banjir</th>
          <th>Kebakaran</th>
          <th>Kekeringan</th>
          <th>Angin Kencang</th>
          <th>Tanah Longsor</th>
        </tr>
      </thead>
";
    $no = 1;
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $no . "</td>";
        echo "<td nowrap>" . $row['nmaKecamatan'] . "</td>";
        echo "<td>" . $row['jmlKejadian'] . "</td>";
        echo "<td>" . $row['jmlBanjir'] . "</td>";
        echo "<td>" . $row['jmlKebakaran'] . "</td>";
        echo "<td>" . $row['jmlKekeringan'] . "</td>";
        echo "<td>" . $row['jmlAnginkencang'] . "</td>";
        echo "<td>" . $row['jmlTanahlongsor'] . "</td>";
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
