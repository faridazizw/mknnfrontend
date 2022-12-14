<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>M K-NN</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets_admin/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets_admin/node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets_admin/node_modules/summernote/dist/summernote-bs4.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets_admin/node_modules/codemirror/lib/codemirror.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets_admin/node_modules/codemirror/theme/duotone-dark.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets_admin/node_modules/selectric/public/selectric.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets_admin/node_modules/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets_admin/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets_admin/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets_admin/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets_admin/assets/css/components.css">
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <?php $jumlahUnreadContact = getJumlahUnreadContact() ?>
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user" aria-expanded="false">
                            <img alt="image" src="<?= base_url('assets/upload/user/avatar/') . $this->session->userdata('avatar'); ?>" class="rounded-circle mr-1" style="width: 30px!important; height: 30px!important;">
                            <div class="d-sm-none d-lg-inline-block"><?= $this->session->userdata('nama') ?></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="<?= base_url('admin/password') ?>" class="dropdown-item has-icon">
                                <i class="fas fa-lock"></i> Ganti Password
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="<?= base_url('Auth/logout') ?>" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <div class="sidebar-brand">
                            <a href="<?= base_url('admin/dashboard'); ?>">M K-NN</a>
                        </div>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="<?= base_url('admin/dashboard'); ?>">MKNN</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Dashboard</li>
                        <li class="nav-item dropdown <?= $this->uri->segment(2) == '' || $this->uri->segment(2) == 'dashboard' || $this->uri->segment(2) == 'tipe' ? 'active' : ''; ?>">
                            <a href="<?= site_url('admin/dashboard'); ?>" class="nav-link <?= $this->uri->segment(2) == 'dashboard' ? 'active' : ''; ?>"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                        </li>
                        <li class="menu-header">Data</li>
                        <li class="nav-item dropdown <?= $this->uri->segment(2) == 'data' ? 'active' : ''; ?>">
                            <a href=" #" class="nav-link has-dropdown"><i class="fas fa-file"></i> <span>Data</span></a>
                            <ul class="dropdown-menu">
                                <li class="<?= $this->uri->segment(3) == 'training' ? 'active' : ''; ?>">
                                    <a class=" nav-link" href="<?= site_url('admin/data/training'); ?>"><i class="fas fa-file"></i> <span>Data Training</span></a>
                                </li>
                                <li class="<?= $this->uri->segment(3) == 'testing' ? 'active' : ''; ?>">
                                    <a class=" nav-link" href="<?= site_url('admin/data/testing'); ?>"><i class="fas fa-file"></i> <span>Data Testing</span></a>
                                </li>
                            </ul>
                        </li>

                        <li class="menu-header">Hasil</li>
                        <li class="nav-item dropdown <?= $this->uri->segment(2) == 'hasil' ? 'active' : ''; ?>">
                            <a href=" #" class="nav-link has-dropdown"><i class="fas fa-random"></i> <span>Hasil</span></a>
                            <ul class="dropdown-menu">
                                <li class="<?= $this->uri->segment(3) == 'proses_pengujian' ? 'active' : ''; ?>">
                                    <a class=" nav-link" href="<?= site_url('admin/hasil/proses_pengujian'); ?>"><i class="fas fa-clipboard-list"></i> <span>Proses Pengujian</span></a>
                                </li>
                                <li class="<?= $this->uri->segment(3) == 'hasil_pengujian' ? 'active' : ''; ?>">
                                    <a class=" nav-link" href="<?= site_url('admin/hasil/hasil_pengujian'); ?>"><i class="fas fa-clipboard-list"></i> <span>Hasil Pengujian</span></a>
                                </li>
                                <li class="<?= $this->uri->segment(3) == 'hasil_akurasi' ? 'active' : ''; ?>">
                                    <a class=" nav-link" href="<?= site_url('admin/hasil/hasil_akurasi'); ?>"><i class="fas fa-clipboard-list"></i> <span>Hasil Akurasi</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-header">User</li>
                        <li class="nav-item dropdown <?= $this->uri->segment(2) == 'user' || $this->uri->segment(2) == 'ganti_password' ? 'active' : ''; ?>">
                            <a href=" #" class="nav-link has-dropdown"><i class="fas fa-random"></i> <span>User</span></a>
                            <ul class="dropdown-menu">
                                <li class="<?= $this->uri->segment(2) == 'user' ? 'active' : ''; ?>">
                                    <a class=" nav-link" href="<?= site_url('admin/user'); ?>"><i class="fas fa-users"></i> <span>Data User</span></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </aside>
            </div>

            <?php echo $contents ?>

            <footer class="main-footer">
                <div class="footer-left">
                    <p>
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        <i class="icon-heart color-danger" aria-hidden="true"></i> By <a href="" target="_blank">Irvan Alfi</a>
                    </p>
                </div>
                <div class="footer-right">
                    v1.0
                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="<?= base_url() ?>assets/assets_admin/node_modules/jquery/dist/jquery.min.js"></script>
    <!-- <script src="<?= base_url() ?>assets/assets_admin/node_modules/popper.js/dist/popper.min.js"></script> -->
    <script src="<?= base_url() ?>assets/assets_admin/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/assets_admin/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
    <script src="<?= base_url() ?>assets/assets_admin/node_modules/moment/min/moment.min.js"></script>
    <script src="<?= base_url() ?>assets/assets_admin/assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="<?= base_url() ?>assets/assets_admin/node_modules/summernote/dist/summernote-bs4.js"></script>
    <script src="<?= base_url() ?>assets/assets_admin/node_modules/codemirror/lib/codemirror.js"></script>
    <script src="<?= base_url() ?>assets/assets_admin/node_modules/codemirror/mode/javascript/javascript.js"></script>
    <script src="<?= base_url() ?>assets/assets_admin/node_modules/selectric/public/jquery.selectric.min.js"></script>
    <script src="<?= base_url() ?>assets/assets_admin/node_modules/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="<?= base_url() ?>assets/assets_admin/node_modules/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/assets_admin/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>assets/assets_admin/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js"></script>


    <!-- Template JS File -->
    <script src="<?= base_url() ?>assets/assets_admin/assets/js/scripts.js"></script>
    <script src="<?= base_url() ?>assets/assets_admin/assets/js/custom.js"></script>

    <!-- Page Specific JS File -->
    <script src="<?= base_url() ?>assets/assets_admin/assets/js/page/modules-datatables.js"></script>

    <!-- Page Specific JS File -->
    <script>
        function previewLabel() {
            const csv = document.querySelector('#file_csv');
            const csvLabel = document.querySelector('.cfcsv');
            csvLabel.textContent = csv.files[0].name;
        }
    </script>
    <script>
        // tampil detail pesan 
        $(document).ready(function() {
            $(document).on('click', '#dtl_psn', function() {
                var subject = $(this).data('subject');
                var pesan = $(this).data('pesan');
                $('#subject1').text(subject);
                $('#pesan1').text(pesan);
            })
        })

        // tampil detail review 
        $(document).ready(function() {
            $(document).on('click', '#dtl_rvw', function() {
                var bintang = $(this).data('star');
                var review = $(this).data('review');
                $('#bintang').text(bintang);
                $('#review').text(review);
            })
        })

        // tampil detail transaksi 
        $(document).ready(function() {
            $(document).on('click', '#dtl_trs', function() {
                var id = $(this).data('id');
                var avatar = $(this).data('avatar');
                var nama = $(this).data('nama');
                var alamat = $(this).data('alamat');
                var noktp = $(this).data('noktp');
                var email = $(this).data('email');
                var notelepon = $(this).data('notelepon');
                var merek = $(this).data('merek');
                var namatipe = $(this).data('namatipe');
                var warna = $(this).data('warna');
                var tahun = $(this).data('tahun');
                var transmisi = $(this).data('transmisi');
                var bbm = $(this).data('bbm');
                var jmlhkursi = $(this).data('jmlhkursi');
                var noplat = $(this).data('noplat');
                var tglrental = $(this).data('tglrental');
                var tglkembali = $(this).data('tglkembali');
                var tgltransaksi = $(this).data('tgltransaksi');
                var tglpengembalian = $(this).data('tglpengembalian');
                var alamatpenjemputan = $(this).data('alamatpenjemputan');
                var waktupenjemputan = $(this).data('waktupenjemputan');
                var hargamobil = $(this).data('hargamobil');
                var hrgsupir = $(this).data('hrgsupir');
                var denda = $(this).data('denda');
                var totalharga = $(this).data('totalharga');
                var totalhargasupir = $(this).data('totalhargasupir');
                var totaldenda = $(this).data('totaldenda');
                var totalrefund = $(this).data('totalrefund');
                var pajak = $(this).data('pajak');
                var totalakhir = $(this).data('totalakhir');
                var statusrental = $(this).data('statusrental');
                var statuspengembalian = $(this).data('statuspengembalian');
                var statuspembayaran = $(this).data('statuspembayaran');
                var subtotal = $(this).data('subtotal');
                var selisih = $(this).data('selisih');

                $('#hari').text(selisih)
                $('#hari2').text(selisih)
                $('#id').text(id);
                $('#nama').text(nama);
                $('#noKTP').text(noktp);
                $('#email').text(email);
                $('#noTelepon').text(notelepon);
                $('#alamat').text(alamat);
                $('#merek').text(merek);
                $('#namaTipe').text(namatipe);
                $('#warna').text(warna);
                $('#tahun').text(tahun);
                $('#transmisi').text(transmisi);
                $('#bbm').text(bbm);
                $('#jmlhKursi').text(jmlhkursi);
                $('#tglRental').text(tglrental);
                $('#tglKembali').text(tglkembali);
                $('#tglTransaksi').text(tgltransaksi);
                $('#tglPengembalian').text(tglpengembalian);
                $('#alamatPenjemputan').text(alamatpenjemputan);
                $('#waktuPenjemputan').text(waktupenjemputan);
                $('#hargaMobil').text(hargamobil);
                $('#hrgSupir').text(hrgsupir);
                $('#denda').text(denda);
                $('#totalHarga').text(totalharga);
                $('#totalHargaSupir').text(totalhargasupir);
                $('#totalDenda').text(totaldenda);
                $('#refund').text(totalrefund);
                $('#pajak').text(pajak);
                $('#pajakP').text(pajak);
                $('#subtotal').text(subtotal);
                $('#totalAkhir').text(totalakhir);
                $('#statusRental').text(statusrental);
                $('#statusPengembalian').text(statuspengembalian);
                $('#statusPembayaran').text(statuspembayaran);
                $('#btnPrint').attr("href", "admin/transaksi/cetakStruk/" + id);
            })
        })

        // auto close alert
        $("#alert1").fadeTo(2000, 500).slideUp(500, function() {
            $("#alert1").slideUp(500);
        });

        // upload foto profile
        function previewPhoto() {
            const photo = document.querySelector('#avatar');
            const photoLabel = document.querySelector('.cfl');
            const imgPreview = document.querySelector('.ip');

            photoLabel.textContent = photo.files[0].name;

            const filePhoto = new FileReader();
            filePhoto.readAsDataURL(photo.files[0]);

            filePhoto.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }

        // upload gambar ktp
        function previewPhoto1() {
            const photo = document.querySelector('#ktp');
            const photoLabel = document.querySelector('.cfl1');
            const imgPreview = document.querySelector('.ip1');

            photoLabel.textContent = photo.files[0].name;

            const filePhoto = new FileReader();
            filePhoto.readAsDataURL(photo.files[0]);

            filePhoto.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }

        function previewPhoto2() {
            const photo = document.querySelector('#gambar');
            const photoLabel = document.querySelector('.cfl1');

            photoLabel.textContent = photo.files[0].name;
        }

        // tampil password 
        function tampilPassword() {
            var x = document.getElementById("password");
            var y = document.getElementById("tpassword");
            var z = document.getElementById("tpassword1");

            if (x.type === 'password') {
                x.type = "text";
                y.style.display = "block";
                z.style.display = "none";
            } else {
                x.type = "password";
                y.style.display = "none";
                z.style.display = "block";
            }
        }

        // tampil password confirm 
        function tampilCPassword() {
            var x = document.getElementById("cpassword");
            var y = document.getElementById("tcpassword");
            var z = document.getElementById("tcpassword1");

            if (x.type === 'password') {
                x.type = "text";
                y.style.display = "block";
                z.style.display = "none";
            } else {
                x.type = "password";
                y.style.display = "none";
                z.style.display = "block";
            }
        }
    </script>
</body>

</html>