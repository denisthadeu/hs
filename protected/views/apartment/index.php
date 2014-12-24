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
    <div class="span9"><h1>Apartamento<small>/Lista de apartamentos</small></h1></div>
    <div class="span2 offset1">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'label' => 'Criar Apartamento',
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

        <table class="table table-striped">
              <thead>
                <tr>
                  <th>&nbsp;</th>
                  <th>Hotel</th>
                  <th>Bloco</th>
                  <th>Apartamento</th>
                  <th>Telefone</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                if(count($models) > 0){
                    foreach($models as $model){
                        ?>
                        <tr>
                          <td>
                            <div class="btn-group">
                                    <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-wrench icon-white"></i> <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                      <li><a href="<?php echo $this->createUrl('apartament/update',array('id'=>$model->id)); ?>"><i class="icon-pencil"></i>Editar</a></li>
                                      <li class="divider"></li>
                                      <?php if($model->status == "a"){ ?>
                                      <li><a href="<?php echo $this->createUrl('apartament/inactive',array('id'=>$model->id)); ?>"><i class="icon-ban-circle"></i>Inativar</a></li>
                                      <?php } elseif($model->status == "i") { ?>
                                      <li><a href="<?php echo $this->createUrl('apartament/active',array('id'=>$model->id)); ?>"><i class="icon-ok-circle"></i>Ativar</a></li>
                                      <?php } ?>
                                    </ul>
                                </div>
                            </div>
                          </td>
                          <td><?php echo $model->hotel->nome; ?></td>
                          <td><?php echo mask($model->cnpj,'##.###.###/####-##'); ?></td>
                          <td><?php echo $model->nome_proprietario; ?></td>
                          <td><?php echo (!empty($model->telefone)) ? mask($model->telefone,'(##) ####-####') : null; ?></td>
                          <td><?php echo ($model->status == "a") ? "Ativo" : "Inativo"; ?></td>
                        </tr>
                    <?php
                    }
                }
                ?>
            </tbody>
        </table>
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