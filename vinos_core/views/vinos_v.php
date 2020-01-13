<?php require_once(VIEWPATH.'common/head_v.php');?>
        <!-- MAIN CONTENT -->
        <div id="outermain">
        	<div id="maincontent">
        	<section id="mainthecontent">
			<div id="ts-display-portfolio">
                
                <ul id="filter">
                    <li class="segment-1 <?=$current_type==''? 'selected-1':''?>"><a href="/vinos">Todos</a></li>
                    <?php foreach($types as $type):?>
                    <?php if($type['row'] == 1):?>
                    <li <?=$current_type==$type['id']?'class="selected-1"':''?>><a href="/vinos?type_id=<?=$type['id']?>"><?=$type['name']?></a></li>
                    <?php endif?>
                    <?php endforeach?>
                    <div class="clear"></div>
                    <?php foreach($types as $type):?>
                    <?php if($type['row'] == 2):?>
                    <li <?=$current_type==$type['id']?'class="selected-1"':''?>><a href="/vinos?type_id=<?=$type['id']?>"><?=$type['name']?></a></li>
                    <?php endif?>
                    <?php endforeach?>
                    <div class="clear"></div>
                    <?php foreach($types as $type):?>
                    <?php if($type['row'] == 3):?>
                    <li <?=$current_type==$type['id']?'class="selected-1"':''?>><a href="/vinos?type_id=<?=$type['id']?>"><?=$type['name']?></a></li>
                    <?php endif?>
                    <?php endforeach?>
                    <div class="clear"></div>
                    <?php foreach($types as $type):?>
                    <?php if($type['row'] == 4):?>
                    <li <?=$current_type==$type['id']?'class="selected-1"':''?>><a href="/vinos?type_id=<?=$type['id']?>"><?=$type['name']?></a></li>
                    <?php endif?>
                    <?php endforeach?>
                </ul>
                
                <ul id="ts-display-pf-filterable" class="ts-display-pf-col-4 image-grid">                    
                    <?php $i = 1;?>                    
                    <?php foreach($vinos as $vino):?>
                        <li data-id="id-<?=$i?>" class="business <?=$i%4==0? 'nomargin':''?>">
                            <div class="ts-display-pf-img">
                                <a class="image" href="<?=$vino['img']?>" data-rel="prettyPhoto[mixed]" data-weblink="<?=$vino['url']?>">
                                <span class="rollover"></span>
                                <img src="<?=$vino['img']?>" alt="" />
                                
                                </a>                            
                            </div>
                            <span class="shadowpfimg"></span>
                            <div class="ts-display-pf-text">
                                <h2><?=$vino['desc']?></h2>
                            </div>
                            <div class="ts-display-clear"></div>
                        </li>
                    <?php $i++;?>
                    <?php endforeach?>                        
                </ul>
                
                <div class="clear"></div>
                
            </div>
         
            <div class="clear"></div>
            </section>
            </div>
        </div>
        <!-- END MAIN CONTENT -->
        <?php require_once(VIEWPATH.'common/footer_v.php');?>             
        <div class="clear"></div>
	</div> <!-- end outercontainer -->
    
</div> <!-- end bodychild -->

<!-- Javascript
================================================== -->
<script type="text/javascript" src="js/jquery-1.6.4.min.js"></script>

<!-- jQuery Superfish -->
<script type="text/javascript" src="js/hoverIntent.js"></script> 
<script type="text/javascript" src="js/superfish.js"></script> 
<script type="text/javascript" src="js/supersubs.js"></script>

<!-- Custom Script -->
<script type="text/javascript" src="js/custom.js"></script>

<!-- jQuery Filterable -->
<script type="text/javascript" src="js/quicksand.js"></script>
<script type="text/javascript" src="js/quicksand_config.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<!-- jQuery Fade -->
<script type="text/javascript" src="js/fade.js"></script>
<!-- jQuery PrettyPhoto -->
<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>


</body>
</html>
