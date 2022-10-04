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

	require_once('../../libs/check-session.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto</title>
    <link rel="icon" type="image/jpg" href="../img/LogoNeoTec.png" />
    <script src="https://kit.fontawesome.com/502b050bab.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/catalogo.css">    
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Squada+One&display=swap" rel="stylesheet">
</head>
<body>
    <header class="header">
        <nav>
            <img src="../../Images/LogoNeoTecWhite.png" alt="logo Neotec" class="logo">
            <a href="../../index.html">Inicio</a>
            <a href="../catalogo.php">Catálogo</a>
            <a href="../closeSession.php">Cerrar Sesión</a>
			<a href="#"><?php print "{$_SESSION['user-username']}";?></a>
        </nav>
    </header>
<!-------------------------------Articulo----------------------------------->
    <div class="headingx">
        <h1>Procesador Intel Core i7-9700K, S-1151, 3.60GHz, 8-Core, 12MB Smart Cache (9na. Generación Coffee Lake)  </h1>
    </div> 
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="product-gridx">
                    <div class="product-imagenx">
                        <a href="#">
                            <img loading="lazy" src="../img/img6.PNG" class="foto1">
                            <img loading="lazy" src="../img/img6_6.PNG" class="foto2">
                        </a>
                        <span class="etiqueta-disponible">STOCK</span>
                        <span class="producto-descuento">-5%</span>
                        <ul class="social">
                            <li><a href="#" data-tip="Agregar al carrito"><i class="fa fa-shopping-cart"></i></a></li>
                            <li><a href="#" data-tip="Favoritos"><i class="fa fa-heart"></i></a></li>
                            <li><a href="https://twitter.com/intent/tweet?text=Deberías%20revisar%20este%20articulo%20está%20en%20descuento%20en%20NeoTec" target="blank_" data-tip="Compartir"><i class="fa fa-share"></i></a></li>
                            <li><a href="#" data-tip="Vista Rápida"><i class="fa fa-search"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="derecha">
                <div class="contenido-producto">
                    <h3 class="titulo"><a href="#"></a>Procesador Intel Core i7-9700K, S-1151, 3.60GHz, 8-Core, 12MB Smart Cache (9na. Generación Coffee Lake)</h3>
                    <div class="oferta"> <span>$7999.00</span> $7580.00</div>
                    <hr>
                </div> 
                <div class="caracteristicas">
                    <h3>Caracteristicas</h3>
                    <ul class="carac">
                        <li>Familia de procesador: <b>i7-9700K</b></li>
                        <li>Frecuencia del procesador: <b>3.6 GHz</b></li>
                        <li>Socket del procesador <b>LGA1151</b></li>
                        <li>Número de núcleos: <b>8</b></li>
                    </ul>
                    <hr>
                    <br>
                   <form method="post" action="../../controllers/comprarController.php">
                       <div>
                           <label for="product-name">Producto: </label>
                           <input name="product-name" class="form-input"  type="text" readonly value="Procesador Intel Core i7-9700K" />
                       </div>
                       <div>
                            <label for="product-quantity">Cantidad: </label>
                           <input name="product-quantity" class="form-input"  type="number" value="1" />
                       </div>
                       <div>
                            <label for="product-price">Precio: </label>
                           <input name="product-price" class="form-input" type="number" readonly value="7580" />
                        </div>
                        <input type="submit" class="log-in" value="Pedir">
                   </form> 
                </div>
                
            </div>
        </div>
    </div>
<!-------------------------------Articulo----------------------------------->
    <footer class="footer">
        <div class="contenedor-footer">
            <div class="content-foo">
                <h4>Teléfono</h4>
                <p>4623085130</p>
            </div>
            <div class="content-foo">
                <h4>E-mail</h4>
                <p>contacto@NeoTec.com</p>
            </div>
            <div class="content-foo">
                <h4>Ubicación</h4>
                <p>Guanjuato, México.</p>
            </div>
        </div>
        <h2 class="titulo-final">&copy; NeoTec | Design with 💓 by <a href="https://www.instagram.com/astra_exe/" target="blank_">NeoTec</a></h2>
    </footer>
    </div>
</body>
</html>
