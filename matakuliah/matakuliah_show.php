<div class="card">
    <div class="card-header">
        <strong>Data Mata Kuliah</strong>
    </div>
    <div class="card-body">
        <form action="?page=matakuliah-show" method="POST">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Masukkan Kode MK atau Nama MK..." name="keyword">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit" name="search">Cari!</button>
                </div>
            </div>
        </form>

        <a href="?page=matakuliah-add" class="btn btn-primary mb-2">Tambah Data</a>
        <a href="../matakuliah/matakuliah_print.php" target="_blank" class="btn btn-success mb-2">Cetak Data</a>

        <div class="table-responsive">
            <table class="table table-sm table-bordered table-hover m-0">
                <?php
                $limit = 5;
                $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
                $mulai = ($page > 1) ? ($page * $limit) - $limit : 0;

                // Query pencarian jika form 'search' dikirimkan
                if (isset($_POST['search'])) {
                    $keyword = mysqli_real_escape_string($con, trim($_POST['keyword']));
                    $query = mysqli_query($con, "SELECT * FROM matakuliah WHERE kode LIKE '%$keyword%' OR nama LIKE '%$keyword%' LIMIT $mulai, $limit");
                } else {
                    // Default query jika tidak ada pencarian
                    $query = mysqli_query($con, "SELECT * FROM matakuliah LIMIT $mulai, $limit");
                }
                ?>

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Mata Kuliah</th>
                        <th>Nama Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Semester</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = $mulai + 1;
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <td><?php echo $no ?></td>
                            <td><?php echo $data['kode']; ?></td>
                            <td><?php echo $data['nama']; ?></td>
                            <td><?php echo $data['sks']; ?></td>
                            <td><?php echo $data['semester']; ?></td>
                            <td>
                                <a class="btn btn-sm btn-success" href="?page=matakuliah-edit&id=<?php echo $data['id']; ?>">Edit</a>
                                <a class="btn btn-sm btn-danger" href="../matakuliah/matakuliah_delete.php?id=<?php echo $data['id']; ?>" onclick="return confirm('Anda yakin mau menghapus item ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <?php
        $result = mysqli_query($con, "SELECT COUNT(id) AS total FROM matakuliah");
        $row = mysqli_fetch_assoc($result);
        $total_records = $row['total'];
        ?>

        <p>Jumlah Data: <?php echo $total_records; ?></p>

        <nav class="mb-5">
            <ul class="pagination justify-content-end">
                <?php
                $jumlah_page = ceil($total_records / $limit);
                $start_number = ($page > 1) ? $page - 1 : 1;
                $end_number = ($page < ($jumlah_page - 1)) ? $page + 1 : $jumlah_page;

                if ($page > 1) {
                    echo '<li class="page-item"><a class="page-link" href="?page=matakuliah-show&halaman=1">First</a></li>';
                    echo '<li class="page-item"><a class="page-link" href="?page=matakuliah-show&halaman=' . ($page - 1) . '">&laquo;</a></li>';
                } else {
                    echo '<li class="page-item disabled"><a class="page-link" href="#">First</a></li>';
                    echo '<li class="page-item disabled"><a class="page-link" href="#">«</a></li>';
                }

                for ($i = $start_number; $i <= $end_number; $i++) {
                    $link_active = ($page == $i) ? ' active' : '';
                    echo '<li class="page-item' . $link_active . '"><a class="page-link" href="?page=matakuliah-show&halaman=' . $i . '">' . $i . '</a></li>';
                }

                if ($page < $jumlah_page) {
                    echo '<li class="page-item"><a class="page-link" href="?page=matakuliah-show&halaman=' . ($page + 1) . '">&raquo;</a></li>';
                    echo '<li class="page-item"><a class="page-link" href="?page=matakuliah-show&halaman=' . $jumlah_page . '">Last</a></li>';
                } else {
                    echo '<li class="page-item disabled"><a class="page-link" href="#">»</a></li>';
                    echo '<li class="page-item disabled"><a class="page-link" href="#">Last</a></li>';
                }
                ?>
            </ul>
        </nav>
    </div>
</div>