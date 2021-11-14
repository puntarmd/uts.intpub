<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $data['title']; ?></h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><?= $data['title']; ?></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="<?= base_url; ?>/sepatu/simpansepatu" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" placeholder="masukkan judul buku..." name="nama">
                    </div>
                    <div class="form-group">
                        <label>Merek</label>
                        <input type="text" class="form-control" placeholder="masukkan penerbit buku..." name="merek">
                    </div>
                    <div class="form-group">
                        <label>Warna</label>
                        <input type="text" class="form-control" placeholder="masukkan pengarang
buku..." name="warna">
                    </div>
                    <div class="form-group">
                        <label>Ukuran</label>
                        <input type="text" class="form-control" placeholder="masukkan tahun buku..." name="ukuran">
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" class="form-control" placeholder="masukkan harga buku..." name="harga">
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-control" name="kategori_id">
                            <option value="">Pilih</option>
                            <?php foreach ($data['kategori'] as $row) : ?>
                                <option value="<?= $row['id']; ?>"><?= $row['nama_kategori']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->