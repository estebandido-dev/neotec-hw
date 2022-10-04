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

	require_once('../libs/check-session.php');

	if(!(empty($_POST)) && !(empty($_SESSION))){
		# Nombres reales de los inputs del formulario de contacto.
		$inputs = array(
			'producto' => 'producto-nombre',
			'cantidad' => 'producto-cantidad',
			'precio' => 'producto-precio',
			'usuario' => 'user-nombre',
			'domicilio' => 'user-domicilio',
			'numero' => 'user-num',
			'telefono' => 'user-telefono',
			'email' => 'user-email'
		);
		
		$pedido = array();
		
		foreach($inputs as $key => $value){
			if(isset($_POST[$value])){
				$tmp = $_POST[$value];
				if(empty($tmp)){
					not_page_access();
				}
				else{
					$pedido[$key] = $_POST[$value];
				}
			}
			else{
				not_page_access();	
			}
		}
		unset($tmp);
		
		unset($_POST);
	
		# Define la dirección del correo electrónico para el servicio de email de pedidos,
		# además se define el nombre de la empresa o persana quien envía los emails.
		$email_company = array('durmonsito22@gmail.com','NeoTec');
		
		require_once('../models/emailModel.php');
		$email_contact = new class_email($email_company[0]);
		
		# Prepara y envía los datos del usuario al servicio.
		$email_contact -> prepare_email(
			$pedido['email'],							# Email del remitente (usuario).
			"Servicio de Pedidos {$email_company[1]}",	# Nombre del destinatario (empresa),
			$email_company[0]							# Email del destinatario.
		);
		
		# Define en HTML el cuerpo del email del pedido con los datos del usuario.
		$format_email_pedido="
			<p><b>Comprobante:</b></p>
			<ul>
				<li>
					<b>Datos del cliente</b>:
				<ul>
					<li><i>Nombre completo</i>: {$pedido['usuario']}</li>
					<li><i>Domicilio</i>: {$pedido['domicilio']}</li>
					<li><i>Número interno</i>: {$pedido['numero']}</li>
					<li><i>Número teléfonico</i>: {$pedido['telefono']}</li>
					<li><i>Email</i>: {$pedido['email']}</li>
				</ul>
				</li>
				<li>
					<b>Datos del producto</b>:
				<ul>
					<li><i>Producto</i>: {$pedido['producto']}</li>
					<li><i>Cantidad</i>: {$pedido['cantidad']}</li>
					<li><i>Precio Total</i>: \${$pedido['precio']}</li>
				</ul>
				</li>
			</ul>
		";	
		
		$email_contact -> send_email(
			'Pedidos del cliente',	# Asunto del email.
			$format_email_pedido	# Cuerpo del email.
		);
		
		# Prepa la información de origen y destino del email como respuesta al email de pedidos.
		$email_contact -> prepare_email(
			$email_company[1],		# Email del remitente (empresa).
			$pedido['usuario'],		# Nombre del destinatario (usuario).
			$pedido['email']		# Email del destinatario.
		);
		
		
		$format_email_comprobante = "
			<p>Gracias por confiar en {$email_company[1]}, <b>{$pedido['usuario']}</b>.</p>
			<p>En breve un agente de {$email_company[1]} se comunicará con usted para completar su pedido.</p>
			$format_email_pedido
			<hr>
			<footer>
				<p><b>{$email_company[1]}</b></p>
				<p><i>Equipos de computo, hardware y accesorios.</i></p>
				<p><a href=\"mailto:dumnsito22@gmail.com\">dumonsito22@gmail.com</a></p>
			</footer>
		";
			
		# Establece el asunto y el cuerpo del email para ser envíado.
		$email_contact -> send_email(
			"Pedidos {$email_company[1]}",	# Asunto del email.
			$format_email_comprobante		# Cuerpo del email.
		);
		
		header('Location: ./catalogo.php');
		
	}
	else{
		not_found_page();
	}
?>