		<!-- FOOTER SIDEBAR -->
        <div id="outerfootersidebar">
        	<div id="footersidebarcontainer">
            	<footer id="footersidebar">
                
            	<div id="footcol1" class="footcol">
                    <ul>
                        <li class="widget-container">
                            <h2 class="widget-title"><a href="./servicios.html">NUESTROS SERVICIOS</a></h2>
                            <ul>
                                <li>Web en Chino</li>
                                <li>Mantenimiento Web</li>
                                <li>Actualización Web</li>
                                <li>Resumen de mes visitants</li>
                                <li>Compartimento de contactos</li>
                                <li>Interpretación en tiempo real</li>
                                <li>Traducción de publicaciones</li>
                                <li>Asistencia de exportación</li>
                                <li>Consultoría legal de exportación</li>
                            </ul>
                        </li>
                    </ul>
                </div>
            	<div id="footcol2" class="footcol" style="width: 240px;">
                	<ul>
                        <li class="widget-container">
                            <h2 class="widget-title">&nbsp;</h2>
                            <ul>
                                <li>Envío de muestras de vino</li>
                                <li>Informes del mercado Chino</li>
                                <li>Visita a compradores en China</li>
                                <li>Intermediación en negocio</li>
                                <li>Servicio de venta y post-venta</li>
                                <li>Servicio en ferias/exposiciones</li>
                                <li>Recepción de clientes chinos en España</li>
                                <li>Representación en actividades en China</li>
                                <li>Actividades de promoción en ciudades China</li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div id="footcol3" class="footcol" style="margin-left: -35px;">
                    <ul>
                        <li class="widget-container">
                            <h2 class="widget-title">&nbsp;</h2>
                            <div id="flickr">
                                <div class="flickr-img"><img src="/assets/images/content/g5.png" alt="" /></div>
                                <div class="flickr-img last"><img src="/assets/images/content/g6.png" alt="" /></div>
                                <div class="flickr-img"><img src="/assets/images/content/g7.png" alt="" /></div>
                                <div class="flickr-img last"><img src="/assets/images/content/g8.png" alt="" /></div>
                            </div>
                        </li>
                    </ul>
                </div>
            	<div id="footcol4" class="footcol">
                	<ul>
                    	<li class="widget-container">
                        	<h2 class="widget-title"><a href="./contact.html">CONTACTO</a></h2>
                            <ul>
                                <li style="width: 210px;">Venid a conocernos. Somos la puerta de entrada al mercado chino, el mayor mercado del mundo, con 1.400 millones de potenciales consumidores.</li>
                                <li>Para obtener más información, póngase en contacto con nosotros.</li>
                                <li>info@vinosinfo.com <br/>+34 677 61 44 17 <br/>+34 910 41 51 98</li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="clear"></div>
                </footer>
            </div>
        </div>
        <!-- END FOOTER SIDEBAR -->
               
        <!-- FOOTER -->
        <div id="outerfooter">
        	<div id="footercontainer">
            	<footer id="footer">
                <ul id="footer-menu">                  
                  <?php foreach($menus as $menu):?>
                  <?php if($menu['is_show_bottom'] == 1):?>
                  <li><a href="<?=$menu['controller']?>"><?=strtoupper($menu['name'])?></a></li>
                  <?php endif?>
                  <?php endforeach?>
                </ul>
                <div id="copyright">VinosInfo - Tu brújula en el mercado chino</div>
                </footer>
            </div>
        </div>
        <!-- END FOOTER -->