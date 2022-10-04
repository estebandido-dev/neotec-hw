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


	# Envía un email de contacto para pedidos.
	require_once('../libs/check-session.php');

	if(!(empty($_POST)) && !(empty($_SESSION))){
		# Nombres reales de los inputs del formulario de pedido.
		$real_name_inputs = array(
			'product-name',
			'product-quantity',
			'product-price'
		);
		# Define alias para los nombres de los inputs del formulario, el tipo de dato y la longitud máxima para ese campo.
		$alias_inputs = array(
			'producto'	=> array($real_name_inputs[0],0,256),
			'cantidad'	=> array($real_name_inputs[1],1,NULL),
			'precio'	=> array($real_name_inputs[2],1,NULL)
		);
		
		require_once('../libs/check-form.php');
		
		# Retorna un array con todos los datos recibidos desde el formulario.
		$data_form = check_form($alias_inputs);
		unset($_POST);
		
		# Obtiene los datos del usuario para confirmar su compra.
		require_once('../models/comprarModel.php');

		$user = new class_buy($_SESSION['user-username']);
		$table_user = $user -> buy_data();
	}
	else{
		not_found_page();	
	}
?>

<!DOCTYPE HTML>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" type="image/jpg" href="../Images/LogoNeoTec.png" />
		<link rel="stylesheet" href="../CSS/Comprar.css">
		<title>Pedidos</title>
	</head>
	<body>
		<header>
			<h2>Información del pedido</h2>
			<p>Verifique los datos del producto y su información personal</p>
		</header>		
		<form method="post" action="../views/pedidoEmail.php">
			<fieldset>
				<legend>Datos del producto</legend>
				<div>
					<label class="etiqueta" for="producto-nombre" >Producto:</label><br>
					<input class="form-input" name="producto-nombre" type="text" value="<?php echo $data_form['producto'];?>" required readonly>
				</div>
				<div>
					<label for="producto-cantidad" >Cantidad:</label><br>
					<input class="form-input" name="producto-cantidad" type="text" value="<?php echo $data_form['cantidad'];?>" required readonly>
				</div>
				<div>
					<label for="producto-precio" >Precio Total:</label><br>
					<input class="form-input" name="producto-precio" type="text" value="<?php echo $data_form['cantidad']*$data_form['precio'];?>" required readonly>
				</div>
			</fieldset>
			<fieldset>
				<legend>Datos personales</legend>
				<div>
					<label for="user-nombre" >Nombre Completo:</label><br>
					<input class="form-input" name="user-nombre" type="text" value="<?php echo $table_user['nombre'];?>" required readonly>
				</div>
				<div>
					<label for="user-domicilio" >Domicilio:</label><br>
					<input class="form-input" name="user-domicilio" type="text" value="<?php echo $table_user['domicilio'];?>" required readonly>
				</div>
				<div>
					<label for="user-num" >Nª Interno:</label><br>
					<input class="form-input" name="user-num" type="text" value="<?php echo $table_user['num-interior'];?>" required readonly>
				</div>
				<div>
					<label for="user-telefono" >Teléfono:</label><br>
					<input class="form-input" name="user-telefono" type="tel" value="<?php echo $table_user['telefono'];?>" required readonly>
				</div>
				<div>
					<label for="user-email" >Email:</label><br>
					<input class="form-input" name="user-email" type="email" value="<?php echo $table_user['email'];?>" required readonly>
				</div>
			</fieldset>
			</fieldset>
			<div>
				<input class="log-in" type="submit" value="Envíar">
			</div>
		</form>
	</body>
</html>
