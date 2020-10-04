<?php 
	class Mensagens extends Model{
		public function sendmessage($id_chamado, $origem, $msg){
			if (!empty($id_chamado) && !empty($msg)) {
				$sql = "INSERT INTO mensagens SET id_chamado = '$id_chamado', mensagem  = '$msg', origem = '$origem', data_enviado = NOW()";

				$sql= $this->connect->query($sql);
			}
		}

		public function getMessage($id_chamado, $last_msg){
			$array = array();

			$sql = "SELECT * FROM mensagens WHERE id_chamado = '$id_chamado' AND data_enviado > '$last_msg'";

			$sql = $this->connect->query($sql);

			if ($sql->rowCount() > 0) {
				$array = $sql->fetchAll();
				foreach ($array as $key => $value) {
					$array[$key]['data_enviado'] = date('H:i', strtotime($value['data_enviado']));
				}
			}

			$c = new Chamados();
			$c->updateLastMsg($id_chamado, $_SESSION['area']);

			return $array;
		}
	}