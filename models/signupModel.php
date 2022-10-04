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

	require_once ('../libs/connection-db.php');

	class class_signup extends class_db{
		private $table_login = 'company_login';
		private $table_users = 'company_users';
		private $table_cols_login = array(
			'login_id',			# 0
			'login_username',	# 1
			'login_email',		# 2
			'login_password'	# 3
		);
		private $table_cols_users = array(
			'user_id',			# 0
			'user_name',		# 1
			'user_lastname',	# 2
			'user_cp',			# 3
			'user_address',		# 4
			'user_home_number',	# 5
			'user_phone'		# 6
		);
		
		public function __construct(){
			parent::__construct();
		}
		
		public function __destruct(){
			parent::__destruct();
		}
		
		public function register($user_data){
			if(is_array($user_data)){
				try{
					
					# Sentencia SQL para obtener conincidencias de registros con el mismo email o username 
					# durante el registro de un nuevo usuario.
					$query_exists = "
						SELECT COUNT({$this -> table_cols_login[1]})
						FROM {$this -> table_login}
						WHERE {$this -> table_cols_login[1]}='{$user_data['username']}'
						OR {$this -> table_cols_login[2]}='{$user_data['email']}';";
					
					# Retorna un array indexado con el número de coincidencias de email y username.
					$query_result = $this -> connection_instance -> prepare($query_exists);
					$query_result -> execute();
					$user_exist = $query_result -> fetch(PDO::FETCH_NUM);
					unset($query_result,$query_exists);
					
					# Lanza un error si existen coincidencias de email o usuario,
					# retorn 0 si no encuentra ninguna coincidencia.
					if($user_exist[0]){
						exit('<p>ERROR, el usuario existe.</p>');
					}
					else{
						
						unset($user_exist);
						
						try{
														
							# Setencia SQL que registra los datos de login del usuario.
							$query_register_login = "
								INSERT INTO {$this -> table_login}(
								{$this -> table_cols_login[1]},
								{$this -> table_cols_login[2]},
								{$this -> table_cols_login[3]})
								VALUES(
								'{$user_data['username']}',
								'{$user_data['email']}',
								'{$user_data['password']}');";

							# Registra los datos del login del usuario en la base de datos.
							$query_insert = $this -> connection_instance -> prepare($query_register_login) -> execute();
							unset($query_register_login,$query_insert);
							
							
							# Sentencia SQL que obtine el identificador (llave primaria) del registro anterior
							# para conincidir con el identificador (llave foranea) para ingresarlo en la tabla de usuarioss.
							$query_check_id = "
								SELECT {$this -> table_cols_login[0]}
								FROM {$this -> table_login}
								WHERE {$this -> table_cols_login[2]}='{$user_data['email']}';";

							# Retorna un array indexado con el identificador del usuario.
							$query_result = $this -> connection_instance -> prepare($query_check_id);
							$query_result -> execute();
							$id_user = $query_result -> fetch(PDO::FETCH_NUM);
							unset($query_result);
							
							
							# Sentencia SQL que registra los datos personales del usuario.
							$query_register_user = "
								INSERT INTO {$this -> table_users}(
								{$this -> table_cols_users[0]},
								{$this -> table_cols_users[1]},
								{$this -> table_cols_users[2]},
								{$this -> table_cols_users[3]},
								{$this -> table_cols_users[4]},
								{$this -> table_cols_users[5]},
								{$this -> table_cols_users[6]})
								VALUES(
								$id_user[0],
								'{$user_data['name']}',
								'{$user_data['lastname']}',
								{$user_data['cp']},
								'{$user_data['address']}',
								{$user_data['house-number']},
								'{$user_data['phone']}');";
							
							# Registra los datos personales del usuario en la base de datos.
							unset($id_user[0]);
							$query_insert = $this -> connection_instance -> prepare($query_register_user) -> execute();
							unset($query_insert);
						}
						catch(PDOException $e){
							exit("<p>ERROR al registrar nuevo usuario: {$e -> getMessage()}</p>");
						}
					}
				}
				catch(PDOException $e){
					exit("<p>ERROR al comprobar si se encuentra registrado el email y el username: {$e -> getMessage()}</p>");
				}
			}
			else{
				exit('<p>ERROR, no se permite el tipo de dato para registrar</p>');
			}
		}
	}

?>