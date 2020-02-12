<?php
	$id = _ACTION_VIEW_PARAMETER_ID;
	
	$grid_menu1_placeholder='';
	$grid_menu2_placeholder='';
	$grid_menu3_placeholder='';
	$grid_menu4_placeholder='';
	$grid_menu5_placeholder='';

	$GridMenuObj = new GridMenu();
	$grid_menu1_placeholder = $GridMenuObj->CreateGridMenu('Web Technologies & Web Applications',$id);
	$grid_menu2_placeholder = $GridMenuObj->CreateGridMenu('Operating Systems & Softwares',$id);
	$grid_menu3_placeholder = $GridMenuObj->CreateGridMenu('Forums & Discussions',$id);
	$grid_menu4_placeholder = $GridMenuObj->CreateGridMenu('News & Events',$id);
	$grid_menu5_placeholder = $GridMenuObj->CreateGridMenu('Showcase of Projects & Show Your Websites',$id);
?>
	
	<div class="info-col">
        <h2>Web Technologies <hr /> Web Applications</h2>
        <a class="image flower1" href="#">View Image</a>
        <?php echo $grid_menu1_placeholder;?>
      </div>
	  <div class="info-col">
        <h2>Operating Systems<hr />Softwares</h2>
	    <a class="image flower2" href="#">View Image</a>
        <?php echo $grid_menu2_placeholder;?>
      </div>
	  <div class="info-col">
        <h2>Forums<hr />Discussions</h2>
	    <a class="image flower3" href="#">View Image</a>
         <?php echo $grid_menu3_placeholder;?>
      </div>
	  <div class="info-col">
        <h2>Other News<hr />Events</h2>
	    <a class="image flower4" href="#">View Image</a>
        <?php echo $grid_menu4_placeholder;?>
      </div>
	  
	  <div class="info-col">
        <h2>Showcase of Projects<hr />Show Your Websites</h2>
	    <a class="image flower5" href="#">View Image</a>
        <?php echo $grid_menu5_placeholder;?>
      </div>