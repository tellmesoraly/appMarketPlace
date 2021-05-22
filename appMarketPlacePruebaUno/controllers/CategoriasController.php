<?php 
class CategoriasController {

	static public function listarCategoriasCtl () {

		$result = CategoriasModelo::listarCategoriasModel(); //todo pegado x3

		return $result;
	}
}

