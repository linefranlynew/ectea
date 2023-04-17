<!DOCTYPE html>
<html>
<head>
    <title>Exemplo de Carregamento de Imagens Aleatórias</title>
    <style>
        /* Estilos para o grid de exibição das imagens */
        .container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 10px;
            margin: 50px auto;
            width: 90%;
        }
        .container .imagem {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 200px;
            background-color: #f5f5f5;
            border-radius: 5px;
        }
        .container .imagem img {
            max-width: 100%;
            max-height: 150px;
            object-fit: cover;
            border-radius: 5px;
        }
        .container .titulo {
            font-size: 16px;
            font-weight: bold;
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="grid1">
        <h2>Grid 1</h2>
        <div class="container">
            <?php
                require_once('../../../Configuracoes/Conexao.php');
                require_once('../../../Model/TarefasImagemModel.php');
                $conexao = new Conexao();
                //Criando variável que irá receber a função abrirConexao 
                //contida no objeto
                $db = $conexao->abrirConexao();
                //Criando objeto do tipo UsuarioModel e passando como parametro 
                //a variável db
                $model = new TarefasImagemModel($db);

                $imagens1 = $model->getImagensAleatorias(1);
                $imagens2 = $model->getImagensAleatorias(1);
 
               if (isset($imagens1)) {               
                foreach ($imagens1 as $imagem) {
                    // Exibir a imagem e o nome em um grid com duas colunas
                    echo "<div class='imagem'><img src='" . $imagem["caminho"]. "'></div>";
                    echo "<div class='titulo'>" . $imagem["frase"] . "</div>";
                    

                }                
            }            
            ?>
        </div>
    </div>

    <div class="grid2">
        <h2>Grid 2</h2>
        <div class="container">
            <?php
                if (isset($imagens1)) {                    
                    foreach ($imagens2 as $imagem) {
                        // Exibir a imagem e o nome em um grid com duas colunas
                        echo "<div class='imagem'><img src='" . $imagem["caminho"]. "'></div>";
                        echo "<div class='titulo'>" . $imagem["frase"] . "</div>";
                    }
                }
            ?>
        </div>
    </div>

    <script>
      // Código JavaScript para exibir as imagens aleatoriamente na página
        var grids = document.querySelectorAll(".grid1 .container, .grid2 .container");
        for (var i = 0; i < grids.length; i++) {
        var imagens = grids[i].querySelectorAll(".imagem");
        for (var j = imagens.length; j >= 0; j--) {
            if (j > 0) {
                var randomIndex = Math.floor(Math.random() * j);
                grids[i].appendChild(imagens[randomIndex]);
                alert('teste');
    }
}
        }
    </script>
</body>
</html>
