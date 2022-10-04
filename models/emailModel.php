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

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	require_once('../libs/connection-db.php');
	require_once('../libs/phpmailer-6.1.8/PHPMailer.php');
	require_once('../libs/phpmailer-6.1.8/SMTP.php');
	require_once('../libs/phpmailer-6.1.8/Exception.php');

	class class_email extends class_db {
		private $name_table_email = 'company_email';
		private $table_cols_email = array(
			'email_address',		# 0
			'email_password',		# 1
			'email_smtp_address',	# 2
			'email_port',			# 3
			'email_starttls'		# 4
		);
		private $key_decrypt_email = 't(Z2G[x;7$xlJ}y';
		private $service_email_data;
		private $email_obj;
		
		# El siguiente constructor obtiene desde la base de datos, la contraseña del correo del servicio.
		# La clase "class_email" es flexible para realizar operaciones de envío de correos,
		# se pueden asignar diferentes correos para las operaciones del servicio,
		# además evita que se específique en texto plano la contraseña del email del servicio.
		public function __construct($email=""){
			if(PHPMailer::validateAddress($email)){	
				try{
					# Ejecuta el constructor padre.
					parent::__construct();

					try{
						# Comprueba si el correo electrónico del servicio se encuentra en la base de datos.
						$query_get_email = "
							SELECT {$this -> table_cols_email[0]},
							AES_DECRYPT({$this -> table_cols_email[1]},'{$this -> key_decrypt_email}'),
							{$this -> table_cols_email[2]},
							{$this -> table_cols_email[3]},
							{$this -> table_cols_email[4]}
							FROM {$this -> name_table_email}
							WHERE {$this -> table_cols_email[0]}='$email';";

						# "prepare()" prepara la sentencia SQL para ser ejecutado.
						# "execute()" ejecuta una sentencia SQL preparada.
						$query_result = $this -> connection_instance -> prepare($query_get_email);
						$query_result -> execute();
						$this -> service_email_data = $query_result -> fetch(PDO::FETCH_NUM);	
						unset($query_result);
					}
					catch(PDOException $e){
						exit("<p>ERROR al consultar el email desde la base de datos: {$e -> getMessage()}</p>");
					}
					
					# Ejecuta el destructor padre, cierra la conexión a la base de datos.
					parent::__destruct();
				
					if(!empty($this -> service_email_data)){
						try{					
							# Configuración del servidor de email.
							$this -> email_obj = new PHPMailer(true);
							# Establece el lenguaje para mostrar los mensajes de errores.
							$this -> email_obj -> setLanguage('es','../libs/phpmailer-6.1.8/language/');
							# Configura PHPMailer para utilizar el protocolo SMTP.
							$this -> email_obj -> isSMTP();
							# Deshabilita el modo debug para el protocolo SMTP.
							$this -> email_obj -> SMTPDebug = SMTP::DEBUG_OFF;
							# Estable la dirección de email del servicio.
							$this -> email_obj -> Username = $this -> service_email_data[0];
							# Estable la contraseña para el email del servicio.
							$this -> email_obj -> Password = $this -> service_email_data[1];
							# Establece el nombre de dominio del servidor SMTP.
							$this -> email_obj -> Host = $this -> service_email_data[2];
							# Establece el puerto del servidor SMTP.
							$this -> email_obj -> Port = $this -> service_email_data[3];
							# Habilita la autentificación en SMTP.
							$this -> email_obj -> SMTPAuth = true;
														
							if($this -> service_email_data[4]){
								$this -> email_obj -> SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
							}
							else{
								$this -> email_obj -> SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
							}
						}
						catch(Exception $f){
							exit("<p>ERROR al configurar el servidor email: {$this -> email_obj -> ErrorInfo}</p>");
						}
					}
					else{
						exit('<p>ERROR, no existe el correo eléctronico del servicio en la base de datos.</p>');
					}

				}
				catch(PDOException $e){
					parent::__destruct();
					exit("<p>ERROR en la consulta del email en la base de datos: {$e -> getMessage()}</p>");
				}
			}
			else{
				exit('<p>ERROR, correo eléctronico no válido en la configuración.</p>');
			}
		}
		
		public function __destruct(){
			$this -> mail_obj = null;
		}
		
		# "send_email()" prepara información de origen y destino del email.
		public function prepare_email($name_origen="", $name_destination="", $email_destination=""){
			if(PHPMailer::validateAddress($email_destination) && !empty($name_origen) && !empty($name_destination)){
				try{
					# Establce la codificación de caracteres para el contenido del mensaje.
					$this -> email_obj -> CharSet = PHPMailer::CHARSET_UTF8;
					# Estable que los emails serán envíados en formato HTML.
					$this -> email_obj -> isHTML(true);
					# Estable la dirección del origen del email a envíar.
					$this -> email_obj -> setFrom($this -> service_email_data[0],$name_origen);
					# Establece el email de detinatario.
					$this -> email_obj -> addAddress($email_destination,$name_destination);
				}
				catch(Exception $e){
					exit("<p>ERROR al configurar el email de destino: {$this -> email_obj -> ErrorInfo}</p>");
				}
			}
			else{
				exit("<p>ERROR, email de destino no válido.</p>");	
			}
		}
		
		public function send_email($email_asunto="", $email_text=""){
			if(!empty($email_asunto) && !empty($email_text)){
				try{
					# Asunto del email.
					$this -> email_obj -> Subject = $email_asunto;
					# Cuerpo del email de respuesta.
					$this -> email_obj -> Body = $email_text;
					# Envía el email de respuesta.
					$this -> email_obj -> send();
					# Limpia las direcciones de destino.
					$this -> email_obj -> clearAddresses();
				}
				catch(Exception $e){
					exit("<p>ERROR al envíar el email: {$this -> email_obj -> ErrorInfo}</p>");
				}
			}
			else{
				exit("<p>ERROR, no hay ningún email para envíar.</p>");
			}
		}
		
	}
?>