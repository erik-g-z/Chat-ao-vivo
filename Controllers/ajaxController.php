<?php
	class ajaxController extends Controller{
		public function __construct(){

		}

		public function index(){
			$dados = array();
		}

		public function sendMessage(){
			if (isset($_POST['msg']) && !empty($_POST['msg'])) {
				$msg = addslashes($_POST['msg']);
				$id_chamado = $_SESSION['chatWindow'];

				if ($_SESSION['area'] == 'suporte') {
					$origem = 0;
				}else{
					$origem = 1;
				}
				$m = new Mensagens();
				$m->sendmessage($id_chamado, $origem, $msg);
			}
		}

		public function getChamado(){
			$dados = array();
			
			$chamado = new Chamados();
			$dados['chamados'] = $chamado->getChamados();

			echo json_encode($dados);
		}

		public function getmessage(){
			$dados = array();

			$m = new Mensagens();
			$c = new Chamados();

			$id_chamado = $_SESSION['chatWindow'];
			$area = $_SESSION['area'];
			$last_msg = $c->getLastMsg($id_chamado, $area);
			
			$dados['mensagens'] = $m->getMessage($id_chamado, $last_msg);

			echo json_encode($dados);
		}
	}
?>