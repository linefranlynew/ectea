
$(document).ready(function() {
  //TesteDando ação ao botão de ID btnEntrar
  $('#btnEntrar').on('click', async function(e) {

    //Tirando o defalt de abrir algo quando clicar em um botão
    e.preventDefault();

    /*Criando constante config que irá receber os dados
    de login e senha do grupo Json, após receber essa constante
    estará preparada para enviar todos os dados listados da tela
    para a controller através do request */
    const config = {
      method: "post",
      headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({
          //Criando as variáveis json que recebe os valores 
          //das informações digitadas nos inputs atraves de seus ids
        login: $('#loginTxt').val(),
        senha: $('#senhaTxt').val()
      })
    };
    //Criando constante request que armazena o caminho para onde
    //quero enviar informações e quais informações quero enviar, após
    //neste caso, envia-se tudo o que está em config (login e senha)
    //para a controller informada (ControllerLogar)
    const request = await fetch('Controller/LogarController.php', config);

    //A variável responde armazena as informações que são devolvidas 
    //da Controller através do código request.json() 
    const response = await request.json();

    //Verifica se o status enviado é igual a 1
    if (response.status == 1) {
      //Caso seja 1 ele irá abrir a pagina inicial de administrador
      window.location.href = 'View/Administrador/AcessoAdm.html';
    }
    //Verifica se o status enviado é igual a 2
    else if (response.status == 2) {
      //Caso seja 2 ele irá abrir a pagina inicial de instituição
      window.location.href = 'View/Instituição/AcessoInst.html';        
    }
    //Verifica se o status enviado é igual a 3
    else if (response.status == 3) {
      //Caso seja 3 ele irá abrir a pagina inicial de professor / psicólogo
      window.location.href = 'View/Professor/AcessoInst.html';        
    }//Verifica se o status enviado é igual a 4
    else if (response.status == 4) {
      //Caso seja 4 ele irá abrir a pagina inicial de criança
      window.location.href = 'View/Aluno/AcessoInst.html';
    }
    else {
      //Se nenhuma das opções acima for atendida é por que não foi encontrado
      //nenhum login ou senha com os dados informados, apresentando o sistema
      //uma mensagem de erro.
      Swal.fire({
        title: 'Atenção!', 
        text: 'Login ou senha incorretos'         
      });
    }
  });
});