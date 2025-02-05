<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Planta</title>
    <link rel="stylesheet" href="../../public/css/styleCadastro.css">
    <link rel="stylesheet" href="../../public/css/styleCadastroHeader.css">
</head>
<body>
    <header>
        <?php include '../../templates/headerCadastro.php'; ?>
    </header>
    <main>
        <form action="../models/incluir-planta.php" method="POST">
            <div class="linha">
                <div class="coluna">
                    <div class="label-input">
                        <label for="nome-popular">Nome popular:</label>
                        <input type="text" name="nome_popular" id="nome-popular" required>
                    </div>
                    <div class="label-input">
                        <label for="nome-cientifico">Nome científico:</label>
                        <input type="text" name="nome_cientifico" id="nome-cientifico" required>
                    </div>
                    <div class="label-input">
                        <label for="familia">Família:</label>
                        <input type="text" name="familia" id="familia" required>
                    </div>
                    <div class="label-input">
                        <label for="genero">Gênero:</label>
                        <input type="text" name="genero" id="genero" required>
                    </div>
                    <div class="label-input">
                        <label for="ciclo_de_vida">Ciclo de vida:</label>
                        <input type="text" name="ciclo_de_vida" id="ciclo_de_vida" required>
                    </div>
                    <div class="label-input">
                        <label for="origem">Origem:</label>
                        <input type="text" name="origem" id="origem" required>
                    </div>
                    <div class="label-input">
                        <label for="luminosidade">Luminosidade:</label>
                        <input type="text" name="luminosidade" id="luminosidade" required>
                    </div>
                </div>
                <div class="coluna">
                    <div class="label-input">
                        <label for="solo">Tipo de solo:</label>
                        <input type="text" name="solo" id="solo" required>
                    </div>
                    <div class="label-input">
                        <label for="toxico-humanos">Tóxico para humanos:</label>
                        <select name="toxico_humanos" id="toxico-humanos" required>
                            <option value="">Selecionar..</option>
                            <option value="1">Sim</option>
                            <option value="0">Não</option>
                        </select>
                    </div>
                    <div class="label-input">
                        <label for="toxico-animais">Tóxico para animais:</label>
                        <select name="toxico_animais" id="toxico-animais" required>
                            <option value="">Selecionar..</option>
                            <option value="1">Sim</option>
                            <option value="0">Não</option>
                        </select>
                    </div>
                    <div class="label-input">
                        <label for="dificuldade">Dificuldade:</label>
                        <select name="dificuldade" id="dificuldade" required>
                            <option value="">Selecionar..</option>
                            <option value="facil">Fácil</option>
                            <option value="moderada">Moderada</option>
                            <option value="dificil">Difícil</option>
                        </select>
                    </div>
                    <div class="label-input">
                        <label for="floracao">Floração:</label>
                        <input type="text" name="floracao" id="floracao" required>
                    </div>
                    <div class="label-input">
                        <label for="rega_dias_quentes">Rega em dias quentes:</label>
                        <input type="text" name="rega_dias_quentes" id="rega_dias_quentes" required>
                    </div>
                    <div class="label-input">
                        <label for="rega_dias_frios">Rega em dias frios:</label>
                        <input type="text" name="rega_dias_frios" id="rega_dias_frios" required>
                    </div>
                </div>
                <div class="coluna">
                    <div class="label-input">
                        <label for="reproducao">Tipo de reprodução:</label>
                        <input type="text" name="reproducao" id="reproducao" required>
                    </div>
                    <div class="label-input">
                        <label for="adubagem">Tempo de adubagem:</label>
                        <input type="text" name="adubagem" id="adubagem" required>
                    </div>
                    <div class="label-input">
                        <label for="temperatura_min">Temperatura mínima:</label>
                        <input type="number" name="temperatura_min" id="temperatura_min">
                    </div>
                    <div class="label-input">
                        <label for="temperatura_max">Temperatura máxima:</label>
                        <input type="number" name="temperatura_max" id="temperatura_max">
                    </div>
                </div>
            </div>
            <div class="btn-enviar">
                <input type="submit" value="Enviar Dados">
            </div>
        </form>
        
    </main>
</body>
</html>