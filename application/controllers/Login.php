<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Global_m');
	}

	public function index()
	{
		$this->load->view('formlogin_v');
	}

	public function ceklogin(){
		$user=$this->input->post('username');
		$pass=$this->input->post('password');

		$key="!@#$%^&*";
		$password=$key."".$pass."".$key;

		//echo "password = ",$pass,"<br>";
		//echo "password + Key = ".$password."<br>";
		//echo "password md5 = ".md5($password)."<br>";
		$where = array(
			'username' => $user,
			'password' => md5($password)
		);

		$datauser=$this->Global_m->ceklogin_m('login',$where);

		foreach($datauser->result() as $dt) {
			$nama=$dt->nama;
			$email=$dt->email;
		}

		//echo "Nama Anda Adalah : ".$nama;
		//echo "Email Anda Adalah : ".$email;
		if($datauser->num_rows()>0){
			$data_session = array(
				'nama' => $nama,
				'email' => $email,
				'username' => $user
			);
			$this->session->set_userdata($data_session);
			redirect(base_url('menuutama'));
		}else{
			?>
				<script type="text/javascript">
					alert("Maaf Username atau Password Anda Salah!!");
					window.open("<?php echo base_url()."Login" ?>","_self");
				</script>
			<?php
		}

	}
}