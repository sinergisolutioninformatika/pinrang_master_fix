<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','','pinrang');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"pinrang");
$sql="SELECT * FROM puskesmas WHERE id = '".$q."'";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)) {
    echo "Input Data 10 Penyakit pada : <b>". $row['nmaPuskesmas'] . "</b>";
    echo "<input name='puskesmas_id' type='hidden' value='" . $row['id'] . "'></input>";
}
mysqli_close($con);
?>
