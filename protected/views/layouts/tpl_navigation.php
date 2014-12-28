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
                        array('label'=>'Controle <span class="caret"></span>', 'url'=>array('/site/page', 'view'=>'columns'), 'visible'=>!Yii::app()->user->isGuest,'itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown","data-description"=>"Cadastros"), 
                        'items'=>array(
                            array('label'=>'Empresa', 'url'=>array('/company/index', 'view'=>'empresas')),
                            array('label'=>'Filial', 'url'=>array('/affiliate/index', 'view'=>'filiais')),
                            array('label'=>'Hotel', 'url'=>array('/hotel/index', 'view'=>'hoteis')),
                            array('label'=>'Apartamento', 'url'=>array('/apartment/index', 'view'=>'apartamentos')),
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