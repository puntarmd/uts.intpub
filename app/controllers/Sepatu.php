<?php
class Sepatu extends Controller
{
    public function index()
    {
        $data['title'] = 'Data Sepatu';
        $data['sepatu'] = $this->model('SepatuModel')->getAllSepatu();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('sepatu/index', $data);
        $this->view('templates/footer');
    }

    public function cari()
    {
        $data['title'] = 'Data Sepatu';
        $data['sepatu'] = $this->model('SepatuModel')->cariSepatu();
        $data['key'] = $_POST['key'];
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('sepatu/index', $data);
        $this->view('templates/footer');
    }

    public function edit($id)
    {
        $data['title'] = 'Detail sepatu';
        $data['kategori'] = $this->model('KategoriModel')->getAllKategori();
        $data['sepatu'] = $this->model('sepatuModel')->getSepatuById($id);
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('sepatu/edit', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Sepatu';
        $data['kategori'] = $this->model('KategoriModel')->getAllKategori();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('sepatu/create', $data);
        $this->view('templates/footer');
    }

    public function simpanSepatu()
    {
        if ($this->model('SepatuModel')->tambahSepatu($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'ditambahkan', 'success');
            header('location: ' . base_url . '/sepatu');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
            header('location: ' . base_url . '/sepatu');
            exit;
        }
    }

    public function updateSepatu()
    {
        if ($this->model('SepatuModel')->updateDataSepatu($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'diupdate', 'success ');
            header('location: ' . base_url . '/sepatu');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'diupdate', 'danger');
            header('location: ' . base_url . '/sepatu');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('SepatuModel')->deleteSepatu($id) > 0) {
            Flasher::setMessage('Berhasil', 'dihapus', 'success');
            header('location: ' . base_url . '/sepatu');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'dihapus', 'danger');
            header('location: ' . base_url . '/sepatu');
            exit;
        }
    }

    public function lihatlaporan()
    {
        $data['title'] = 'Data Laporan Sepatu';
        $data['sepatu'] = $this->model('SepatuModel')->getAllSepatu();
        $this->view('sepatu/lihatlaporan', $data);
    }
    public function laporan()
    {
        $data['sepatu'] = $this->model('SepatuModel')->getAllSepatu();
        $pdf = new FPDF('p', 'mm', 'A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 14);
        // mencetak string
        $pdf->Cell(190, 7, 'LAPORAN SEPATU', 0, 1, 'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(85, 6, 'NAMA', 1);
        $pdf->Cell(30, 6, 'MEREK', 1);
        $pdf->Cell(30, 6, 'WARNA', 1);
        $pdf->Cell(15, 6, 'UKURAN', 1);
        $pdf->Cell(30, 6, 'HARGA', 1);
        $pdf->Cell(25, 6, 'KATEGORI', 1);
        $pdf->Ln();
        $pdf->SetFont('Arial', '', 10);
        foreach ($data['sepatu'] as $row) {
            $pdf->Cell(85, 6, $row['nama'], 1);
            $pdf->Cell(30, 6, $row['merek'], 1);
            $pdf->Cell(30, 6, $row['warna'], 1);
            $pdf->Cell(15, 6, $row['ukuran'], 1);
            $pdf->Cell(30, 6, $row['harga'], 1);
            $pdf->Cell(25, 6, $row['nama_kategori'], 1);
            $pdf->Ln();
        }
        $pdf->Output('D', 'Laporan Sepatu.pdf', true);
    }
}
