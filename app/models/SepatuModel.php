<?php
class SepatuModel
{
    private $table = 'sepatu';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllSepatu()
    {
        $this->db->query("SELECT sepatu.*, kategori.nama_kategori FROM " . $this->table . " JOIN kategori ON kategori.id = sepatu.kategori_id");
        return $this->db->resultSet();
    }

    public function getSepatuById($id)
    {
        $this->db->query('SELECT *FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahSepatu($data)
    {
        $query = "INSERT INTO sepatu (nama, merek, warna, ukuran, harga, kategori_id) VALUES(:nama, :merek, :warna, :ukuran, :harga, :kategori_id)";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('merek', $data['merek']);
        $this->db->bind('warna', $data['warna']);
        $this->db->bind('ukuran', $data['ukuran']);
        $this->db->bind('harga', $data['harga']);
        $this->db->bind('kategori_id', $data['kategori_id']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataSepatu($data)
    {
        $query = "UPDATE sepatu SET nama=:nama, merek=:merek, warna=:warna, ukuran=:ukuran, harga=:harga, kategori_id=:kategori_id WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('merek', $data['merek']);
        $this->db->bind('warna', $data['warna']);
        $this->db->bind('ukuran', $data['ukuran']);
        $this->db->bind('harga', $data['harga']);
        $this->db->bind('kategori_id', $data['kategori_id']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteSepatu($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function cariSepatu()
    {
        $key = $_POST['key'];
        $this->db->query("SELECT sepatu.*, kategori.nama_kategori FROM " . $this->table . " JOIN kategori ON kategori.id = sepatu.kategori_id WHERE nama LIKE :key");
        $this->db->bind('key', "%$key%");
        return $this->db->resultSet();
    }
}
