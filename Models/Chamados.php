<?php 
	class Chamados extends Model{
		public function getChamados(){
			$array = array();

			$sql = "SELECT * FROM `chamados` WHERE status IN(0,1)";

			$sql = $this->connect->query($sql);

			if ($sql->rowCount() > 0) {
				$array = $sql->fetchAll();
			}

			return $array;
		}

		public function getChamado($id){
			$array = array();

			if(!empty($id)){
				$sql = "SELECT * FROM chamados WHERE id = '$id'";
				$sql = $this->connect->query($sql);

				if ($sql->rowCount() > 0) {
					$array = $sql->fetch();
				}
			}

			return $array;
		}

		public function updateStatus($id, $status){
			if (!empty($id) && !empty($status)) {
				$sql = "UPDATE chamados SET status = '$status' WHERE id = '$id'";

				$sql = $this->connect->query($sql);
			}
		}

		public function addChamado($ip, $nome, $data_inicio){
			$id = 0;

			$sql = "INSERT INTO chamados SET ip = '$ip', nome = '$nome', data_inicio = '$data_inicio', status = '0'";
 			$sql = $this->connect->query($sql);

 			$id =  $this->connect->lastInsertId();

 			return $id;
		}

		public function getLastMsg($id_chamado, $area){
			$dt = '';

			if (!empty($id_chamado) && !empty($area)) {
				$sql = "SELECT data_last_".$area." as dt FROM chamados WHERE id = '$id_chamado'";
				$sql = $this->connect->query($sql);
				
				if ($sql->rowCount() > 0) {
					$sql = $sql->fetch();
					$dt = $sql['dt'];
				}
			}

			return $dt;
		}

		public function updateLastMsg($id_chamado, $area){
			if (!empty($id_chamado) && !empty($area)) {
				$sql = "UPDATE chamados SET data_last_".$area." = NOW() WHERE id = '$id_chamado'";
				$sql = $this->connect->query($sql);
			}
		}
	}
?>