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

	require_once('../libs/connection-db.php');

	class class_login extends class_db{
		
		private $table_login = 'company_login';
		private $table_cols_login = array(
			'login_username',	# 0
			'login_email',		# 1
			'login_password'	# 2
		);
		private $user_data;
		private $session_keys = array(
			'user-username'
		);
		
		public function __construct($user){
						
			# Sentencia SQL para extraer el username o el email para comprobar si el usuario se encuentra registrado.					
			if(check_email($user['user'])){
				$query_login = "
					SELECT
					{$this -> table_cols_login[0]},
					{$this -> table_cols_login[2]}
					FROM {$this -> table_login}
					WHERE {$this -> table_cols_login[1]}='{$user['user']}';";
			}
			else{
				$query_login = "
					SELECT 
					{$this -> table_cols_login[0]},
					{$this -> table_cols_login[2]}
					FROM {$this -> table_login}
					WHERE {$this -> table_cols_login[0]}='{$user['user']}';";	
			}
			
			parent::__construct();
			
			try{
				# Retorna un array indexado con el username y la contraseña del usuario.
				$query_exec = $this -> connection_instance -> prepare($query_login);
				$query_exec -> execute();
				$this -> user_data = $query_exec -> fetch(PDO::FETCH_NUM);
				unset($query_login,$query_exec);
			}
			catch(PDOException $e){
				exit("<p>ERROR al consultar su login desde la base de datos: {$e -> getMessage()}</p>");
			}

			parent::__destruct();
						
			if(empty($this -> user_data)){
				exit('<p>ERROR 400 Bad Request, usuario incorrecto.</p>');
			}
			else{
				# Comprueba si la contraseña del usuario es la correcta.
				if(!(password_verify($user['password'],$this -> user_data[1]))){
					exit('<p>ERROR 400 Bad Request, contraseña incorrecta.</p>');
				}
				else{
					unset($this -> user_data[1]);
				}		
			}			
		}
		
		public function __destruct(){
			$this -> user_data = null;
		}
		
		# "user_session()" crea una nueva sesión manteniendo el username del usuario
		# cuando inicia sesión.
		public function user_session(){
			session_start();
			$_SESSION[$this -> session_keys[0]] = $this -> user_data[0];
		}
	}

?>