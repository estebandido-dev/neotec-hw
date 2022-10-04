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
		# Nombres reales de los inputs del formulario de login.
		$real_name_inputs = array(
			'login-user',
			'login-password'
		);

		# Define alias para los nombres de los inputs del formulario, el tipo de dato y la longitud máxima para ese campo.
		$alias_inputs = array(
			'user'		=> array($real_name_inputs[0],0,256),
			'password'	=> array($real_name_inputs[1],0,35)
		);
		
		require_once('../libs/check-form.php');
		
		# Retorna un array con todos los datos recibidos desde el formulario.
		$data_form = check_form($alias_inputs);
		
		require_once('../models/loginModel.php');
		
		$user_login = new class_login($data_form);
		
		# Crea un nueva sesión para el usuario retornando su ID y su username,
		# además redirige la página al catálogo de productos.
		$user_login -> user_session();
		
		header('Location: ../views/catalogo.php');
	}
	else{
		exit('<p>ERROR 404 Not Found Page.</p>');	
	}

?>