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

	function bad_request_form(){
		exit('<p>ERROR 400 Bad Request, no se procesará la solicitud del formulario.</p>');
	}

	function check_email($email){
		if(filter_var($email, FILTER_VALIDATE_EMAIL)){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	# "check_form()" comprueba el contenido de los inputs de un formulario
	# y retorna un array asociativo indexado por alias,
	# recibe como parametros un array sociativo que contiene otro array con tres valores:
	#		ARRAY['ALIAS'] => [0] = Nombre del input.
	#		ARRAY['ALIAS'] => [1] = Tipo de dato a convertir(por defecto es string).
	#		ARRAY['ALIAS'] => [2] = Longitud máxima para input.

	function check_form($array_input_form){
		if(is_array($array_input_form)){
			$data = array();
			foreach($array_input_form as $key => $value){
				if(isset($_POST[$value[0]])){
					$tmp = $_POST[$value[0]];
					if(empty($tmp)){
						bad_request_form();
					}
					else{
						# 0 - string
						# 1 - int
						# 2 - email
						switch($value[1]){
							case 0:
								$data[$key] = (string)$tmp;
								if(strlen($data[$key]) > $value[2]){
									bad_request_form();
								}
								break;
							case 1:
								$data[$key] = (int)$tmp;
								if($data[$key] > 0 && $value[2] === NULL){
									break;
								}
								elseif(strlen($data[$key]) > $value[2] || $data[$key] <= 0){
									bad_request_form();
								}
								break;
							case 2:
								$data[$key] = (string)$tmp;
								if(filter_var($data[$key], FILTER_VALIDATE_EMAIL)){
									if(strlen($data[$key]) > $value[2]){
										bad_request_form();
									}
								}
								else{
									bad_request_form();
								}
								break;
						}
					}
				}
			}
			unset($_POST);
			return $data;
		}
		else{
			unset($_POST);
			bad_request_form();
		}
	}

	function check_password($pass,$pass2){
		if($pass===$pass2){
			if(ctype_graph($pass) && strlen($pass) > 0){
				return TRUE;
			}
			else{
				bad_request_form();
			}
		}
		else{
			bad_request_form();
		}
	}
?>