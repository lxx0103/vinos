<?php require_once(VIEWPATH.'common/head_v.php');?>
		<!-- SLIDER -->
        <div id="outerslider">
        	<div id="slidercontainer">
            	<section id="slider">
                <div class="box_skitter box_skitter_large">
                    <ul>
                    <?php foreach($slides['type_1'] as $type1):?>                        
                        <li>
                            <img src="<?=$type1['img']?>"/>
                            <div class="label_text">
                                <span><a href="<?=$type1['url']?>" style="color: white;"><?=$type1['desc']?></a></span>
                            </div>
                        </li>
                    <?php endforeach?>
                    </ul>
                </div>
                <div class="box_skitter box_skitter_large2">
                    <ul>
                    <?php foreach($slides['type_2'] as $type2):?>                        
                        <li>
                            <img src="<?=$type2['img']?>"/>
                            <div class="label_text">
                                <span><a href="<?=$type2['url']?>" style="color: white;"><?=$type2['desc']?></a></span>
                            </div>
                        </li>
                    <?php endforeach?>
                    </ul>
                </div>
                <div class="box_skitter box_skitter_large3">
                    <ul>
                    <?php foreach($slides['type_3'] as $type3):?>                        
                        <li>
                            <img src="<?=$type3['img']?>"/>
                            <div class="label_text">
                                <span><a href="<?=$type3['url']?>" style="color: white;"><?=$type3['desc']?></a></span>
                            </div>
                        </li>
                    <?php endforeach?>
                    </ul>
                </div>
                <div class="box_skitter box_skitter_large4">
                    <ul>
                    <?php foreach($slides['type_4'] as $type4):?>                        
                        <li>
                            <img src="<?=$type4['img']?>"/>
                            <div class="label_text">
                                <span><a href="<?=$type4['url']?>" style="color: white;"><?=$type4['desc']?></a></span>
                            </div>
                        </li>
                    <?php endforeach?>
                    </ul>
                </div>
                <div class="box_skitter box_skitter_large5">
                    <ul>
                    <?php foreach($slides['type_5'] as $type5):?>                        
                        <li>
                            <img src="<?=$type5['img']?>"/>
                            <div class="label_text">
                                <span><a href="<?=$type5['url']?>" style="color: white;"><?=$type5['desc']?></a></span>
                            </div>
                        </li>
                    <?php endforeach?>
                    </ul>
                </div>
                <div class="box_skitter box_skitter_large6">
                    <ul>
                    <?php foreach($slides['type_6'] as $type6):?>                        
                        <li>
                            <img src="<?=$type6['img']?>"/>
                            <div class="label_text">
                                <span><a href="<?=$type6['url']?>" style="color: white;"><?=$type6['desc']?></a></span>
                            </div>
                        </li>
                    <?php endforeach?>
                    </ul>
                </div>
                </section>
            </div>
        </div>
        <!-- END SLIDER -->
        
        <!-- MAIN CONTENT -->
        <div id="outermain">
        	<div id="maincontent">
        	<section id="mainthecontent">
            
				<article>
                	<div class="one_third">
                    	<div class="frame">
                    	<img src="/assets/images/content/map1.png" alt="" /><h5><a href="/bodegas?zone_id=1" style="color: black;">Valle del Río Ebro</a></h5>
                        </div>
                    </div>
                	<div class="one_third">
                    	<div class="frame">
                    	<img src="/assets/images/content/map2.png" alt="" /><h5><a href="/bodegas?zone_id=2" style="color: black;">Meseta Central</a></h5>
                        </div>
                    </div>
                    <div class="one_third lastcols">
                    	<div class="frame">
                        <img src="/assets/images/content/map3.png" alt="" /><h5><a href="/bodegas?zone_id=3" style="color: black;">Valle del Río Duero</a></h5>
                        </div>
                    </div>
                    <div class="one_third">
                        <div class="frame">
                        <img src="/assets/images/content/map4.png" alt="" /><h5><a href="/bodegas?zone_id=4" style="color: black;">Costa Mediterránea</a></h5>
                        </div>
                    </div>
                    <div class="one_third">
                        <div class="frame">
                        <img src="/assets/images/content/map5.png" alt="" /><h5><a href="/bodegas?zone_id=5" style="color: black;">Noroeste de España</a></h5>
                        </div>
                    </div>
                    <div class="one_third lastcols">
                        <div class="frame">
                        <img src="/assets/images/content/map6.png" alt="" /><h5><a href="/bodegas?zone_id=6" style="color: black;">Andalucía</a></h5>
                        </div>
                    </div>
                </article>
         
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

<!-- Slider -->
<script type="text/javascript" src="/assets/js/jquery.animate-colors-min.js"></script>
<script type="text/javascript" src="/assets/js/jquery.skitter.js"></script>
<script type="text/javascript" src="/assets/js/jquery.easing.1.3.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){

	//=================================== SLIDESHOW ===================================//
	jQuery(".box_skitter_large").skitter({
		animation: "random",
		interval: 3000,
		numbers: false, 
		numbers_align: "right", 
		hideTools: false,
		controls: false,
		focus: false,
		focus_position: true,
		width_label:'500px', 
		enable_navigation_keys: true,   
		progressbar: false
	});
    jQuery(".box_skitter_large2").skitter({
        animation: "random",
        interval: 3000,
        numbers: false, 
        numbers_align: "right", 
        hideTools: false,
        controls: false,
        focus: false,
        focus_position: true,
        width_label:'500px', 
        enable_navigation_keys: true,   
        progressbar: false
    });
    jQuery(".box_skitter_large3").skitter({
        animation: "random",
        interval: 3000,
        numbers: false, 
        numbers_align: "right", 
        hideTools: false,
        controls: false,
        focus: false,
        focus_position: true,
        width_label:'250px', 
        enable_navigation_keys: true,   
        progressbar: false
    });
    jQuery(".box_skitter_large4").skitter({
        animation: "random",
        interval: 3000,
        numbers: false, 
        numbers_align: "right", 
        hideTools: false,
        controls: false,
        focus: false,
        focus_position: true,
        width_label:'250px', 
        enable_navigation_keys: true,   
        progressbar: false
    });
    jQuery(".box_skitter_large5").skitter({
        animation: "random",
        interval: 3000,
        numbers: false, 
        numbers_align: "right", 
        hideTools: false,
        controls: false,
        focus: false,
        focus_position: true,
        width_label:'250px', 
        enable_navigation_keys: true,   
        progressbar: false
    });
    jQuery(".box_skitter_large6").skitter({
        animation: "random",
        interval: 3000,
        numbers: false, 
        numbers_align: "right", 
        hideTools: false,
        controls: false,
        focus: false,
        focus_position: true,
        width_label:'250px', 
        enable_navigation_keys: true,   
        progressbar: false
    });

});
</script>

</body>
</html>