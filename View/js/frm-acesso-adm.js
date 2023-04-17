/*Iniciando o script responsável pela tela de cadastro 
Aqui podem criar um externo se quiserem, basta criar um novo arquivo .js,
colocar dentro da pasta js e tambpem importar o script como 
feito acima */
async function cadastrarAcesso(e) {

  //Criando constantes que irão receber os ids contidos no 
  //Formulário html
  const txtRazaoSocial = $('#txtRazaoSocial').val();
  const txtCNPJ = $('#txtCNPJ').val();
  const txtUnidade = $('#txtUnidade').val();
  const txtEmail = $('#txtEmail').val();
  const txtSenha = $('#txtSenha').val();
  const txtTelefone = $('#txtTelefone').val();
  const tta = $('#txtTipoAcesso').val();

  /*Verifica qual é a opção selecionada na lista de opções e guarda o 
  valor na variável txtTipoAcesso para ser utilizada posteriormente*/
  if(tta == "Selecione"){
    alert("Informe um perfil de acesso!")
    txtTipoAcesso = 0;
  }
  else if(tta == "Administrador(a)"){
    txtTipoAcesso = 1;
  }
  else if(tta == "Aluno(a)"){
    txtTipoAcesso = 2;
  }
  else if(tta == "Instituição"){
    txtTipoAcesso = 3;
  }
  else if(tta == "Professor(a)"){
    txtTipoAcesso = 4;
  }
  else{
    txtTipoAcesso = 5;
  }


  /*Criando a constante config onde nela iremos passar as configurações
  iniciais do JSON bem como criar as variáveis JSON que irão receber 
  as constantes javascripts criadas acima e assim enviar os dados 
  deste arquivo (cadastro.php) para a classe Controller*/
  const config = {
        method: 'post',
        headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/json' },
        body: JSON.stringify({
          razaoSocial: txtRazaoSocial,
          cnpj: txtCNPJ,
          unidade: txtUnidade,
          email: txtEmail,
          senha: txtSenha,
          telefone: txtTelefone,
          tipoAcesso: txtTipoAcesso
        
        })};

      console.log(txtRazaoSocial, txtCNPJ, txtUnidade, txtEmail, txtSenha, txtTelefone, txtTipoAcesso);
      //Criando constante request que é a responsável por informar
      //o caminho para onde e quais são as informações 
      const request = await fetch('../../Controller/AdmCadastrarAcesso.php', config);

      //Criando constante resultado que é a responsável por receber
      //da controller o resultado do cadastro 
      const resultado = await request.json();

      //Verificado qual o valor recebido em resultado
      if (resultado.status == 1) {
        alert("Cadastro realizado com sucesso!");
        window.location.reload();
      } else {
        alert('Atenção!Verifique as informações no form');
      }
}



async function carregarDados(){
    const request = await fetch(
                  '../../Controller/AdmListarAcessos.php',
                  {method: 'get'});
    const response = await request.json();
    const conteudoAcesso = document.getElementById('conteudo-acesso');
    
    for (const item of response.dados) {
      conteudoAcesso.innerHTML += `
        <tr class = "alert alert-warning">
          <td>${item.id}</td>
          <td>${item.razaoSocial}</td>
          <td>${item.CNPJ}</td>
          <td>${item.unidade}</td>          
          <td>${item.email}</td>
          <td>${item.senha}</td>
          <td>${item.telefone}</td>
          <td>
            <div class="row">
              <button class="btn btn-warning"  data-toggle="modal" data-target="#modalEditar"
                      onclick="editarAcesso(${item.id})">
                      <i class="fa-solid fa-pen-to-square"></i>
              </button>
              <button class="btn btn-danger"
                      onclick="RemoverAcesso(${item.id})">
                <i class="fas fa-trash"></i>
              </button>
            </div>
          </td>
        </tr>`;
    }
  }

  async function editarAcesso(id) {
  const config = {
        method: "post",
        headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({idAcesso: id })
      };

      const request = await fetch('../../Controller/AdmListarUsuarioPeloID.php', config);
      const response = await request.json();

    const { dados } = response;
    $('#txtRazaoSocialE').val(dados[0].razaoSocial);
    $('#txtCNPJE').val(dados[0].CNPJ);
    $('#txtUnidadeE').val(dados[0].unidade);
    $('#txtTelefoneE').val(dados[0].telefone);
    $('#txtTipoAcessoE').val(dados[0].tipoAcesso);
    
    $('#btnAtualizar').on('click', async function(e) {
    await alteraDados(id);
  });
 
    
}

async function alteraDados(e) {
  const txtRazaoSocial = $('#txtRazaoSocialE').val();
  const txtCNPJ = $('#txtCNPJE').val();
  const txtUnidade = $('#txtUnidadeE').val();
  const txtEmail = $('#txtEmailE').val();
  const txtSenha = $('#txtSenhaE').val();
  const txtTelefone = $('#txtTelefoneE').val();
  const txtTipoAcesso = $('#txtTipoAcessoE').val();

  const config = {
        method: "post",
        headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({
          razaoSocial: txtRazaoSocial,
          cnpj: txtCNPJ,
          unidade: txtUnidade,
          telefone: txtTelefone,
          tipoAcesso: txtTipoAcesso,
          idUsuario: e
        })
      };

      const request = await fetch(
        '../../Controller/AdmAtualizarUsuario.php',
        config);
      const response = await request.json();
      if (response.status == 1) {
        Swal.fire('Atenção!', 'dados cadastrados com sucesso', 'success')
        .then(res => window.location.href = 'ListaAcesso.php');
      } else {
        Swal.fire('Atenção!', 'Verifique as informações no form', 'error');
      }
}

function RemoverAcesso(id) {
  Swal.fire({
    title: 'Atenção!',
    text: 'Tem certeza que deseja remover esse acesso?',
    icon: 'question',
    showConfirmButton: true,
    showCancelButton: true,
  }).then(async function(res) {
    if (res.isConfirmed) {
      const config = {
        method: 'post',
        body: JSON.stringify({
          idAcesso: id
        })
      };
      const request = await fetch(
      '../../Controller/AdmDeletarAcesso.php', config);
      const response = await request.json();
      if (response.status == 1) {
        Swal.fire('Atenção!', 'Acesso removido com sucesso', 'success');
        window.location.reload();
      } else {
        Swal.fire('Atenção!', 'Erro ao remover acesso.', 'error');
      }
    }
  });
}

//Responsável por chamar a função cadastrarDados quando 
//o botão for clicado
$(document).ready(function() {
  carregarDados(); 

  $('#btnCadastrar').on('click', async function(e) {
    await cadastrarAcesso(e);
  });
});
