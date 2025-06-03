<?php
// Include connection file
include "../connection.php";

// Check if the form is submitted
if (isset($_POST['update'])) {
    // Get the updated data from the form
    $id = $_POST['id'];
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $sks = $_POST['sks'];
    $semester = $_POST['semester'];

    // Update the database
    $result = mysqli_query($con, "UPDATE matakuliah SET kode='$kode', nama='$nama', sks='$sks', semester='$semester' WHERE id=$id");

    // Check if the update was successful
    if ($result) {
        header("Location: ../admin/?page=matakuliah-show"); // Redirect to matakuliah-show page after update
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
}
