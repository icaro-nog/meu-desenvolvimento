<?php

namespace MF\Model;

use App\Connection;

// Responsável por instanciar um modelo de dado do banco de dados e juntamente instanciar uma conexão com o banco de dados
class Container {

	public static function getModel($model) {
		$class = "\\App\\Models\\".ucfirst($model);
		$conn = Connection::getDb();

		return new $class($conn);
	}
}


?>