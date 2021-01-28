<?php

class Global_m extends CI_Model
{
	
	function ceklogin_m($table,$kondisi)
	{
		return $this->db->get_where($table,$kondisi);
	}
	
	function getbarang(){
		$page = $this->input->post('page');
		$rows = $this->input->post('rows');
		$sort = 'kd_barang';
		$order = 'desc'; 
		$offset = ($page-1) *$rows;
		
		$result = array();
		$totaldata = $this->db->get('barang')->num_rows();
		$result['total'] = $totaldata;
		
		$this->db->select('*');
		$this->db->from('barang');
		$this->db->order_by($sort, $order);
		$this->db->limit($rows,$offset);
		$data = $this->db->get();
		
		$items = array();
		foreach($data->result() as $dt) {
			array_push($items,$dt);
		}
		$result['rows'] = $items;
		
		//echo $this-?db->last_query();
		echo json_encode($result);
	}	
	
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	function data_laporan($where,$table){
		$this->db->like($where);
		return $this->db->get($table);
	}
	
}

?>