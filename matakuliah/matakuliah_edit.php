<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="panel-title">Ubah Data Mata Kuliah</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="?page=matakuliah-update" class="form-horizontal">
                    <?php
                    // Fetch the data from the database based on id
                    $id = $_GET['id'];
                    $result = mysqli_query($con, "SELECT * FROM matakuliah WHERE id=$id");
                    while ($data = mysqli_fetch_array($result)) {
                        $kode = $data['kode'];
                        $nama = $data['nama'];
                        $sks = $data['sks'];
                        $semester = $data['semester'];
                    }
                    ?>
                    <div class="form-group">
                        <label for="kode" class="col-sm-2 control-label">Kode Mata Kuliah</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="kode" value="<?php echo $kode; ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama" class="col-sm-2 control-label">Nama Mata Kuliah</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama" value="<?php echo $nama; ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sks" class="col-sm-2 control-label">SKS</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="sks" value="<?php echo $sks; ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="semester" class="col-sm-2 control-label">Semester</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="semester" required>
                                <option disabled>Pilih Semester</option>
                                <option <?php if ($semester == 1) echo 'selected'; ?> value="1">Semester 1</option>
                                <option <?php if ($semester == 2) echo 'selected'; ?> value="2">Semester 2</option>
                                <option <?php if ($semester == 3) echo 'selected'; ?> value="3">Semester 3</option>
                                <option <?php if ($semester == 4) echo 'selected'; ?> value="4">Semester 4</option>
                                <option <?php if ($semester == 5) echo 'selected'; ?> value="5">Semester 5</option>
                                <option <?php if ($semester == 6) echo 'selected'; ?> value="6">Semester 6</option>
                                <option <?php if ($semester == 7) echo 'selected'; ?> value="7">Semester 7</option>
                                <option <?php if ($semester == 8) echo 'selected'; ?> value="8">Semester 8</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="hidden" name="id" value=<?php echo $_GET['id']; ?>>
                            <input type="submit" name="update" class="btn btn-primary" value="Update">
                            <input type="reset" name="reset" class="btn btn-warning" value="Reset">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>