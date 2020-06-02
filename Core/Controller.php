<?php
class Controller {

	public function loadView(string $viewName, array $viewData = array()) {
		extract($viewData);
		require 'Views/'.$viewName.'.php';
	}

	public function loadTemplate(string $viewName, array $viewData = array()) {
		require 'Views/template.php';
	}

	public function loadViewInTemplate(string $viewName, array $viewData = array()) {
		extract($viewData);
		require 'Views/'.$viewName.'.php';
	}

	public function loadViewPdf(string $viewName, array $viewData = array()) {
		extract($viewData);
		require 'Views/Pdf/'.$viewName.'.php';
	}

}