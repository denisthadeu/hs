<?php
function mask($val, $mask){
    $maskared = '';
    $k = 0;
    for($i = 0; $i<=strlen($mask)-1; $i++){
        if($mask[$i] == '#'){
            if(isset($val[$k]))
                $maskared .= $val[$k++];
        } else {
            if(isset($mask[$i]))
                $maskared .= $mask[$i];
        }
    }
    return $maskared;
}
?>
<?php $this->widget('bootstrap.widgets.TbAlert', array()); ?>
<div class="row-fluid" style="padding-bottom: 10px;">
    <div class="span9"><h1>Hotel<small>/Lista de Hotéis</small></h1></div>
    <div class="span2 offset1">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'label' => 'Criar Hotel',
            'type' => 'primary',
            'size' => 'large',
            'url' => array('create'),
            'block' => true
        ));
        ?>
    </div>
</div>
<div class="row-fluid" id="pagination">
    <div class="span11 center">
        <?php 
        $this->widget('CLinkPager', array('pages' => $pages,
            'nextPageLabel'=>'Próximo > ',
            'prevPageLabel'=>' < Anterior',
            'header'=>'',
        )); ?>
    </div>
</div>
<div class="row-fluid">
    <div class="span12 center">
        <div class="row-fluid" style="background-color: #006dcc;color: white;padding-top: 5px; font-weight: bold; margin-bottom: 18px; ">
            <div class="span4">Nome</div>
            <div class="span3">CNPJ</div>
            <div class="span3">Filial</div>
            <div class="span2">Status</div>
        </div>
        <?php 
        if(count($models) > 0){
            foreach($models as $model){
                ?>
                <div class="row-fluid" style="background-color: #FFF;padding-top: 5px; font-weight: bold; ">
                    <div class="span4">
                        <div class="row-fluid">
                            <div class="span2">
                                <div class="btn-group">
                                    <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-wrench icon-white"></i> <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                      <li><a href="<?php echo $this->createUrl('hotel/update',array('id'=>$model->id)); ?>"><i class="icon-pencil"></i>Editar</a></li>
                                      <li class="divider"></li>
                                      <?php if($model->status == "a"){ ?>
                                      <li><a href="<?php echo $this->createUrl('hotel/inactive',array('id'=>$model->id)); ?>"><i class="icon-ban-circle"></i>Inativar</a></li>
                                      <?php } elseif($model->status == "i") { ?>
                                      <li><a href="<?php echo $this->createUrl('hotel/active',array('id'=>$model->id)); ?>"><i class="icon-ok-circle"></i>Ativar</a></li>
                                      <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="span10">
                                <?php echo $model->nome; ?>
                            </div>
                        </div>
                    </div>
                    <div class="span3"><?php echo mask($model->cnpj,'##.###.###/####-##'); ?></div>
                    <div class="span3"><?php echo $model->affiliate->nome; ?></div>
                    <div class="span2"><?php echo ($model->status == "a") ? "Ativo" : "Inativo"; ?></div>
                </div>
                <div class="row-fluid" style="background-color: #FFF;padding-top: 5px; font-weight: bold; "><hr></div>
                <?php
            }
        }
        ?>
    </div>
</div>
<div class="row-fluid" id="pagination">
    <div class="span11 center">
        <?php 
        $this->widget('CLinkPager', array('pages' => $pages,
            'nextPageLabel'=>'Próximo > ',
            'prevPageLabel'=>' < Anterior',
            'header'=>'',
        )); ?>
    </div>
</div>