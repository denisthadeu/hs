<div class="shout-box">
    <div class="shout-text">
      <h1><?php 
      date_default_timezone_set('America/Sao_Paulo');
      $time = date("H");
      if($time > 5 && $time <= 11){
        echo "Bom dia! ";
      } elseif($time > 11 && $time <= 18){
        echo "Boa Tarde! ";
      } else {
        echo "Boa Noite! ";
      }
      echo $user->nome; ?></h1>
    </div>
</div><!-- /shout-box -->
   
<div class="row-fluid">
    
   <div class="span3">
          
        <div class="colored_banner thumb-content-dark">
        <img src="<?php echo Yii::app()->baseUrl;?>/img/icons/fatcow/wordpress.png" width="32" height="32" alt="Wordpress" />
        <h3>
        Wordpress themes
        </h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
        
        </div>
       
    </div>
     
      <div class="span3">
       
        <div class="colored_banner thumb-content-dark">
        <img src="<?php echo Yii::app()->baseUrl;?>/img/icons/fatcow/blogger.png" width="32" height="32" alt="Blogger" />
        <h3>
        Blogger themes
        </h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>

        </div>
      </div>
      
      <div class="span3">
          
        <div class="colored_banner thumb-content-dark">
        <img src="<?php echo Yii::app()->baseUrl;?>/img/icons/fatcow/css_3.png" width="32" height="32" alt="CSS3" />
        <h3>
        CSS3 themes
        </h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
        
        </div>
       
      </div>
      
      <div class="span3">
       
        <div class="colored_banner thumb-content-dark">
        <img src="<?php echo Yii::app()->baseUrl;?>/img/icons/fatcow/html_5.png" width="32" height="32" alt="HTML5" />
        <h3>
        HTML5 themes
        </h3>
        
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
        
        </div>
      </div>
    
  </div>

    <h3 class="header">Features
    	<span class="header-line"></span> 
    </h3>
    
    <div class="row-fluid">
    	<div class="span6">
        <div class="square-background clearfix">
           	<div class="square square-back pull-left">
               <img src="<?php echo Yii::app()->baseUrl;?>/img/icons/smashing/60px/60px-02.png" alt="" class="">
      		</div>
             <h4>Well documented</h4>
             <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante. </p>
        </div>
            
        <div class="square-background clearfix">
                <div class="square square-back pull-left">
                    <img src="<?php echo Yii::app()->baseUrl;?>/img/icons/smashing/60px/60px-05.png" alt="" class="">
      </div>
                 <h4>Quick setup</h4>
                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante. </p>
            </div>
            
        <div class="square-background clearfix">
                <div class="square square-back pull-left">
                    <img src="<?php echo Yii::app()->baseUrl;?>/img/icons/smashing/60px/60px-20.png" alt="" class="">
      </div>
                 <h4>Our customers love it</h4>
                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante. </p>
            </div>
        </div>
        <div class="span6">
        <div class="square-background clearfix">
                <div class="square square-back pull-left">
                    <img src="<?php echo Yii::app()->baseUrl;?>/img/icons/smashing/60px/60px-36.png" alt="" class="">
      </div>
                 <h4>Multiple browser</h4>
                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante. </p>
            </div>
            
        <div class="square-background clearfix">
                <div class="square square-back pull-left">
                    <img src="<?php echo Yii::app()->baseUrl;?>/img/icons/smashing/60px/60px-37.png" alt="" class="">
      </div>
                 <h4>Multiple devices</h4>
                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante. </p>
            </div>
            
        <div class="square-background clearfix">
                <div class="square square-back pull-left">
                    <img src="<?php echo Yii::app()->baseUrl;?>/img/icons/smashing/60px/60px-22.png" alt="" class="">
      </div>
                 <h4>It tastes like chicken</h4>
                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante. </p>
            </div>
            
        </div>
        
    </div>
  
  	<h3 class="header">Every theme has:
    	<span class="header-line"></span> 
    </h3>
  	  
    <div class="row-fluid">
  	  
      <div class="span4">
      	<div class="showcase-small">
            <div class="text-icon pull-left">
            <img src="<?php echo Yii::app()->baseUrl;?>/img/icons/fatcow/html_5.png" width="32" height="32" alt="Font" />
            </div>
            <h4>Valid HTML5</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      	</div>
        <div class="showcase-small">
            <div class="text-icon pull-left">
            <img src="<?php echo Yii::app()->baseUrl;?>/img/icons/fatcow/css_3.png" width="32" height="32" alt="Font" />
            </div>
            <h4>CSS3 Support</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      	</div>
      </div>
      <div class="span4">
      	<div class="showcase-small">
            <div class="text-icon pull-left">
            <img src="<?php echo Yii::app()->baseUrl;?>/img/icons/fatcow/layouts_header_2.png" width="32" height="32" alt="Font" />
            </div>
            <h4>Multiple layouts</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      	</div>
        <div class="showcase-small">
            <div class="text-icon pull-left">
            <img src="<?php echo Yii::app()->baseUrl;?>/img/icons/fatcow/cog_edit.png" width="32" height="32" alt="Font" />
            </div>
            <h4>Easy Customization</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      	</div>
      </div>
      
      <div class="span4">
      	<div class="showcase-small">
            <div class="text-icon  pull-left">
            <img src="<?php echo Yii::app()->baseUrl;?>/img/icons/fatcow/large_tiles.png" width="32" height="32" alt="Font" />
            </div>
            <h4>Multiple Colors</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      	</div>
        <div class="showcase-small">
            <div class="text-icon  pull-left">
            <img src="<?php echo Yii::app()->baseUrl;?>/img/icons/fatcow/ipad.png" width="32" height="32" alt="Ipad" /></div>
            <h4>Responsive Layout</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      	</div>
      </div>

  </div><!--/row-fluid-->
  
  
  <h3 class="header">Our customers
  	<span class="header-line"></span>  
  </h3>
  <div class="row-fluid">
    <div class="span3 center">
        <img src="<?php echo Yii::app()->baseUrl;?>/img/customers/themeforest.png" alt="Themeforest" />
    </div>
    <div class="span3">
        <img src="<?php echo Yii::app()->baseUrl;?>/img/customers/codecanyon.png" alt="Codecanyon" />
    </div>
    <div class="span3">
        <img src="<?php echo Yii::app()->baseUrl;?>/img/customers/graphicriver.png" alt="Graphicriver" />
    </div>
    <div class="span3">
        <img src="<?php echo Yii::app()->baseUrl;?>/img/customers/photodune.png" alt="Photodune" />
    </div>
      
</div><!--/row-fluid-->