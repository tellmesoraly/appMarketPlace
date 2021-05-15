<?php

class ArticulosController {

	static public function listarArticulosCtl () {

		$result = ArticulosModelo::listarArticulosModel();
		return $result;

	}

	static public function listarArticulosPorCategoria ($idCategoria, $order) {

		$result = ArticulosModelo::listarArticulosPorCategoriaModel($idCategoria, $order);
		return $result;

	}

	static public function listaArticulosPorPalabraClave($palabraClave) {

		$result = ArticulosModelo::listarArticulosPorPalabraClaveModel($palabraClave);
		return $result;

	}

	static public function listarArticulosPorUsuario($idUsuario){
		$result = ArticulosModelo::listarArticulosPorUsuarioModel($idUsuario);
		return $result;
	}
}

