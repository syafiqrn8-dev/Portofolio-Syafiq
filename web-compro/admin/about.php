<?php
include '../koneksi/koneksi.php';

// Hanya melihat data yang di kirim dari halaman depan (index paling depan di Portofolio)
$query = mysqli_query($koneksi, "SELECT * FROM abouts ORDER BY id DESC");
$rows = mysqli_fetch_all($query, MYSQLI_ASSOC);

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $query1 = mysqli_query($koneksi, "SELECT * FROM abouts WHERE id='$id'");
    $row = mysqli_fetch_assoc($query1);
    $file_lama = $row['file'];
    $query = mysqli_query($koneksi, "DELETE FROM abouts WHERE id = '$id'");
    if (file_exists("uploads/" . $file_lama)) {
        unlink("uploads/" . $file_lama);
    }
    header('location: about.php');

} else if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telp = $_POST['telp'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];
    $kode_pos = $_POST['kode_pos'];
    $deskripsi = $_POST['deskripsi'];
    // $status = $_POST['status'];
    $file_lama = $_POST['file_lama'];
    // Get value dari input: type menggunakan $_FILES
    $file = "";

    if (isset($_FILES['file'])) {
        $namaFile = $_FILES['file']['name'];
        $tmpFile = $_FILES['file']['tmp_name'];
        $sizeFile = $_FILES['file']['size'];
        $error = $_FILES['file']['error'];

        if ($sizeFile > 2 * 1024 * 1024) {
            exit('Ukuran file lebih dari 2MB');
        }

        $extensionValid = ['pdf', 'png', 'jpg', 'jpeg'];
        $extension = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));

        //IN ARRAY
        if (!in_array($extension, $extensionValid)) {
            exit('Extensi tidak valid!');
        }
        $namaFileBaru = uniqid() . "-" . time() . "." . $extension;
        $pathUpload = "uploads";

        // Buat folder uploads secara otomatis jika belum ada
        if (!is_dir($pathUpload)) {
            mkdir($pathUpload, 0777, true);
        }

        // move_uploaded_file()
        if (!move_uploaded_file($tmpFile, $pathUpload . "/" . $namaFileBaru)) {
            exit('Gambar gagal terupload');
        }
        $file = $namaFileBaru;
    }
    $update = mysqli_query($koneksi, "UPDATE abouts SET nama = '$nama', email = '$email', telp = '$telp', tanggal_lahir = '$tanggal_lahir', alamat = '$alamat', kode_pos = '$kode_pos', file = '$file', deskripsi = '$deskripsi' WHERE id = '$id' ");
    if (file_exists("uploads/" . $file_lama)) {
        unlink("uploads/" . $file_lama);
    }
    header('location: about.php');
}

// session_start();
// Jika Sudah login, langsung ke halaman Login
// if (isset($_SESSION['nama'])) {
//     header("location: login.php");
//     exit;
// }

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = mysqli_query($koneksi, "DELETE FROM abouts WHERE id='$id'");
    header('location:about.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard - Web Syafiq</title>

    <!-- Custom fonts -->
    <?php include '_inc/css.php'; ?>
    <!-- Custom styles -->


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include '_inc/sidebar.php'; ?>
        <!-- End of Sidebar -->


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include '_inc/nav.php'; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>

                    <div class="row my-4">
                        <div class="col-lg-12">
                            <div class="card shadow-sm border-0 rounded-lg">

                                <!-- Card Header -->
                                <div
                                    class="card-header bg-primary text-white py-3 d-flex align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold">Tentang Kami</h6>
                                    <a href="add-about.php" class="btn btn-light text-primary btn-sm fw-bold">
                                        <i class="fas fa-plus me-1"></i> Tambah Tentang Kami
                                    </a>
                                </div>

                                <!-- Card Body -->
                                <div class="card-body p-4">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover align-middle mb-0">
                                            <thead class="table-light text-center">
                                                <tr>
                                                    <th class="py-3 text-center" style="width: 50px;">No</th>
                                                    <th class="py-3 text-start">Nama</th>
                                                    <th class="py-3 text-start">Deskripsi</th>
                                                    <th class="py-3 text-center">Tanggal Lahir</th>
                                                    <th class="py-3 text-start">Email</th>
                                                    <th class="py-3">Telp</th>
                                                    <th class="py-3 text-start">Alamat</th>
                                                    <th class="py-3 text-center">Kode Pos</th>
                                                    <th class="py-3">File</th>
                                                    <th class="py-3 text-center">Status</th>
                                                    <th class="py-3 text-center" style="min-width: 140px;">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (!empty($rows)) { ?>
                                                    <?php foreach ($rows as $index => $row) { ?>
                                                        <tr>
                                                            <td class="text-center fw-bold"><?php echo $index + 1; ?></td>
                                                            <td><?php echo htmlspecialchars($row['nama']); ?></td>
                                                            <td><?php echo htmlspecialchars($row['deskripsi']); ?></td>
                                                            <td class="text-nowrap">
                                                                <?php echo htmlspecialchars($row['tanggal_lahir']); ?>
                                                            </td>
                                                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                                                            <td class="text-nowrap">
                                                                <?php echo htmlspecialchars($row['telp']); ?>
                                                            </td>
                                                            <!-- Contoh memotong alamat jika lebih dari 30 karakter -->
                                                            <td>
                                                                <?php
                                                                $alamat = htmlspecialchars($row['alamat']);
                                                                echo (strlen($alamat) > 30) ? substr($alamat, 0, 30) . '...' : $alamat;
                                                                ?>
                                                            </td>
                                                            <td class="text-center">
                                                                <?php echo htmlspecialchars($row['kode_pos']); ?>
                                                            </td>
                                                            <td class="text-center">
                                                                <?php if (!empty($row['file'])) { ?>
                                                                    <a href="uploads/<?php echo $row['file']; ?>" target="_blank"
                                                                        class="btn btn-outline-info btn-sm">Lihat File</a>
                                                                <?php } else { ?>
                                                                    <span class="badge bg-secondary">Tidak ada</span>
                                                                <?php } ?>
                                                            </td>
                                                            <td class="text-center">
                                                                <?php if ($row['is_active'] == 1) { ?>
                                                                    <span class="badge bg-success">Aktif</span>
                                                                <?php } else { ?>
                                                                    <span class="badge bg-danger">Non-Aktif</span>
                                                                <?php } ?>
                                                            </td>
                                                            <td class="text-center text-nowrap">
                                                                <div class="d-inline-flex gap-2">
                                                                    <a data-toggle="modal"
                                                                        data-target="#editpart<?= $row['id']; ?>"
                                                                        href=" #editpart<?= $row['id']; ?>"
                                                                        class="btn btn-success btn-sm mr-2">Edit</a>
                                                                    <a onclick="return confirm('Apakah kamu yakin akan menghapus data ini?')"
                                                                        href="about.php?hapus=<?php echo $row['id']; ?>"
                                                                        class="btn btn-danger btn-sm">Hapus</a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                <?php } else { ?>
                                                    <tr>
                                                        <td colspan="11" class="text-center py-4 text-muted">Belum ada data
                                                            tersedia.</td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <!-- <div class="row"> -->

                    <!-- Earnings (Monthly) Card Example -->
                    <!-- <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Earnings (Monthly)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                    <!-- Earnings (Monthly) Card Example -->
                    <!-- <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Earnings (Annual)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                    <!-- Earnings (Monthly) Card Example -->
                    <!-- <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                    <!-- Pending Requests Card Example -->
                    <!-- <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pending Requests</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <!-- Content Row -->

                    <!-- <div class="row"> -->

                    <!-- Area Chart -->
                    <!-- <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4"> -->
                    <!-- Card Header - Dropdown -->
                    <!-- <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div> -->
                    <!-- Card Body -->
                    <!-- <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                    <!-- Pie Chart -->
                    <!-- <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4"> -->
                    <!-- Card Header - Dropdown -->
                    <!-- <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div> -->
                    <!-- Card Body -->
                    <!-- <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Direct
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Social
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Referral
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <!-- Content Row -->
                    <!-- <div class="row"> -->

                    <!-- Content Column -->
                    <!-- <div class="col-lg-6 mb-4"> -->

                    <!-- Project Card Example -->
                    <!-- <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
                                </div>
                                <div class="card-body">
                                    <h4 class="small font-weight-bold">Server Migration <span
                                            class="float-right">20%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 20%"
                                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Sales Tracking <span
                                            class="float-right">40%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 40%"
                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Customer Database <span
                                            class="float-right">60%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar" role="progressbar" style="width: 60%"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Payout Details <span
                                            class="float-right">80%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 80%"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Account Setup <span
                                            class="float-right">Complete!</span></h4>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div> -->

                    <!-- Color System -->
                    <!-- <div class="row">
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-primary text-white shadow">
                                        <div class="card-body">
                                            Primary
                                            <div class="text-white-50 small">#4e73df</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-success text-white shadow">
                                        <div class="card-body">
                                            Success
                                            <div class="text-white-50 small">#1cc88a</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-info text-white shadow">
                                        <div class="card-body">
                                            Info
                                            <div class="text-white-50 small">#36b9cc</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-warning text-white shadow">
                                        <div class="card-body">
                                            Warning
                                            <div class="text-white-50 small">#f6c23e</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-danger text-white shadow">
                                        <div class="card-body">
                                            Danger
                                            <div class="text-white-50 small">#e74a3b</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-secondary text-white shadow">
                                        <div class="card-body">
                                            Secondary
                                            <div class="text-white-50 small">#858796</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-light text-black shadow">
                                        <div class="card-body">
                                            Light
                                            <div class="text-black-50 small">#f8f9fc</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-dark text-white shadow">
                                        <div class="card-body">
                                            Dark
                                            <div class="text-white-50 small">#5a5c69</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-6 mb-4"> -->

                    <!-- Illustrations -->
                    <!-- <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                            src="assets/img/undraw_posting_photo.svg" alt="...">
                                    </div>
                                    <p>Add some quality, svg illustrations to your project courtesy of <a
                                            target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a
                                        constantly updated collection of beautiful svg images that you can use
                                        completely free and without attribution!</p>
                                    <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on
                                        unDraw &rarr;</a>
                                </div>
                            </div> -->

                    <!-- Approach -->
                    <!-- <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
                        </div>
                        <div class="card-body">
                            <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce
                                CSS bloat and poor page performance. Custom CSS classes are used to create
                                custom components and custom utility classes.</p>
                            <p class="mb-0">Before working with this theme, you should become familiar with the
                                Bootstrap framework, especially the utility classes.</p>
                        </div>
                    </div> -->

                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <?php include '_inc/footer.php'; ?>
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Update -->
    <?php if (isset($rows)) {
        foreach ($rows as $index => $row) { ?>
            <div class="modal fade" id="editpart<?= $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update data
                                <?= $row['id'] ?>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="" method="post" class="p-4" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                    <input type="hidden" name="file_lama" value="<?= $row['file'] ?>">
                                    <label for="">Nama</label>
                                    <input type="text" class="form-control" name="nama" value="<?= $row['nama'] ?>"
                                        placeholder="Masukkan nama anda..">
                                </div>
                                <div class="mb-3">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control" name="email" value="<?= $row['email'] ?>"
                                        placeholder="Masukkan email anda..">
                                </div>
                                <div class="mb-3">
                                    <label for="">Telp</label>
                                    <input type="tel" class="form-control" name="telp" value="<?= $row['telp'] ?>"
                                        placeholder="Masukkan no telp anda..">
                                </div>
                                <div class="mb-3">
                                    <label for="">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tanggal_lahir" value="<?= $row['tanggal_lahir'] ?>"
                                        placeholder="Masukkan tanggal lahir anda..">
                                </div>
                                <div class="mb-3">
                                    <label for="">Deskripsi</label>
                                    <textarea type="text" class="form-control" name="deskripsi"
                                        placeholder="Masukkan deskripsi anda.."><?= $row['deskripsi'] ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="mb-3">
                                                <label for="">Alamat</label>
                                                <textarea type="text" class="form-control" name="alamat"
                                                    placeholder="Masukkan alamat anda.."><?= $row['telp'] ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="">Kode Pos</label>
                                                <input type="number" class="form-control" name="kode_pos" value="<?= $row['kode_pos'] ?>"
                                                    placeholder="Masukkan kode pos anda..">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="">File</label>
                                    <input type="file" class="form-control" name="file" value="<?= $row['file'] ?>" placeholder="Masukkan file anda..">
                                </div>
                                <div class="modal-footer">
                                    <button href="about.php" class="text-decoration" type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Close</button>
                                    <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php }
    } ?>

    <!-- Bootstrap core JavaScript-->
    <?php include '_inc/js.php'; ?>

</body>

</html>