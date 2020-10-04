<?php
	class suporteController extends Controller{
		
		public function __construct(){

			$_SESSION['area'] = 'suporte';
		}

		public function index(){
			$dados = array();
			$this->loadTemplate("suporte", $dados);
		}
	}
?>