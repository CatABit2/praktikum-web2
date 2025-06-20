<?php
if (isset($_POST['Submit'])) {
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $sks = $_POST['sks'];
    $semester = $_POST['semester'];
    $result = mysqli_query($con, "INSERT INTO matakuliah(kode,nama,sks,semester)
    VALUES('$kode','$nama','$sks','$semester')");
    header("Location:?page=matakuliah-show");
}
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong>Tambah Data Mata Kuliah</strong>
            </div>
            <div class="card-body">
                <form method="POST" action="?page=matakuliah-add" class="form-horizontal">
                    <div class="form-group">
                        <label for="kode" class="control-label">Kode Mata Kuliah</label>
                        <input type="text" class="form-control" name="kode" placeholder="Masukkan Kode Mata Kuliah..." required>
                    </div>
                    <div class="form-group">
                        <label for="nama" class="control-label">Nama Mata Kuliah</label>
                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Mata Kuliah..." required>
                    </div>
                    <div class="form-group">
                        <label for="sks" class="control-label">SKS</label>
                        <input type="number" class="form-control" name="sks" placeholder="Masukkan SKS..." required>
                    </div>
                    <div class="form-group">
                        <label for="semester" class="control-label">Semester</label>
                        <select class="form-control" name="semester" required>
                            <option disabled selected>Pilih Semester</option>
                            <option value="1">Semester 1</option>
                            <option value="2">Semester 2</option>
                            <option value="3">Semester 3</option>
                            <option value="4">Semester 4</option>
                            <option value="5">Semester 5</option>
                            <option value="6">Semester 6</option>
                            <option value="7">Semester 7</option>
                            <option value="8">Semester 8</option>
                        </select>
                    </div>
                    <input type="submit" name="Submit" class="btn btn-primary" value="Simpan">
                    <input type="reset" name="reset" class="btn btn-warning" value="Reset">
                </form>
            </div>
        </div>
    </div>
</div>