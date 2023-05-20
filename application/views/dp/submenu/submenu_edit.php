<!-- Aplikasi Skripsi 170441100011 Roudlotuz Zahro Khoiriyah 20 Mei 2023 -->
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3><?php echo $title ?></h3>
                    <p class="text-subtitle text-muted">Ini Adalah Halaman <?php echo $title ?></p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>admin">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>menu">Manajemen Menu</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $title ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="flash-data-news" data-flashdata="<?= $this->session->flashdata('flash') ?>">
            </div>
            <div class="flash-data-data" data-flashdata="<?= $this->session->flashdata('data') ?>">
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Sub Menu</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="POST" action="<?= base_url() ?>subMenu/edit" class="needs-validation" novalidate="">
                                        <input type="text" hidden disable name="id_user_sub_menu" class="form-control" value="<?= $data_submenu['id_user_sub_menu'] ?>">
                                        <div class="form-group">
                                            <label for="title">Nama Sub Menu</label>
                                            <input type="text" name="title" class="form-control" required autofocus placeholder="Masukkan Nama Sub Menu" tabindex="1" value="<?= $data_submenu['title'] ?>">
                                            <div class=" invalid-feedback">
                                                Silahkan isi nama Sub Menu terlebih dahulu
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="menu">Pilih Nama Menu</label>
                                            <select name="id_user_menu" id="id_user_menu" class="choices form-control">
                                                <option disabled selected>Pilih Menu</option>
                                                <?php foreach ($menu as $m) : ?>
                                                    <?php if ($data_submenu['id_user_menu'] == $m['id_user_menu']) : ?>
                                                        <option value="<?= $m['id_user_menu']; ?>" selected><?= $m['menu']; ?></option>
                                                    <?php else : ?>
                                                        <option value="<?= $m['id_user_menu']; ?>"><?= $m['menu']; ?></option>
                                                    <?php endif ?>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                Silahkan isi menu terlebih dahulu
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="menu">Sub Menu URL</label>
                                            <input type="text" name="url" class="form-control" required autofocus placeholder="Masukkan URL sub menu" value="<?= $data_submenu['url'] ?>">
                                            <div class="invalid-feedback">
                                                Silahkan isi Sub Menu URL terlebih dahulu
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="menu">Icon Sub Menu</label>
                                            <input type="text" name="icon" class="form-control" required autofocus placeholder="Masukkan Icon Sub Menu" value="<?= $data_submenu['icon'] ?>">
                                            <div class="invalid-feedback">
                                                Silahkan isi Sub Menu Icon terlebih dahulu
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="menu">Note Sub Menu</label>
                                            <input type="text" name="note" class="form-control" required autofocus placeholder="Masukkan Note Sub Menu" value="<?= $data_submenu['note'] ?>">
                                            <div class="invalid-feedback">
                                                Silahkan isi Sub Menu Note terlebih dahulu
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="menu">Status Aktif Sub Menu</label>
                                            <br>
                                            <label class="custom-switch mt-2">
                                                <?php if ($data_submenu['is_active'] == 1) : ?>
                                                    <input type="checkbox" name="is_active" class="custom-switch-input" checked>
                                                <?php else : ?>
                                                    <input type="checkbox" name="is_active" class="custom-switch-input">
                                                <?php endif; ?>
                                                <span class="custom-switch-indicator"></span>
                                                <span class="custom-switch-description">Aktif</span>
                                            </label>
                                            <div class="invalid-feedback">
                                                Silahkan centang terlebih dahulu
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <a href="<?= base_url() ?>subMenu" class="btn btn-warning">Kembali</a>
                                            <button type="submit" class="btn icon icon-left btn-success"><i data-feather="check-circle"></i>
                                                Simpan Perubahan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    </section>