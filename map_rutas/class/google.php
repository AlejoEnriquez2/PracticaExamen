<?php
	include_once('conexion.php');
	class Google extends Model{

		public function __construct(){ 
     	 	parent::__construct(); 
    	}

	    public function get_lat_lng($value){
	    	$sql = $this->db->query("SELECT tienda_latitud, tienda_longitud FROM tbl_tienda WHERE tienda_id = '$value' LIMIT 1");
	    	$lat = 0; 
	    	$lng = 0; 
	    	foreach ($sql as $key){
	    		$lat = $key['tienda_latitud'];
	    		$lng = $key['tienda_longitud'];
	    	}	
	    	$array = array('lat' => $lat, 'lng' => $lng);
	    	return $array;
	    }

	    public function get_stores(){
	    	$sql = $this->db->query("SELECT tienda_id, tienda_nombre FROM tbl_tienda ORDER BY tienda_nombre");
	    	$option = '';
	    	foreach ($sql as $key){
	    		$id = $key['tienda_id'];
	    		$name = $key['tienda_nombre'];
	    		$option .= '<option value="'.$id.'">'.$name.' - B</option>';
	    	}
	    	return $option;
	    }
	}

	if(isset($_POST['value'])){
		$class = new Google;
		$run = $class->get_lat_lng($_POST['value']);
		exit(json_encode($run));
	}
?>