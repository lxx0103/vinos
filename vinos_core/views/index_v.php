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
                    <?php foreach($maps as $map):?>                      
                        <div class="one_third <?=$map['id']==3?'lastcols':''?><?=$map['id']==6?'lastcols':''?>">
                            <div class="frame">
                            <img src="<?=$map['img']?>" alt="" /><h5><a href="/bodegas?zone_id=<?=$map['zone_id']?>" style="color: black;"><?=$sorted_zones[$map['zone_id']]['name']?></a></h5>
                            </div>
                        </div>
                    <?php endforeach?>
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
setInterval(resetimg,300);
function resetimg(){
    $('.box_skitter_large').find('img').css('width', '500px');
    $('.box_skitter_large2').find('img').css('width', '500px');
    $('.box_skitter_large3').find('img').css('width', '250px');
    $('.box_skitter_large4').find('img').css('width', '250px');
    $('.box_skitter_large5').find('img').css('width', '250px');
    $('.box_skitter_large6').find('img').css('width', '250px');
}
</script>

</body>
</html>