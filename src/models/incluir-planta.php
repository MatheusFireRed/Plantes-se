<?php
    include '../../config/conexaoDB.php';

    $nomePopular             = $_POST['nome_popular'];
    $nomeCientifico          = $_POST['nome_cientifico'];
    $familia                 = $_POST['familia'];
    $genero                  = $_POST['genero'];
    $cicloDeVida             = $_POST['ciclo_de_vida'];
    $origem                  = $_POST['origem'];
    $luminosidade            = $_POST['luminosidade'];
    $solo                    = $_POST['solo'];
    $toxicoHumanos           = $_POST['toxico_humanos'];
    $toxicoAnimais           = $_POST['toxico_animais'];
    $dificuldade             = $_POST['dificuldade'];
    $floracao                = $_POST['floracao'];
    $regaDiasQuentes         = $_POST['rega_dias_quentes'];
    $regaDiasFrios           = $_POST['rega_dias_frios'];
    $reproducao              = $_POST['reproducao'];
    $adubagem                = $_POST['adubagem'];
    $temperaturaMin          = $_POST['temperatura_min'];
    $temperaturaMax          = $_POST['temperatura_max'];

    try{
        $pdo->beginTransaction();

        $sql = "INSERT INTO plantas 
        (nome_popular,
         nome_cientifico,
         familia,
         genero,
         tempo_vida,
         origem,
         luminosidade,
         tipo_de_solo,
         toxico_humanos,
         toxico_animais,
         dificuldade,
         floracao,
         rega_dias_quentes,
         rega_dias_frios,
         reproducao,
         adubagem,
         temperatura_min,
         temperatura_max)
        VALUES
        (:nome_popular,
         :nome_cientifico,
         :familia,
         :genero,
         :ciclo_de_vida,
         :origem,
         :luminosidade,
         :solo,
         :toxico_humanos,
         :toxico_animais,
         :dificuldade,
         :floracao,
         :rega_dias_quentes,
         :rega_dias_frios,
         :reproducao,
         :adubagem,
         :temperatura_min,
         :temperatura_max)";

        $stmt = $pdo->prepare($sql);

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

        $pdo->commit();

        
    }catch (PDOException $e) {
        $pdo->rollBack();
        echo "Erro: " . $e->getMessage();
    }

?>