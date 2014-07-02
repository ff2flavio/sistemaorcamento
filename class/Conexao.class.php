<?php 
/*
developed by: Laio Pinheiro
laiopinheiro01@gmail.com 
*/
class Conexao{
	
	private $db_host = "localhost"; 
	private $db_user = "root"; 
	private $db_pass = "root"; 
	private $db_name = ""; 

	private $con = false;

	public function Conexao($db_name){
		$this->db_name = $db_name;
	}

	// Abre a coneccao e seleciona a base de dados =======================================================
	public function connect(){
		if(!$this->con){

			$myconn = @mysql_connect($this->db_host, $this->db_user, $this->db_pass);

			if($myconn){
				$seldb = @mysql_select_db($this->db_name, $myconn);

				if($seldb){
					$this->con = true;
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	//Encerra a coneccao ======================================================================================
	public function disconnect(){
		if($this->con){
			if(@mysql_close()){
				$this->con = false;
				return true;
			}else{
				return false;
			}
		}		
	}

}

?>