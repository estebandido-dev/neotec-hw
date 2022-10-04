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
?>

<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo</title>
    <link rel="icon" type="image/jpg" href="./img/LogoNeoTec.png" />
    <script src="https://kit.fontawesome.com/502b050bab.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/catalogo.css">    
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Squada+One&display=swap" rel="stylesheet">
</head>
<body>
    <header class="header">
        <nav>
            <img src="../Images/LogoNeoTecWhite.png" alt="logo Neotec" class="logo">
            <a href="../index.html">Inicio</a>
            <a href="./closeSession.php">Cerrar Sesión</a>
			<a href="#"><?php print "{$_SESSION['user-username']}";?></a>
        </nav>
    </header>
<!-------------------------------Articulos en tendencia----------------------------------->
    <div class="heading">
        <h1> 🔥 LO MÁS VENDIDO 🔥 </h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="product-grid">
                    <div class="product-imagen">
                        <a href="#">
                            <img loading="lazy" src="./img/img1.PNG" class="foto1">
                            <img loading="lazy" src="./img/img1_1.PNG" class="foto2">
                        </a>
                        <span class="etiqueta-disponible">STOCK</span>
                        <ul class="social">
                            <li><a href="./productos/TV_Zotac.php" data-tip="Agregar al carrito"><i class="fa fa-shopping-cart"></i></a></li>
                            <li><a href="#" data-tip="Favoritos"><i class="fa fa-heart"></i></a></li>
                            <li><a href="https://twitter.com/intent/tweet?text=Deberías%20revisar%20este%20articulo%20está%20en%20descuento%20en%20NeoTec" target="blank_" data-tip="Compartir"><i class="fa fa-share"></i></a></li>
                            <li><a href="#" data-tip="Vista Rápida"><i class="fa fa-search"></i></a></li>
                        </ul>
                    </div>
                    <div class="contenido-producto">
                        <h3 class="titulo"><a href="#"></a>Tarjeta de Video Zotac NVIDIA GeForce GTX 1650 SUPER Twin Fan, 4GB 128-bit GDDR6, PCI Express 3.0</h3>
                        <div class="precio">$4699.00</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="product-grid">
                    <div class="product-imagen">
                        <a href="#">
                            <img loading="lazy" src="./img/img2.PNG" class="foto1">
                            <img loading="lazy" src="./img/img2_2.PNG" class="foto2"> 
                        </a>
                        <span class="etiqueta-disponible">STOCK</span>
                        <ul class="social">
                            <li><a href="./productos/TV_Giga.php" data-tip="Agregar al carrito"><i class="fa fa-shopping-cart"></i></a></li>
                            <li><a href="#" data-tip="Favoritos"><i class="fa fa-heart"></i></a></li>
                            <li><a href="https://twitter.com/intent/tweet?text=Deberías%20revisar%20este%20articulo%20está%20en%20descuento%20en%20NeoTec" target="blank_" data-tip="Compartir"><i class="fa fa-share"></i></a></li>
                            <li><a href="#" data-tip="Vista Rápida"><i class="fa fa-search"></i></a></li>
                        </ul>
                    </div>
                    <div class="contenido-producto">
                        <h3 class="titulo"><a href="#"></a>Tarjeta de Video Gigabyte NVIDIA GeForce GTX 1660 OC, 6GB 192-bit GDDR5, PCI Express x16 3.0</h3>
                        <div class="precio">$5719.00</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="product-grid">
                    <div class="product-imagen">
                        <a href="#">
                            <img loading="lazy" src="./img/img3.PNG" class="foto1">
                            <img loading="lazy" src="./img/img3_3.PNG" class="foto2">
                        </a>
                        <span class="etiqueta-disponible">STOCK</span>
                        <span class="producto-descuento">-20%</span>
                        <ul class="social">
                            <li><a href="./productos/TM_Giga.php" data-tip="Agregar al carrito"><i class="fa fa-shopping-cart"></i></a></li>
                            <li><a href="#" data-tip="Favoritos"><i class="fa fa-heart"></i></a></li>
                            <li><a href="https://twitter.com/intent/tweet?text=Deberías%20revisar%20este%20articulo%20está%20en%20descuento%20en%20NeoTec" target="blank_" data-tip="Compartir"><i class="fa fa-share"></i></a></li>
                            <li><a href="#" data-tip="Vista Rápida"><i class="fa fa-search"></i></a></li>
                        </ul>
                    </div>
                    <div class="contenido-producto">
                        <h3 class="titulo"><a href="#"></a>Tarjeta Madre Gigabyte micro ATX B450M DS3H (rev. 1.0), S-AM4, AMD B450, HDMI, 64GB DDR4 para AMD</h3>
                        <div class="precio descuento"><span>$2109.00</span> $1940.00</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="product-grid">
                    <div class="product-imagen">
                        <a href="#">
                            <img loading="lazy" src="./img/img4.PNG" class="foto1">
                            <img loading="lazy" src="./img/img4_4.PNG" class="foto2">
                        </a>
                        <span class="etiqueta-disponible">STOCK</span>
                        <span class="producto-descuento">-10%</span>
                        <ul class="social">
                            <li><a href="./productos/TM_Asus.php" data-tip="Agregar al carrito"><i class="fa fa-shopping-cart"></i></a></li>
                            <li><a href="#" data-tip="Favoritos"><i class="fa fa-heart"></i></a></li>
                            <li><a href="https://twitter.com/intent/tweet?text=Deberías%20revisar%20este%20articulo%20está%20en%20descuento%20en%20NeoTec" target="blank_" data-tip="Compartir"><i class="fa fa-share"></i></a></li>
                            <li><a href="#" data-tip="Vista Rápida"><i class="fa fa-search"></i></a></li>
                        </ul>
                    </div>
                    <div class="contenido-producto">
                        <h3 class="titulo"><a href="#"></a>Tarjeta Madre ASUS micro ATX MB PRIME A320M-K, S-AM4, AMD A320, HDMI, 32GB DDR4 para AMD</h3>
                        <div class="precio descuento"><span>$1719.00</span> $1610.00</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-------------------Articulos en Oferta--------------->
    <div class="heading">
        <h1> 🤑❄️ SUPER OFERTAS DE INVIERNO ❄️🤑 </h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="product-grid">
                    <div class="product-imagen">
                        <a href="#">
                            <img loading="lazy" src="./img/img5.PNG" class="foto1">
                            <img loading="lazy" src="./img/img5_5.PNG" class="foto2">
                        </a>
                        <span class="etiqueta-disponible">STOCK</span>
                        <span class="producto-descuento">-16%</span>
                        <ul class="social">
                            <li><a href="./productos/PRO_ryzen.php" data-tip="Agregar al carrito"><i class="fa fa-shopping-cart"></i></a></li>
                            <li><a href="#" data-tip="Favoritos"><i class="fa fa-heart"></i></a></li>
                            <li><a href="https://twitter.com/intent/tweet?text=Deberías%20revisar%20este%20articulo%20está%20en%20descuento%20en%20NeoTec" target="blank_" data-tip="Compartir"><i class="fa fa-share"></i></a></li>
                            <li><a href="#" data-tip="Vista Rápida"><i class="fa fa-search"></i></a></li>
                        </ul>
                    </div>
                    <div class="contenido-producto">
                        <h3 class="titulo"><a href="#"></a>Procesador AMD Ryzen 5 3600, S-AM4, 3.60GHz, 32MB L3 Cache, con Disipador Wraith Stealth</h3>
                        <div class="precio descuento"><span>$5040.00</span> $4818.00</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="product-grid">
                    <div class="product-imagen">
                        <a href="#">
                            <img loading="lazy" src="./img/img6.PNG" class="foto1">
                            <img loading="lazy" src="./img/img6_6.PNG" class="foto2">
                        </a>
                        <span class="etiqueta-disponible">STOCK</span>
                        <span class="producto-descuento">-5%</span>
                        <ul class="social">
                            <li><a href="./productos/PRO_intel.php" data-tip="Agregar al carrito"><i class="fa fa-shopping-cart"></i></a></li>
                            <li><a href="#" data-tip="Favoritos"><i class="fa fa-heart"></i></a></li>
                            <li><a href="https://twitter.com/intent/tweet?text=Deberías%20revisar%20este%20articulo%20está%20en%20descuento%20en%20NeoTec" target="blank_" data-tip="Compartir"><i class="fa fa-share"></i></a></li>
                            <li><a href="#" data-tip="Vista Rápida"><i class="fa fa-search"></i></a></li>
                        </ul>
                    </div>
                    <div class="contenido-producto">
                        <h3 class="titulo"><a href="#"></a>Procesador Intel Core i7-9700K, S-1151, 3.60GHz, 8-Core, 12MB Smart Cache (9na. Generación Coffee Lake)</h3>
                        <div class="precio descuento"><span>$7999.00</span> $7580.00</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="product-grid">
                    <div class="product-imagen">
                        <a href="#">
                            <img loading="lazy" src="./img/img7_7.PNG" class="foto1">
                            <img loading="lazy" src="./img/img7.PNG" class="foto2">
                        </a>
                        <span class="etiqueta-disponible">STOCK</span>
                        <span class="producto-descuento">-7%</span>
                        <ul class="social">
                            <li><a href="./productos/SDD_Spect.php" data-tip="Agregar al carrito"><i class="fa fa-shopping-cart"></i></a></li>
                            <li><a href="#" data-tip="Favoritos"><i class="fa fa-heart"></i></a></li>
                            <li><a href="https://twitter.com/intent/tweet?text=Deberías%20revisar%20este%20articulo%20está%20en%20descuento%20en%20NeoTec" target="blank_" data-tip="Compartir"><i class="fa fa-share"></i></a></li>
                            <li><a href="#" data-tip="Vista Rápida"><i class="fa fa-search"></i></a></li>
                        </ul>
                    </div>
                    <div class="contenido-producto">
                        <h3 class="titulo"><a href="#"></a>SSD XPG Spectrix S40G, 512GB, PCI Express 3.0, M.2</h3>
                        <div class="precio descuento"><span>$1640.00</span> $1530.00</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="product-grid">
                    <div class="product-imagen">
                        <a href="#">
                            <img loading="lazy" src="./img/img8_8.PNG" class="foto1">
                            <img loading="lazy" src="./img/img8.PNG" class="foto2">
                        </a>
                        <span class="etiqueta-disponible">STOCK</span>
                        <span class="producto-descuento">-10%</span>
                        <ul class="social">
                            <li><a href="./productos/RAM_Spect.php" data-tip="Agregar al carrito"><i class="fa fa-shopping-cart"></i></a></li>
                            <li><a href="#" data-tip="Favoritos"><i class="fa fa-heart"></i></a></li>
                            <li><a href="https://twitter.com/intent/tweet?text=Deberías%20revisar%20este%20articulo%20está%20en%20descuento%20en%20NeoTec" target="blank_" data-tip="Compartir"><i class="fa fa-share"></i></a></li>
                            <li><a href="#" data-tip="Vista Rápida"><i class="fa fa-search"></i></a></li>
                        </ul>
                    </div>
                    <div class="contenido-producto">
                        <h3 class="titulo"><a href="#"></a>Memoria RAM XPG SPECTRIX D60G DDR4, 3200MHz, 8GB, Non-ECC, CL16, XMP</h3>
                        <div class="precio descuento"><span>$1000.00</span> $900.00</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--------------Cátalogo de productos------------>
    <div class="heading">
        <h1>☣ NUESTRO CATÁLOGO ☣</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="product-grid">
                    <div class="product-imagen">
                        <a href="#">
                            <img loading="lazy" src="./img/img1.PNG" class="foto1">
                            <img loading="lazy" src="./img/img1_1.PNG" class="foto2">
                        </a>
                        <span class="etiqueta-disponible">STOCK</span>
                        <ul class="social">
                            <li><a href="./productos/TV_Zotac.php" data-tip="Agregar al carrito"><i class="fa fa-shopping-cart"></i></a></li>
                            <li><a href="#" data-tip="Favoritos"><i class="fa fa-heart"></i></a></li>
                            <li><a href="https://twitter.com/intent/tweet?text=Deberías%20revisar%20este%20articulo%20está%20en%20descuento%20en%20NeoTec" target="blank_" data-tip="Compartir"><i class="fa fa-share"></i></a></li>
                            <li><a href="#" data-tip="Vista Rápida"><i class="fa fa-search"></i></a></li>
                        </ul>
                    </div>
                    <div class="contenido-producto">
                        <h3 class="titulo"><a href="#"></a>Tarjeta de Video Zotac NVIDIA GeForce GTX 1650 SUPER Twin Fan, 4GB 128-bit GDDR6, PCI Express 3.0</h3>
                        <div class="precio">$4699.00</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="product-grid">
                    <div class="product-imagen">
                        <a href="#">
                            <img loading="lazy" src="./img/img2.PNG" class="foto1">
                            <img loading="lazy" src="./img/img2_2.PNG" class="foto2">
                        </a>
                        <span class="etiqueta-disponible">STOCK</span>
                        <ul class="social">
                            <li><a href="./productos/TV_Giga.php" data-tip="Agregar al carrito"><i class="fa fa-shopping-cart"></i></a></li>
                            <li><a href="#" data-tip="Favoritos"><i class="fa fa-heart"></i></a></li>
                            <li><a href="https://twitter.com/intent/tweet?text=Deberías%20revisar%20este%20articulo%20está%20en%20descuento%20en%20NeoTec" target="blank_" data-tip="Compartir"><i class="fa fa-share"></i></a></li>
                            <li><a href="#" data-tip="Vista Rápida"><i class="fa fa-search"></i></a></li>
                        </ul>
                    </div>
                    <div class="contenido-producto">
                        <h3 class="titulo"><a href="#"></a>Tarjeta de Video Gigabyte NVIDIA GeForce GTX 1660 OC, 6GB 192-bit GDDR5, PCI Express x16 3.0</h3>
                        <div class="precio">$5719.00</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="product-grid">
                    <div class="product-imagen">
                        <a href="#">
                            <img loading="lazy" src="./img/img3.PNG" class="foto1">
                            <img loading="lazy" src="./img/img3_3.PNG" class="foto2">
                        </a>
                        <span class="etiqueta-disponible">STOCK</span>
                        <span class="producto-descuento">-20%</span>
                        <ul class="social">
                            <li><a href="./productos/TM_Giga.php" data-tip="Agregar al carrito"><i class="fa fa-shopping-cart"></i></a></li>
                            <li><a href="#" data-tip="Favoritos"><i class="fa fa-heart"></i></a></li>
                            <li><a href="https://twitter.com/intent/tweet?text=Deberías%20revisar%20este%20articulo%20está%20en%20descuento%20en%20NeoTec" target="blank_" data-tip="Compartir"><i class="fa fa-share"></i></a></li>
                            <li><a href="#" data-tip="Vista Rápida"><i class="fa fa-search"></i></a></li>
                        </ul>
                    </div>
                    <div class="contenido-producto">
                        <h3 class="titulo"><a href="#"></a>Tarjeta Madre Gigabyte micro ATX B450M DS3H (rev. 1.0), S-AM4, AMD B450, HDMI, 64GB DDR4 para AMD</h3>
                        <div class="precio descuento"><span>$4109.00</span> $1940.60</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="product-grid">
                    <div class="product-imagen">
                        <a href="#">
                            <img loading="lazy" src="./img/img4.PNG" class="foto1">
                            <img loading="lazy" src="./img/img4_4.PNG" class="foto2">
                        </a>
                        <span class="etiqueta-disponible">STOCK</span>
                        <span class="producto-descuento">-10%</span>
                        <ul class="social">
                            <li><a href="./productos/TM_Asus.php" data-tip="Agregar al carrito"><i class="fa fa-shopping-cart"></i></a></li>
                            <li><a href="#" data-tip="Favoritos"><i class="fa fa-heart"></i></a></li>
                            <li><a href="https://twitter.com/intent/tweet?text=Deberías%20revisar%20este%20articulo%20está%20en%20descuento%20en%20NeoTec" target="blank_" data-tip="Compartir"><i class="fa fa-share"></i></a></li>
                            <li><a href="#" data-tip="Vista Rápida"><i class="fa fa-search"></i></a></li>
                        </ul>
                    </div>
                    <div class="contenido-producto">
                        <h3 class="titulo"><a href="#"></a>Tarjeta Madre ASUS Micro ATX MB PRIME A320M-K, S-AM4, AMD A320, HDMI, 32GB DDR4 Para AMD</h3>
                        <div class="precio descuento"><span>$1179.00</span> $1610.60</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="product-grid">
                    <div class="product-imagen">
                        <a href="#">
                            <img loading="lazy" src="./img/img5.PNG" class="foto1">
                            <img loading="lazy" src="./img/img5_5.PNG" class="foto2">
                        </a>
                        <span class="etiqueta-disponible">STOCK</span>
                        <span class="producto-descuento">-16%</span>
                        <ul class="social">
                            <li><a href="./productos/PRO_ryzen.php" data-tip="Agregar al carrito"><i class="fa fa-shopping-cart"></i></a></li>
                            <li><a href="#" data-tip="Favoritos"><i class="fa fa-heart"></i></a></li>
                            <li><a href="https://twitter.com/intent/tweet?text=Deberías%20revisar%20este%20articulo%20está%20en%20descuento%20en%20NeoTec" target="blank_" data-tip="Compartir"><i class="fa fa-share"></i></a></li>
                            <li><a href="#" data-tip="Vista Rápida"><i class="fa fa-search"></i></a></li>
                        </ul>
                    </div>
                    <div class="contenido-producto">
                        <h3 class="titulo"><a href="#"></a>Procesador AMD Ryzen 5 3600, S-AM4, 3.60GHz, 32MB L3 Cache, Con Disipador Wraith Stealth</h3>
                        <div class="precio descuento"><span>$5040.00</span> $4818.00</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="product-grid">
                    <div class="product-imagen">
                        <a href="#">
                            <img loading="lazy" src="./img/img6.PNG" class="foto1">
                            <img loading="lazy" src="./img/img6_6.PNG" class="foto2">
                        </a>
                        <span class="etiqueta-disponible">STOCK</span>
                        <span class="producto-descuento">-5%</span>
                        <ul class="social">
                            <li><a href="./productos/PRO_intel.php" data-tip="Agregar al carrito"><i class="fa fa-shopping-cart"></i></a></li>
                            <li><a href="#" data-tip="Favoritos"><i class="fa fa-heart"></i></a></li>
                            <li><a href="https://twitter.com/intent/tweet?text=Deberías%20revisar%20este%20articulo%20está%20en%20descuento%20en%20NeoTec" target="blank_" data-tip="Compartir"><i class="fa fa-share"></i></a></li>
                            <li><a href="#" data-tip="Vista Rápida"><i class="fa fa-search"></i></a></li>
                        </ul>
                    </div>
                    <div class="contenido-producto">
                        <h3 class="titulo"><a href="#"></a>Procesador Intel Core I7-9700K, S-1151, 3.60GHz, 8-Core, 12MB Smart Cache (9na. Generación Coffee Lake)</h3>
                        <div class="precio descuento"><span>$7999.00</span> $7580.00</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="product-grid">
                    <div class="product-imagen">
                        <a href="#">
                            <img loading="lazy" src="./img/img7.PNG" class="foto1">
                            <img loading="lazy" src="./img/img7_7.PNG" class="foto2">
                        </a>
                        <span class="etiqueta-disponible">STOCK</span>
                        <span class="producto-descuento">-7%</span>
                        <ul class="social">
                            <li><a href="./productos/SDD_Spect.php" data-tip="Agregar al carrito"><i class="fa fa-shopping-cart"></i></a></li>
                            <li><a href="#" data-tip="Favoritos"><i class="fa fa-heart"></i></a></li>
                            <li><a href="https://twitter.com/intent/tweet?text=Deberías%20revisar%20este%20articulo%20está%20en%20descuento%20en%20NeoTec" target="blank_" data-tip="Compartir"><i class="fa fa-share"></i></a></li>
                            <li><a href="#" data-tip="Vista Rápida"><i class="fa fa-search"></i></a></li>
                        </ul>
                    </div>
                    <div class="contenido-producto">
                        <h3 class="titulo"><a href="#"></a>SSD XPG Spectrix S40G, 512GB, PCI Express 3.0, M.2</h3>
                        <div class="precio descuento"><span>$1640.00</span> $1530.00</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="product-grid">
                    <div class="product-imagen">
                        <a href="#">
                            <img loading="lazy" src="./img/img8.PNG" class="foto1">
                            <img loading="lazy" src="./img/img8_8.PNG" class="foto2">
                        </a>
                        <span class="etiqueta-disponible">STOCK</span>
                        <span class="producto-descuento">-10%</span>
                        <ul class="social">
                            <li><a href="./productos/RAM_Spect.php" data-tip="Agregar al carrito"><i class="fa fa-shopping-cart"></i></a></li>
                            <li><a href="#" data-tip="Favoritos"><i class="fa fa-heart"></i></a></li>
                            <li><a href="https://twitter.com/intent/tweet?text=Deberías%20revisar%20este%20articulo%20está%20en%20descuento%20en%20NeoTec" target="blank_" data-tip="Compartir"><i class="fa fa-share"></i></a></li>
                            <li><a href="#" data-tip="Vista Rápida"><i class="fa fa-search"></i></a></li>
                        </ul>
                    </div>
                    <div class="contenido-producto">
                        <h3 class="titulo"><a href="#"></a>Memoria RAM XPG SPECTRIX D60G DDR4, 3200MHz, 8GB, Non-ECC, CL16, XMP</h3>
                        <div class="precio descuento"><span>$1000.00</span> $900.00</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
</body>
</html>
