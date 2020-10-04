<?php
	class clienteController extends Controller{
		
		public function __construct(){

			$_SESSION['area'] = 'cliente';
		}

		public function index(){
			$dados = array();
			$this->loadTemplate('cliente', $dados);
		}
	}
?>