<html>
<head>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<?php


$host = "localhost";
$password = "";
$user = "root";
$dbname = "registeration_records";

$connection = mysqli_connect($host, $user, $password, $dbname);

if(isset($_POST['delete_btn'])) {
    $id = $_POST['delete_id'];

    $query = "DELETE FROM data_entries WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run) {
        echo "<script>alert('Record Deleted Successfully!')</script>";
        echo "<script>location.href = 'index.php'</script>";
    }
    else {
        echo "<script>alert('Not Deleted!')</script>";
    }
}


?>

</html>