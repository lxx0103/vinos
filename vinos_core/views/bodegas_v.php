<?php require_once(VIEWPATH.'common/head_v.php');?>
        <!-- MAIN CONTENT -->
        <div id="outermain">
            <div id="maincontent">
            <section id="mainthecontent">

            <div id="ts-display-portfolio">
                
                <ul id="filter" >
                    <li class="segment-1 <?=$current_zone==''? 'selected-1':''?>"><a href="/bodegas">Todas</a></li>
                    <?php foreach($zones as $zone):?>
                    <?php if($zone['row'] == 1):?>
                    <li <?=$current_zone==$zone['id']?'class="selected-1"':''?>><a href="/bodegas?zone_id=<?=$zone['id']?>"><?=$zone['name']?></a></li>
                    <?php endif?>
                    <?php endforeach?>
                    <div class="clear"></div>
                    <?php foreach($zones as $zone):?>
                    <?php if($zone['row'] == 2):?>
                    <li <?=$current_zone==$zone['id']?'class="selected-1"':''?>><a href="/bodegas?zone_id=<?=$zone['id']?>"><?=$zone['name']?></a></li>
                    <?php endif?>
                    <?php endforeach?>
                </ul>
                
                <ul id="ts-display-pf-filterable" class="ts-display-pf-col-4 image-grid">
                    <?php $i = 1;?>                    
                    <?php foreach($bodegas as $bodega):?>
                        <li data-id="id-<?=$i?>" class="business <?=$i%4==0? 'nomargin':''?>">
                            <div class="ts-display-pf-img">
                                <a class="image" href="<?=$bodega['img']?>" data-rel="prettyPhoto[mixed]" data-weblink="<?=$bodega['url']?>">
                                <span class="rollover"></span>
                                <img src="<?=$bodega['img']?>" alt="" />
                                
                                </a>                            
                            </div>
                            <span class="shadowpfimg"></span>
                            <div class="ts-display-pf-text">
                                <h2><?=$bodega['desc']?></h2>
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
<script type="text/javascript" src="/assets/js/jquery-1.6.4.min.js"></script>

<!-- jQuery Superfish -->
<script type="text/javascript" src="/assets/js/hoverIntent.js"></script> 
<script type="text/javascript" src="/assets/js/superfish.js"></script> 
<script type="text/javascript" src="/assets/js/supersubs.js"></script>

<!-- Custom Script -->
<script type="text/javascript" src="/assets/js/custom.js"></script>

<!-- jQuery Filterable -->
<script type="text/javascript" src="/assets/js/quicksand.js"></script>
<script type="text/javascript" src="/assets/js/quicksand_config.js"></script>
<script type="text/javascript" src="/assets/js/jquery.easing.1.3.js"></script>
<!-- jQuery Fade -->
<script type="text/javascript" src="/assets/js/fade.js"></script>
<!-- jQuery PrettyPhoto -->
<script type="text/javascript" src="/assets/js/jquery.prettyPhoto.js"></script>


</body>
</html>
