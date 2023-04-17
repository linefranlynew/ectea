<?php 
  session_start();
  if (!$_SESSION['logado']) {
    header('location:../Login.html');
    
  }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/622fcd2613.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://kit.fontawesome.com/622fcd2613.css" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <script src="../js/frm-acesso-adm.js" type="text/javascript"></script>

    <title>Acesso</title>
</head>
<body>
    <header>
        <nav>
            
        </nav>
    </header>
    
    <div>
        <center>
        
        <div class="card border-danger mb-3" style="max-width: 50rem; margin-top: 50px; text-align: center;">
            <div class="card-header" style="background-color: #dc3545; color: white;"><h5 class="card-title">UNIDADES CADASTRADAS</h5></div>
            <div class="card-body text-danger">
           <br>
           <div class="table-responsive">
            <table class="table table-condensed table-bordered table-hover">
              <thead>
                <tr class = "alert alert-info">
                  <th>ID</th>
                  <th>Razão Social</th>
                  <th>CNPJ</th>
                  <th>Unidade</th>
                  <th>Email</th>
                  <th>Senha</th>
                  <th>Telefone</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody id="conteudo-acesso"></tbody>
            </table>
          </div>
             <!-- Botão para acionar modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalExemplo" class="btn btn-primary" style="background-color: #8BD97B; border: none; width: 140px; margin-left: 75%;">
    Cadastrar
  </button>
</center>
  <br>
  <!-- Modal -->
  <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cadastrar Acesso</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-bodymodal-dialog-centered">
            <div class="card-body">
                <form id="formCrianca" style="margin-left: 2rem; color: orange; font-weight: bold;">
                    <div class="row">
                        <div  style="position: relative; width: 65%;">
                            <label for="txtRazaoSocial" class="rotulo">Razão Social:</label>
                            <input type="text" id="txtRazaoSocial" name="razaoSocial" placeholder="Informe o nome do aluno" maxlength="200" required class="form-control" style="width: 100%;position: relative;">
                        </div>
                        <div class="col-4 col-s-6" style="position: relative; width: 30%;">
                            <label for="txtCNPJ" class="rotulo">CNPJ:</label>
                            <input type="number" id="txtCNPJ" name="cnpj" class="form-control" placeholder="Turma" style="width: 100%;position: relative;">
                        </div>
                        <div class="row"style=" width:190%;" >
                        <div class="col-4 col-s-6" style="position: relative; width:100%;">
                            <label for="txtUnidade" class="rotulo">Unidade:</label>
                            <input type="text" id="txtUnidade" name="unidade" class="form-control" style="width: 100%;position: relative;">
                        </div>
                        <div class="col-4 col-s-6" style="position: relative; width: 50%;">
                            <label for="txtEmail" class="rotulo">Email:</label>
                            <input type="email" id="txtEmail" name="email" class="form-control"  style="width: 100%;position: relative;" >
                        </div>
                        <div class="col-4 col-s-6" style="position: relative; width: 50%;">
                            <label for="txtSenha" class="rotulo">Senha:</label>
                            <input type="password" id="txtSenha" name="senha" class="form-control"  style="width: 100%;position: relative;" >
                        </div>
                        <div class="col-4 col-s-6" style="position: relative; width: 50%;">
                            <label for="txtTelefone" class="rotulo">Telefone:</label>
                            <input type="number" id="txtTelefone" name="telefone" class="form-control"  style="width: 100%;position: relative;" >
                        </div>
                        <div class="col-4 col-s-6" style="position: relative; width: 50%;">
                            <label for="txtTipoAcesso" class="rotulo">Tipo de Acesso:</label>
                            <select class="form-control" id="txtTipoAcesso">
                              <option>Selecione</option> 
                              <option>Administrador(a)</option>
                              <option>Aluno(a)</option>
                              <option>Instituição</option>
                              <option>Professor(a)</option>                              
                              <option>Psicólogo(a)</option>
                            </select>
                        </div>
                    </div>
                    </div>                    
                </form>
            </div>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          <button type="button" id="btnCadastrar" class="btn btn-primary">Salvar cadastro</button>
        </div>
      </div>
    </div>
  </div>
 </div>
</div>


 <!-- Modal Editar -->
 <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Acesso</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-bodymodal-dialog-centered">
            <div class="card-body">
                <form id="formEditar" style="margin-left: 2rem; color: orange; font-weight: bold;">
              
                      <div class="row">
                        <div  style="position: relative; width: 65%;">
                            <label for="txtRazaoSocialE" class="rotulo">Razão Social:</label>
                            <input type="text" id="txtRazaoSocialE" name="razaoSocialE" placeholder="Informe o nome do aluno" maxlength="200" required class="form-control" style="width: 100%;position: relative;">
                        </div>
                        <div class="col-4 col-s-6" style="position: relative; width: 30%;">
                            <label for="txtCNPJE" class="rotulo">CNPJ:</label>
                            <input type="number" id="txtCNPJE" name="cnpjE" class="form-control" placeholder="Turma" style="width: 100%;position: relative;">
                        </div>
                        <div class="row"style=" width:190%;" >
                        <div class="col-4 col-s-6" style="position: relative; width:100%;">
                            <label for="txtUnidadeE" class="rotulo">Unidade:</label>
                            <input type="text" id="txtUnidadeE" name="unidadeE" class="form-control" style="width: 100%;position: relative;">
                        </div>
                        <div class="col-4 col-s-6" style="position: relative; width: 50%;">
                            <label for="txtTelefoneE" class="rotulo">Telefone:</label>
                            <input type="number" id="txtTelefoneE" name="telefoneE" class="form-control"  style="width: 100%;position: relative;" >
                        </div>
                        <div class="col-4 col-s-6" style="position: relative; width: 50%;">
                            <label for="txtTipoAcessoE" class="rotulo">Tipo de Acesso:</label>
                            <input type="number" id="txtTipoAcessoE" name="txtTipoAcessoE" class="form-control"  style="width: 100%;position: relative;" >
                        </div>
                    </div>
                    </div>                    
                </form>
            </div>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          <button type="button" id="btnAtualizar"  class="btn btn-primary">Salvar mudanças</button>
        </div>
      </div>
    </div>
  </div>
 </div>
</div>
    <div id="lapis">
        <div>
          <img src="../imagens/lapisesquerda.png"/>
        </div><div>
          <img src="../imagens/lapisdireitapng.png">
        </div>
        </div>
</body>

<!--Importando os scripts da pasta js-->
<script src="../js/jquery-3.6.0.min.js" type="text/javascript"></script>
<script src="../js/sweetalert2.all.min.js" type="text/javascript"></script>
<script src="../js/bootstrap.min.js" type="text/javascript"></script>

</html>