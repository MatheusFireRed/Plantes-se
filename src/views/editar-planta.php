<?php
    include '../../config/conexaoDB.php';

    $id = $nomePopular = $nomeCientifico = $familia = $genero = $cicloDeVida = $origem = $luminosidade = $solo = $toxicoHumanos = $toxicoAnimais = $dificuldade = $floracao = $regaDiasQuentes = $regaDiasFrios = $reproducao = $adubagem = $temperaturaMin = $temperaturaMax = '';

    // Se um ID foi passado para edição
    if (isset($_GET['editar']) && is_numeric($_GET['editar'])) {
        $id = $_GET['editar'];

        try {
            $sql = "SELECT * FROM plantas WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $dados = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($dados) {
                $nomePopular = $dados['nome_popular'];
                $nomeCientifico = $dados['nome_cientifico'];
                $familia = $dados['familia'];
                $genero = $dados['genero'];
                $cicloDeVida = $dados['tempo_vida'];
                $origem = $dados['origem'];
                $luminosidade = $dados['luminosidade'];
                $solo = $dados['tipo_de_solo'];
                $toxicoHumanos = $dados['toxico_humanos'];
                $toxicoAnimais = $dados['toxico_animais'];
                $dificuldade = $dados['dificuldade'];
                $floracao = $dados['floracao'];
                $regaDiasQuentes = $dados['rega_dias_quentes'];
                $regaDiasFrios = $dados['rega_dias_frios'];
                $reproducao = $dados['reproducao'];
                $adubagem = $dados['adubagem'];
                $temperaturaMin = $dados['temperatura_min'];
                $temperaturaMax = $dados['temperatura_max'];
            }
        } catch (PDOException $e) {
            echo "Erro ao buscar registro: " . $e->getMessage();
        }
    }

    // Se o formulário de edição for enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
        $id = $_POST['id'];
        $nomePopular = $_POST['nome_popular'];
        $nomeCientifico = $_POST['nome_cientifico'];
        $familia = $_POST['familia'];
        $genero = $_POST['genero'];
        $cicloDeVida = $_POST['ciclo_de_vida'];
        $origem = $_POST['origem'];
        $luminosidade = $_POST['luminosidade'];
        $solo = $_POST['solo'];
        $toxicoHumanos = $_POST['toxico_humanos'];
        $toxicoAnimais = $_POST['toxico_animais'];
        $dificuldade = $_POST['dificuldade'];
        $floracao = $_POST['floracao'];
        $regaDiasQuentes = $_POST['rega_dias_quentes'];
        $regaDiasFrios = $_POST['rega_dias_frios'];
        $reproducao = $_POST['reproducao'];
        $adubagem = $_POST['adubagem'];
        $temperaturaMin = $_POST['temperatura_min'];
        $temperaturaMax = $_POST['temperatura_max'];

        try {
            $sql = "UPDATE plantas SET nome_popular = :nome_popular, nome_cientifico = :nome_cientifico, familia = :familia, genero = :genero, tempo_vida = :ciclo_de_vida, origem = :origem, luminosidade = :luminosidade, tipo_de_solo = :solo, toxico_humanos = :toxico_humanos, toxico_animais = :toxico_animais, dificuldade = :dificuldade, floracao = :floracao, rega_dias_quentes = :rega_dias_quentes, rega_dias_frios = :rega_dias_frios, reproducao = :reproducao, adubagem = :adubagem, temperatura_min = :temperatura_min, temperatura_max = :temperatura_max WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':nome_popular', $nomePopular);
            $stmt->bindParam(':nome_cientifico', $nomeCientifico);
            $stmt->bindParam(':familia', $familia);
            $stmt->bindParam(':genero', $genero);
            $stmt->bindParam(':ciclo_de_vida', $cicloDeVida);
            $stmt->bindParam(':origem', $origem);
            $stmt->bindParam(':luminosidade', $luminosidade);
            $stmt->bindParam(':solo', $solo);
            $stmt->bindParam(':toxico_humanos', $toxicoHumanos);
            $stmt->bindParam(':toxico_animais', $toxicoAnimais);
            $stmt->bindParam(':dificuldade', $dificuldade);
            $stmt->bindParam(':floracao', $floracao);
            $stmt->bindParam(':rega_dias_quentes', $regaDiasQuentes);
            $stmt->bindParam(':rega_dias_frios', $regaDiasFrios);
            $stmt->bindParam(':reproducao', $reproducao);
            $stmt->bindParam(':adubagem', $adubagem);
            $stmt->bindParam(':temperatura_min', $temperaturaMin);
            $stmt->bindParam(':temperatura_max', $temperaturaMax);
            $stmt->execute();

            header("Location:../../public/html/alterado-com-sucesso.html");
            exit;
        } catch (PDOException $e) {
            echo "Erro ao atualizar registro: " . $e->getMessage();
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Planta</title>

    <link rel="stylesheet" href="../../public/css/styleCadastro.css">
    <link rel="stylesheet" href="../../public/css/styleCadastroHeader.css">

    <style>
        main {
            display: flex;
            align-items: center;
            flex-direction: column;
            height: 100%;
        }
        
        .pesquisa {
            margin-bottom: 20px;
        }

        #busca, .btn-pesquisa {
            height: 40px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid black;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        .editar-form {
            margin-top: 20px;
            width: 100%;
            border: 1px solid #ccc;
            padding: 15px;
            border-radius: 5px;
            background: green;
        }

        .formulario-edicao{
            display: flex;
            gap: 20px;
        }
    </style>
</head>
<body>
    <header>
        <?php include '../../templates/headerCadastro.php'; ?>
    </header>
    <main>

        <!-- Formulário de Pesquisa -->
        <form class="pesquisa" method="GET">
            <input type="text" name="busca" id="busca" placeholder="Pesquisar plantas..">
            <button class="btn-pesquisa" type="submit">Pesquisar</button>
        </form>

        <!-- Tabela de Resultados -->
        <div>
            <?php
                if (isset($_GET['busca']) && !empty(trim($_GET['busca']))) {
                    $busca = trim($_GET['busca']);

                    try {
                        $sql = "SELECT id, nome_popular, nome_cientifico FROM plantas 
                                WHERE nome_popular LIKE :busca OR id = :id";
                        $stmt = $pdo->prepare($sql);
                        $stmt->bindValue(':busca', "%$busca%", PDO::PARAM_STR);
                        $stmt->bindValue(':id', $busca, PDO::PARAM_INT);
                        $stmt->execute();

                        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        if ($dados) {
                            echo "<table>";
                            echo "<tr>
                                    <th>ID</th>
                                    <th>Nome Popular</th>
                                    <th>Nome Científico</th>
                                    <th>Ações</th>
                                </tr>";
                            foreach ($dados as $registro) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($registro['id']) . "</td>";
                                echo "<td>" . htmlspecialchars($registro['nome_popular']) . "</td>";
                                echo "<td>" . htmlspecialchars($registro['nome_cientifico']) . "</td>";
                                echo "<td><a href='?editar=" . $registro['id'] . "'>Editar</a></td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                        } else {
                            echo "<p style='color: red;'>Nenhum registro encontrado.</p>";
                        }
                    } catch (PDOException $e) {
                        echo "Erro ao buscar registros: " . $e->getMessage();
                    }
                }
            ?>
        </div>

        <!-- Formulário de Edição -->
        <?php if ($id): ?>
            <div class="editar-form">
                <h2>Editar Planta <?= htmlspecialchars($id) ?>#</h2>
                <form class="formulario-edicao" method="POST">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
                    <div class="coluna">
                        <div class="label-input">
                            <label>Nome Popular:</label>
                            <input type="text" name="nome_popular" value="<?= htmlspecialchars($nomePopular) ?>" required>
                        </div>

                        <div class="label-input">
                            <label>Nome Científico:</label>
                            <input type="text" name="nome_cientifico" value="<?= htmlspecialchars($nomeCientifico) ?>" required>
                        </div>

                        <div class="label-input">
                            <label for="familia">Família:</label>
                            <input type="text" name="familia" value="<?= htmlspecialchars($familia) ?>" required>
                        </div>

                        <div class="label-input">
                            <label for="genero">Gênero:</label>
                            <input type="text" name="genero" value="<?= htmlspecialchars($genero) ?>" required>
                        </div>

                        <div class="label-input">
                            <label for="ciclo_de_vida">Ciclo de vida:</label>
                            <input type="text" name="ciclo_de_vida" value="<?= htmlspecialchars($cicloDeVida) ?>" required>
                        </div>

                        <div class="label-input">
                            <label for="origem">Origem:</label>
                            <input type="text" name="origem" value="<?= htmlspecialchars($origem) ?>" required>
                        </div>
                    </div>
                    
                    <div class="coluna">
                        <div class="label-input">
                            <label for="luminosidade">Luminosidade:</label>
                            <input type="text" name="luminosidade" value="<?= htmlspecialchars($luminosidade) ?>" required>
                        </div>

                        <div class="label-input">
                            <label for="solo">Solo:</label>
                            <input type="text" name="solo" value="<?= htmlspecialchars($solo) ?>" required>
                        </div>

                        <div class="label-input">
                            <label for="toxico_humanos">Tóxico para Humanos:</label>
                            <input type="text" name="toxico_humanos" value="<?= htmlspecialchars($toxicoHumanos) ?>" required>
                        </div>

                        <div class="label-input">
                            <label for="toxico_animais">Tóxico para Animais:</label>
                            <input type="text" name="toxico_animais" value="<?= htmlspecialchars($toxicoAnimais) ?>" required>
                        </div>

                        <div class="label-input">
                            <label for="dificuldade">Dificuldade de Cultivo:</label>
                            <input type="text" name="dificuldade" value="<?= htmlspecialchars($dificuldade) ?>" required>
                        </div>

                        <div class="label-input">
                            <label for="floracao">Floração:</label>
                            <input type="text" name="floracao" value="<?= htmlspecialchars($floracao) ?>" required>
                        </div>
                    </div>
                   
                    <div class="coluna">
                        <div class="label-input">
                            <label for="rega_dias_quentes">Rega nos Dias Quentes:</label>
                            <input type="text" name="rega_dias_quentes" value="<?= htmlspecialchars($regaDiasQuentes) ?>" required>
                        </div>

                        <div class="label-input">
                            <label for="rega_dias_frios">Rega nos Dias Frios:</label>
                            <input type="text" name="rega_dias_frios" value="<?= htmlspecialchars($regaDiasFrios) ?>" required>
                        </div>

                        <div class="label-input">
                            <label for="reproducao">Reprodução:</label>
                            <input type="text" name="reproducao" value="<?= htmlspecialchars($reproducao) ?>" required>
                        </div>

                        <div class="label-input">
                            <label for="adubagem">Adubagem:</label>
                            <input type="text" name="adubagem" value="<?= htmlspecialchars($adubagem) ?>" required>
                        </div>

                        <div class="label-input">
                            <label for="temperatura_min">Temperatura Mínima:</label>
                            <input type="text" name="temperatura_min" value="<?= htmlspecialchars($temperaturaMin) ?>" required>
                        </div>

                        <div class="label-input">
                            <label for="temperatura_max">Temperatura Máxima:</label>
                            <input type="text" name="temperatura_max" value="<?= htmlspecialchars($temperaturaMax) ?>" required>
                        </div>
                    </div>

                    <button type="submit">Salvar Alterações</button>
                </form>
            </div>
        <?php endif; ?>

    </main>
</body>
</html>
