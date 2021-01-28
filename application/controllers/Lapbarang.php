<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lapbarang extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Global_m');
	}

	public function index()
	{
		$this->load->view('header_v');
		$this->load->view('lapbarang_v');
		$this->load->view('footer_v');
	}
	public function cetakexcel(){
		$filter=$this->input->get('filter');
		$nm_barang=$this->input->get('nm_barang');
		$kd_barang=$this->input->get('kd_barang');
		
		if($filter=="kode"){
			$field='kd_barang';
			$datafield=$kd_barang;
		}else{
			$field='nm_barang';
			$datafield=$nm_barang;
		}
		
		$where = array(
			$field => $datafield
		);
		$data['laporan']=$this->Global_m->data_laporan($where,'barang');
		$data['filter']=$filter;
		$this->load->view('lapbarang_excel_v',$data);
	}
	public function cetakpdf(){
		$filter=$this->input->get('filter');
		$nm_barang=$this->input->get('nm_barang');
		$kd_barang=$this->input->get('kd_barang');
		
		if($filter=="kode"){
			$field='kd_barang';
			$datafield=$kd_barang;
		}else{
			$field='nm_barang';
			$datafield=$nm_barang;
		}
		
		$where = array(
			$field => $datafield
		);
		$data['laporan']=$this->Global_m->data_laporan($where,'barang');
		$data['filter']=$filter;
		$this->load->view('lapbarang_pdf_v',$data);
	}
}
