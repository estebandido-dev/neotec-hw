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

	class class_buy extends class_db{
		# Datos escenciales para confirmar un pedido.
		# Nombre completo del usuario.
		# Domicilio completo del usuario.
		# Número teléfonico.
		private $table_users = 'company_users';
		private $table_login = 'company_login';
		private $table_cols_users = array(
			'user_name',		# 0
			'user_lastname',	# 1
			'user_cp',			# 2
			'user_address',		# 3
			'user_home_number',	# 4
			'user_phone',		# 5
			'login_email',		# 6
			'login_username',	# 7
			'user_id',			# 8
			'login_id'			# 9
		);
		private $user_sql;
		
		public function __construct($user){
				parent::__construct();
				try{
					# Sentencia SQL para obtener los datos del usuario para confirmar un pedido.
					$query = "
						SELECT {$this -> table_users}.{$this -> table_cols_users[0]},
						{$this -> table_users}.{$this -> table_cols_users[1]},
						{$this -> table_users}.{$this -> table_cols_users[2]},
						{$this -> table_users}.{$this -> table_cols_users[3]},
						{$this -> table_users}.{$this -> table_cols_users[4]},
						{$this -> table_users}.{$this -> table_cols_users[5]},
						{$this -> table_login}.{$this -> table_cols_users[6]}
						FROM {$this -> table_users},{$this -> table_login}
						WHERE {$this -> table_login}.{$this -> table_cols_users[7]}='$user' AND
						{$this -> table_users}.{$this -> table_cols_users[8]}={$this -> table_login}.{$this -> table_cols_users[9]};";

					# Retorna un array indexado con los datos del usuario.
					$query_exec = $this -> connection_instance -> prepare($query);

					$query_exec -> execute();
					$user_data = $query_exec -> fetch(PDO::FETCH_NUM);
					unset($query,$query_exec);
				}
				catch(PDOException $e){
					exit("<p>ERROR al consultar sus datos desde la base de datos: {$e -> getMessage()}</p>");
				}

				parent::__destruct();
			
				if(empty($user_data)){
					exit('<p>401 User Unauthorized</p>');
				}
				else{
					$this -> user_sql = $user_data;
					unset($user_data);
				}
		}
		
		public function __destruct(){
			$this -> user_sql = null;
		}
		
		public function buy_data(){
			$user_buy = array();
			$user_buy['nombre'] = $this -> user_sql[0] . ' ' . $this -> user_sql[1];
			$user_buy['domicilio'] = $this -> user_sql[3] . ' (' .$this -> user_sql[2] . ')';
			$user_buy['num-interior'] = $this -> user_sql[4];
			$user_buy['telefono'] = $this -> user_sql[5];
			$user_buy['email'] = $this -> user_sql[6];
			return $user_buy;
		}
		
	}
?>