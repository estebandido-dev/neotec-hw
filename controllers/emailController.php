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

	# Envía un email desde el formulario de contacto.
	if(!empty($_POST)){	
		
		# Nombres reales de los inputs del formulario de contacto.
		$real_name_inputs = array(
			'user-name',		# 0
			'user-email',		# 1
			'user-text-email'	# 2
		);
		
		# Define alias para los nombres de los inputs del formulario, el tipo de dato y la longitud máxima para ese campo.
		$alias_inputs = array(
			'name'			=> array($real_name_inputs[0],0,35),
			'email'			=> array($real_name_inputs[1],2,256),
			'body-email'	=> array($real_name_inputs[2],0,256)
		);
		
		require_once('../libs/check-form.php');
		
		# Retorna un array con todos los datos recibidos desde el formulario.
		$data_form = check_form($alias_inputs);		
		
		# Define la dirección del correo electrónico para el servicio de email de contacto,
		# además se define el nombre de la empresa o persana quien envía los emails.
		$email_company = array('durmonsito22@gmail.com','NeoTec');
				
		require_once('../models/emailModel.php');
		
		$email_contact = new class_email($email_company[0]);
				
		# Prepara y envía el email del usuario que quiere contactar con el servicio.
		$email_contact -> prepare_email(
			$data_form['email'],						# Email del remitente (usuario).
			"Servicio de Consulta {$email_company[1]}",	# Nombre del destinatario (empresa),
			$email_company[0]							# Email del destinatario.
		);
		
		# Define en HTML el cuerpo del email que el usuario escribió para contactar con el servicio.
		$format_email_user="
			<p><b>Consultas:</b></p>
			<p><i>Nombre del cliente</i>: <b>{$data_form['name']}</b></p>
			<p>{$data_form['body-email']}</p>
		";
		
		$email_contact -> send_email(
			'Consulta de usuario',	# Asunto del email.
			$format_email_user		# Cuerpo del email.
		);
		
		# Prepa la información de origen y destino del email como respuesta al email de contacto.
		$email_contact -> prepare_email(
			$email_company[1],		# Email del remitente (empresa).
			$data_form['name'],		# Nombre del destinatario (usuario).
			$data_form['email']		# Email del destinatario.
		);

		# Define en HTML el cuerpo del email de respuesta de los emails de los usuarios.
		$format_contact_email="
			<p>Gracias por contactarnos <b>{$data_form['name']}</b>.</p>
			<p>En breve un agente de {$email_company[1]} se comunicará con usted.</p>
			<hr>
			<footer>
				<p><b>{$email_company[1]}</b></p>
				<p><i>Equipos de computo, hardware y accesorios.</i></p>
				<p><a href=\"mailto:dumnsito22@gmail.com\">dumonsito22@gmail.com</a></p>
			</footer>
		";
		
		# Establece el asunto y el cuerpo del email para ser envíado.
		$email_contact -> send_email(
			"Soporte al Cliente de {$email_company[1]}",	# Asunto del email.
			$format_contact_email							# Cuerpo del email.
		);
		
		header('Location: ../index.html');
	}
	else{
		exit('<p>ERROR 404 Not Found Page.</p>');
	}
?>