<section id="navigation-main">  
<div class="navbar">
	<div class="navbar-inner">
    <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
  
          <div class="nav-collapse">
			<?php $this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=>array('class'=>'nav'),
                    'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
					'itemCssClass'=>'item-test',
                    'encodeLabel'=>false,
                    'items'=>array(
                        // Not Logged
                        //array('label'=>'Home ', 'url'=>array('/site/index'), 'visible'=>Yii::app()->user->isGuest,'linkOptions'=>array("data-description"=>"Página Inicial")),
                        array('label'=>'A Empresa', 'url'=>array('/site/about'), 'visible'=>Yii::app()->user->isGuest,'linkOptions'=>array("data-description"=>"Sobre Nós")),
                        array('label'=>'Fale Conosco', 'url'=>array('/site/contact'), 'visible'=>Yii::app()->user->isGuest,'linkOptions'=>array("data-description"=>"Entre em Contato")),
                        
                        // Login
                        array('label'=>'Styles <span class="caret"></span>', 'url'=>'#', 'visible'=>!Yii::app()->user->isGuest,'itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown","data-description"=>"6 styles"), 
                        'items'=>array(
                            array('label'=>'<span class="style" style="background-color:#b88006;"></span> Style 1', 'url'=>"javascript:chooseStyle('none', 60)"),
                            array('label'=>'<span class="style" style="background-color:#e42e5d;"></span> Style 2', 'url'=>"javascript:chooseStyle('style2', 60)"),
                            array('label'=>'<span class="style" style="background-color:#c80681;"></span> Style 3', 'url'=>"javascript:chooseStyle('style3', 60)"),
                            array('label'=>'<span class="style" style="background-color:#51a351;"></span> Style 4', 'url'=>"javascript:chooseStyle('style4', 60)"),
                            array('label'=>'<span class="style" style="background-color:#0088CC;"></span> Style 5', 'url'=>"javascript:chooseStyle('style5', 60)"),
                            array('label'=>'<span class="style" style="background-color:#f9630f;"></span> Style 6', 'url'=>"javascript:chooseStyle('style6', 60)"),
                        )),
						
                        array('label'=>'Controle <span class="caret"></span>', 'url'=>array('/site/page', 'view'=>'columns'), 'visible'=>!Yii::app()->user->isGuest,'itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown","data-description"=>"Cadastros"), 
                        'items'=>array(
                            array('label'=>'Empresa', 'url'=>array('/company/index', 'view'=>'empresas')),
                            array('label'=>'Filial', 'url'=>array('/affiliate/index', 'view'=>'filiais')),
                            array('label'=>'Hotel', 'url'=>array('/hotel/index', 'view'=>'hoteis')),
                            array('label'=>'Apartamento', 'url'=>array('/apartment/index', 'view'=>'apartamentos')),
                        )),

                        
                        array('label'=>'Portfolio <span class="caret"></span>', 'url'=>array('/site/page', 'view'=>'portfolio-4-cols'), 'visible'=>!Yii::app()->user->isGuest,'itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown","data-description"=>"some of our work"), 
                        'items'=>array(
                            array('label'=>'4 columns', 'url'=>array('/site/page', 'view'=>'portfolio-4-cols')),
                            array('label'=>'3 columns', 'url'=>array('/site/page', 'view'=>'portfolio-3-cols')),
                            array('label'=>'2 columns', 'url'=>array('/site/page', 'view'=>'portfolio-2-cols')),
                            array('label'=>'1 column', 'url'=>array('/site/page', 'view'=>'portfolio-1-col')),
                        )),
                        array('label'=>'Blog <span class="caret"></span>', 'url'=>array('/site/page', 'view'=>'blog'), 'visible'=>!Yii::app()->user->isGuest,'itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown","data-description"=>"our blog"), 
                        'items'=>array(
                            array('label'=>'Blog - Large image', 'url'=>array('/site/page', 'view'=>'blog')),
                                array('label'=>'Blog - Small image', 'url'=>array('/site/page', 'view'=>'blog-small-picture')),
                                array('label'=>'Blog - Item', 'url'=>array('/site/page', 'view'=>'blog-item')),
                        )),
                        
                        
                        
                        //Login and logout
                        array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest,'linkOptions'=>array("data-description"=>"Acesso público")),
                        array('label'=>'Sair ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest,'linkOptions'=>array("data-description"=>"Acesso Restrito")),
                    ),
                )); ?>
    	</div>
    </div>
	</div>
</div>
</section><!-- /#navigation-main -->