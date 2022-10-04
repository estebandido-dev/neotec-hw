<?php

/*
   Copyright © 2020 Ricardo García Jiménez, Juan José Ramírez López,
                    Esteban López Elizarraraz

   Licensed under the Apache License, Version 2.0 (the "License");
   you may not use this file except in compliance with the License.
   You may obtain a copy of the License at

       http://www.apache.org/licenses/LICENSE-2.0

   Unless required by applicable law or agreed to in writing, software
   distributed under the License is distributed on an "AS IS" BASIS,
   WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
   See the License for the specific language governing permissions and
   limitations under the License.
*/


	# "abstract" define métodos y atributos que no pueden ser instanciados.
	# La clase "class_db" realiza la conexión con la base de datos.
	abstract class class_db {
		
		## Atributos.
		# La siguiente sección define los datos del gestor de base de datos y la base de datos a utilizar.
		private $manager_db = 'mysql';
		private $host_db = 'localhost';
		private $name_db = 'company_db';
		private $user_db = 'root';
		private $password_db = 'root';
		private $charset_db = 'utf8mb4';
		protected $connection_instance;

		## Métodos.
		# El siguiente constructor realiza la conexión a la base de datos.
		public function __construct() {
			try {
				
				# "$dsn_db" define la cadena del origen de la base de datos (llamado DSN).
				$dsn_db = "{$this -> manager_db}:host={$this -> host_db};dbname={$this -> name_db}";
								
				# Se crea un instancia de la clase PDO.
				# La clase PDO representa una conexión entre PHP y un servidor de base de datos,
				# recibe como parametros el origen de la BASE DE DATOS, su USUARIO y CONTRASEÑA.
				$this -> connection_instance = new PDO($dsn_db, $this -> user_db, $this -> password_db);
				
				# El operador "->" realiza el llamado a métodos y atributos de clases.
				# El método "exec()" de la clase "PDO" ejecuta sentencias SQL.
				# Establece la códificación de carácteres para ingresar sentencias SQL.
				$this -> connection_instance -> exec("SET CHARACTER SET {$this -> charset_db}");
				
				# Establece la zona horaria para todas las funciones de fecha/hora si lo hubieran.
				date_default_timezone_set('Mexico/General');
				
				# El método "setAttrubute()" estable un atributo.
				# Establece "ATTR_ERRMODE" (reportes de errores) para lanzar reportes de excepciones (ERRMODE_EXCEPTION).
				$this -> connection_instance -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				# Deshabilita la simulación de sentencias preparadas, 
				# con ello el gestor de base de datos ejecutará consultas SQL con su propias características de consultas,
				# si está habilita, PDO envíara la consulta ya preparada con datos ya enlazados en sus parámetros, si lo hubieran,
				# e incluso puede omitir algunas restriccions del gestor de base de datos.
				$this -> connection_instance -> setAttribute(PDO::ATTR_EMULATE_PREPARES, false);				
			}
			catch(PDOException $e){
				exit("<p>ERROR al conectar la base de datos: {$e -> getMessage()}</p>");
			}
		}

		public function __destruct() {
			$this -> connection_instance = null;
		}
	}
?>