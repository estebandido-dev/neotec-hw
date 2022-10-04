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

	function not_page_access(){
		exit('<p>ERROR 401 Page Unauthorized</p>');	
	}

	function not_found_page(){
		exit('<p>ERROR 404 Not Found Page.</p>');	
	}

	# Cierra una sessión reanudada.
	function close_session(){
		session_unset();
		session_destroy();
	}

	# Comprueba si el nombre de los campos son los correctos.
	function check_session(){	
		$session_names = array(
			'user-username'
		);
		foreach($session_names as $itr){
			if(!isset($_SESSION[$itr])){
				close_session();
				not_page_access();	
			}
		}
	}


	# Reanuda la sesión del usuario.
	session_start();

	if(!empty($_SESSION)){
				
		# Comprueba los nombres de las claves de "$_SESSION".
		check_session();		
	}
	else{
		# Si no se inicia sesión por login destruye la sesión.
		close_session();
		//not_found_page();
		header('Location: ../index.html');
	}

?>