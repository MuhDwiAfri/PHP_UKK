<header class="navbar navbar-dark sticky-top bg-primary p-0 justify-content-start shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 text-center bg-dark" href="#"><b>Kartar 13</b></a>
    <button class="navbar-toggler d-md-none collapsed mx-2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <h6 class="text-white mt-1 col text-center"></h6>
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <a class="nav-link px-4 text-white" href="../login/index.php" onclick="return confirm('Apakah anda yakin ingin Keluar ?')">Sign out</a>
        </div>
    </div>
</header>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-primary sidebar collapse" style="box-shadow: 0px 1px 6px 0.5px grey;">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-3 mb-1 text-muted">
                        <i class="bi bi-plus-circle text-white"></i>
                        <span class="text-white" style="margin-right: 5rem;"> Menu</span>
                        <a class="link-secondary" href="#" aria-label="Add a new report">
                        </a>
                    </h6>
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="../menu/menu.php">
                            <i class="bi bi-house-door"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="../menu/kontak.php">
                            <i class="bi bi-telephone"></i>
                            Report
                        </a>
                    </li>
                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-3 mb-1 text-muted">
                        <i class="bi bi-plus-circle text-white"></i>
                        <span class="text-white" style="margin-right: 5rem;"> Pengguna</span>
                        <a class="link-secondary" href="#" aria-label="Add a new report">
                        </a>
                    </h6>
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="../Admin_kartar/index.php">
                            <i class="bi bi-person-add"></i>
                            Admin
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="../anggota_kartar/index.php">
                            <i class="bi bi-person"></i>
                            Anggota
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="../warga_kartar/index.php">
                            <i class="bi bi-people"></i>
                            Warga
                        </a>
                    </li>
                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-3 mb-1 text-muted">
                        <i class="bi bi-plus-circle text-white"></i>
                        <span class="text-white" style="margin-right: 5rem;"> Keuangan</span>
                        <a class="link-secondary" href="#" aria-label="Add a new report">
                        </a>
                    </h6>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../keuangan/kas_masuk.php">
                            <i class="bi bi-layers"></i>
                            Pemasukkan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../keluaran/kas_keluar.php">
                            <i class="bi bi-wallet2"></i>
                            Pengeluaran
                        </a>
                    </li>
                </ul>
            </div>
        </nav>