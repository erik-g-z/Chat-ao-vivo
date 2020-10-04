<?php
	class Controller{
		public function loadView($viewName, $viewData = array()){
			extract($viewData);
			require_once("Views/".$viewName.".php");
		}

		public function loadTemplate($viewName, $viewData = array()){
			require_once("Views/Template.php");
		}

		public function loadViewInTemplate($viewName, $viewData = array()){
			extract($viewData);
			require_once("Views/".$viewName.".php");
		}
	}
?>