<?php 
	//include_once('config.php'); 
	class Model{
		protected $db;
		public function __construct(){
			$this->db = new mysqli('www.db4free.net' , 'adminhipermedial', 'Hipermedial7432', 'base_correo');
			if($this->db->connect_errno){
				exit();
			}
			$this->db->set_charset(utf8_general_ci);
		}
	}
?>