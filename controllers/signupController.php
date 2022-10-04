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

	if(!empty($_POST)){

		# El controlador "signupController.php" valida el tipo de dato y la longitud de los inputs
		# del formulario de registro en base a los campos de la base de datos para registra un nuevo usuario.

		# Nombres reales de los inputs del formulario de registro.
		$real_name_inputs = array(
			'signup-username',			# 0
			'signup-name',				# 1
			'signup-lastname',			# 2
			'signup-email',				# 3
			'signup-password',			# 4
			'signup-password-confirm',		# 5
			'signup-cp',				# 6
			'signup-address',			# 7
			'signup-house-number',			# 8
			'signup-phone'				# 9
		);

		# Define alias para los nombres de los inputs del formulario, el tipo de dato y la longitud máxima para ese campo.
		$alias_inputs = array(
			'username'			=> array($real_name_inputs[0],0,35),
			'name'				=> array($real_name_inputs[1],0,50),
			'lastname'			=> array($real_name_inputs[2],0,50),
			'email'				=> array($real_name_inputs[3],2,256),
			'password'			=> array($real_name_inputs[4],0,35),
			'password-confirm'	=> array($real_name_inputs[5],0,35),
			'cp'				=> array($real_name_inputs[6],1,5),
			'address'			=> array($real_name_inputs[7],0,50),
			'house-number'		=> array($real_name_inputs[8],1,NULL),
			'phone'				=> array($real_name_inputs[9],0,10)
		);

		require_once('../libs/check-form.php');
		
		# Retorna un array con todos los datos recibidos desde el formulario.
		$data_form = check_form($alias_inputs);

		# Comprueba que la contraseña sea la misma en la confirmación.
		check_password($data_form ['password'],$data_form['password-confirm']);

		# Cifra la contraseña del usuario.
		$data_form['password'] = password_hash($data_form['password'],PASSWORD_DEFAULT,array('cost' => 12));
		$data_form['password-confim'] = $data_form['password'];
		
		# WEB de la API: <https://api-sepomex.hckdrk.mx>
		function get_location_user($address,$zip_cp){
			if(empty($zip_cp) || empty($address)){
				bad_request_form();
			}
			else{
				$query_api_cp = file_get_contents("https://api-sepomex.hckdrk.mx/query/info_cp/$zip_cp?type=simplified");
				if($query_api_cp){

					$user_location = json_decode($query_api_cp,true);

					$index_json = array(
						'response',
						'asentamiento',
						'municipio',
						'estado'		
					);
					$location = array(
						$user_location[$index_json[0]][$index_json[1]],
						$user_location[$index_json[0]][$index_json[2]],
						$user_location[$index_json[0]][$index_json[3]]
					);

					return "$address, {$location[0][count($location[0])-1]}, $location[1], $location[2]";			
				}
				else{
					bad_request_form();
				}			
			}
		}


		$data_form['address'] = get_location_user($data_form['address'],$data_form ['cp']);	
		
		require_once('../models/signupModel.php');

		$new_user = new class_signup();

		$new_user -> register($data_form);

		header('Location: ../login.html');
		
	}
	else{
		exit('<p>ERROR 404 Not Found Page.</p>');
	}

?>