<?php
class Barang extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_kategori');
		$this->load->model('m_barang');
		// $this->load->library('barcode');
	}
	function index(){
	if($this->session->userdata('akses')){
		$data['data']=$this->m_barang->tampil_barang();
		$data['kat']=$this->m_kategori->tampil_kategori();
		$data['kat2']=$this->m_kategori->tampil_kategori();
		$this->load->view('admin/v_barang',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function tambah_barang(){
	if($this->session->userdata('akses')){
		$kobar=$this->m_barang->get_kobar();
		$nabar=$this->input->post('nabar');
		$kat=$this->input->post('kategori');
		$satuan=$this->input->post('satuan');
		$harpok=str_replace(',', '', $this->input->post('harpok'));
		$harjul=str_replace(',', '', $this->input->post('harjul'));
		
		$stok=$this->input->post('stok');
		$this->m_barang->simpan_barang($kobar,$nabar,$kat,$satuan,$harpok,$harjul,$stok);

		redirect('admin/barang');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function edit_barang(){
	if($this->session->userdata('akses')){
		$kobar=$this->input->post('kobar');
		$nabar=$this->input->post('nabar');
		$kat=$this->input->post('kategori');
		$satuan=$this->input->post('satuan');
		$harpok=str_replace(',', '', $this->input->post('harpok'));
		$harjul=str_replace(',', '', $this->input->post('harjul'));
		$stok=$this->input->post('stok');
		$this->m_barang->update_barang($kobar,$nabar,$kat,$satuan,$harpok,$harjul,$stok);
		redirect('admin/barang');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function edit_stok(){
	
	if($this->session->userdata('akses')){
		$kobar=$this->input->post('kobar');
		$nabar=$this->input->post('nabar');
		$kat=$this->input->post('kategori');
		$satuan=$this->input->post('satuan');
		$barang_distributor=$this->input->post('barang_distributor');
		$barang_masuk=$this->input->post('barang_masuk');
		$harpok=str_replace(',', '', $this->input->post('harpok'));
		$harjul=str_replace(',', '', $this->input->post('harjul'));
		$stok=$this->input->post('stok');
		$stok_update=$stok + $barang_masuk;
		
		$this->m_barang->update_stok($kobar,$nabar,$kat,$satuan,$harpok,$harjul,$stok_update,$barang_distributor,$barang_masuk);
		redirect('admin/barang');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function hapus_barang(){
	if($this->session->userdata('akses')){
		$kode=$this->input->post('kode');
		$this->m_barang->hapus_barang($kode);
		redirect('admin/barang');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
}