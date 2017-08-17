<?= $this->Html->script('controller/atestados.cadastro.js', ['block' => 'scriptBottom']) ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-content">
                        <?php
                            echo $this->Form->create($atestado, [
                                "url" => [
                                    "controller" => "atestados",
                                    "action" => "save",
                                    $id
                                ],
                                "role" => "form"]);
                            ?>
                                <?=$this->element('message', [
                                'name' => 'cadastro_erro',
                                'type' => 'error',
                                'message' => 'Ocorreu um erro ao salvar o atestado',
                                'details' => ''
                            ]) ?>
                            <?= $this->Flash->render() ?>
                            <legend>Dados Cadastrais</legend>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group label-control">
                                        <?= $this->Form->label("funcionario", "Funcionário") ?>
                                        <?= $this->Form->hidden("funcionario", ["id" => "id_funcionario"]) ?>
                                        <?= $this->Form->text("nome_funcionario", ["id" => "nome_funcionario", "class" => "form-control", "maxlength" => 80]) ?>
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group label-control">
                                        <?= $this->Form->label("data_emissao", "Data de Emissão") ?>
                                        <?= $this->Form->text("data_emissao", ["id" => "data_emissao", "class" => "form-control", "maxlength" => 14]) ?>
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group label-control">
                                        <?= $this->Form->label("data_afastamento", "Data de Afastamento") ?>
                                        <?= $this->Form->text("data_afastamento", ["id" => "data_afastamento", "class" => "form-control", "maxlength" => 14]) ?>
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group label-control">
                                        <?= $this->Form->label("data_retorno", "Data de Retorno") ?>
                                        <?= $this->Form->text("data_retorno", ["id" => "data_retorno", "class" => "form-control", "maxlength" => 11]) ?>
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group label-control">
                                        <?= $this->Form->label("quantidade_dias", "Quantidade de Dias") ?>
                                        <?= $this->Form->number("quantidade_dias", ["id" => "quantidade_dias", "class" => "form-control", "maxlength" => 3]) ?>
                                        <span class="material-input"></span>
                                    </div>
                                </div>  
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?= $this->Form->label("medico", "Médico") ?>
                                        [<a class="link_build_form" href="#" data-toggle="modal" data-target="#modal_medico">Adicionar médico</a>]
                                        <?= $this->Form->hidden("medico") ?>
                                        <?= $this->Form->text("nome_medico", ["id" => "nome_medico", "class" => "form-control", "maxlength" => 80]) ?>
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <?= $this->Form->label("cid", "CID") ?>
                                        <?= $this->Form->text("cid", ["id" => "cid", "class" => "form-control", "maxlength" => 3]) ?>
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?= $this->Form->label("motivo", "Motivo") ?>
                                        <?= $this->Form->text("motivo", ["id" => "motivo", "class" => "form-control", "maxlength" => 160]) ?>
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">                            
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <?= $this->Form->label("observacao", "Observação") ?> <br/>
                                        <?= $this->Form->textarea("observacao", ["id" => "observacao", "class" => "form-control"]) ?>
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Outras Opções</label> <br/>
                                        <div class="togglebutton">
                                            <label>
                                                <?= $this->Form->checkbox("inss") ?> Afastado por INSS
                                            </label>
                                        </div>
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" onclick="return validar()" class="btn btn-success pull-right">Salvar</button>
                            <button type="reset" class="btn btn-default pull-right">Limpar</button>
                            <button type="button" onclick="window.location='<?= $this->Url->build('/atestados') ?>'" class="btn btn-info pull-right">Voltar</button>
                            <div class="clearfix"></div>
                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_medico" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="material-icons">clear</i>
                </button>
                <h4 class="modal-title">Novo Médico</h4>
            </div>
            <div class="modal-body">
            <?php
                echo $this->Form->create('Medico', [
                    "url" => [
                        "controller" => "medico",
                        "action" => "save",
                        $id
                    ],
                    "role" => "form"]);
                ?>
                <?=$this->element('message', [
                    'name' => 'cadastro_erro_popup',
                    'type' => 'error',
                    'message' => 'Ocorreu um erro ao salvar o médico.',
                    'details' => ''
                ]) ?>
                <?=$this->element('message', [
                    'name' => 'cadastro_sucesso_popup',
                    'type' => 'success',
                    'message' => 'O médico foi salvo com sucesso.',
                ]) ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group label-control">
                            <?= $this->Form->label("nome", "Nome") ?>
                            <?= $this->Form->text("nome", ["id" => "nome", "class" => "form-control", "maxlength" => 80]) ?>
                            <span class="material-input"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group label-control">
                            <?= $this->Form->label("crm", "CRM") ?>
                            <?= $this->Form->text("crm", ["id" => "crm", "class" => "form-control", "maxlength" => 6]) ?>
                            <span class="material-input"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group label-control">
                            <?= $this->Form->label("especialidade", "Especialidade") ?>
                            <?= $this->Form->text("especialidade", ["id" => "especialidade", "class" => "form-control", "maxlength" => 50]) ?>
                            <span class="material-input"></span>
                        </div>
                    </div>
                </div>
                <?php echo $this->Form->end(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Fechar<div class="ripple-container"><div class="ripple ripple-on ripple-out" style="left: 50.5833px; top: 23px; background-color: rgb(244, 67, 54); transform: scale(8.51042);"></div></div></button>
                <button type="button" class="btn btn-success btn-simple" onclick="return salvarMedico()">Salvar<div class="ripple-container"></div></button>
            </div>
        </div>
    </div>
</div>
