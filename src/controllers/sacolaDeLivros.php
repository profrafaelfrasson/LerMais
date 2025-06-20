<?php
    session_start();

    if (!isset($_SESSION['sacola'])) {
        $_SESSION['sacola'] = [];
    }
    $id_livro = $_POST['id_livro'];
    // Dados recebidos
        $src_img = $_POST['img'] ?? 'default.jpg';
        $id_livro = $_POST['id_livro'] ?? null;
        $titulo = $_POST['titulo'] ?? 'Livro desconhecido';
    if ($id_livro !== null) {
    // Verifica se o livro já está na sacola
        if (!isset($_SESSION['sacola'][$id_livro])) {
                $_SESSION['sacola'][$id_livro] = [
                    'id_livro' => $id_livro,
                    'src_img' => $src_img,
                    'titulo' => $titulo,
                    'quantidade' => 1
                ];
            } else {
                // Aumenta a quantidade se já estiver na sacola
                $_SESSION['sacola'][$id_livro]['quantidade']++;
            }
    }
    if ($_GET['tipo'] === "adicao"){
        $id_livro = $_GET['id_livro'] ?? null;
        if ($id_livro !== null && isset($_SESSION['sacola'][$id_livro])) {
            $_SESSION['sacola'][$id_livro]['quantidade']++;
            header('Location: ../../index.php?navegation=1&&verificacao=sim&&tipo=todos');
            exit;
        }
    } elseif ($_GET['tipo'] === "subtracao") {
        $id_livro = $_GET['id_livro'] ?? null;
        if ($id_livro !== null && isset($_SESSION['sacola'][$id_livro])) {
            if ($_SESSION['sacola'][$id_livro]['quantidade'] > 1 && !empty($_SESSION['sacola'])) {
                $_SESSION['sacola'][$id_livro]['quantidade']--;
                header('Location: ../../index.php?navegation=1&&verificacao=sim&&tipo=todos');
                exit;
            }elseif($_SESSION['sacola'][$id_livro]['quantidade'] >= 1 && !empty($_SESSION['sacola'])){
                unset($_SESSION['sacola'][$id_livro]);
                header('Location: ../../index.php?navegation=1&&verificacao=sim&&tipo=todos');
                exit;
            }else {
                unset($_SESSION['sacola'][$id_livro]);
                header('Location: ../../index.php?verificacao=nao&&tipo=todos');
                exit;
            }
        }
    }

    // Redireciona de volta ou para a sacola
        header('Location: ../../index.php?navegation=1&&verificacao=sim&&tipo=todos');
        exit;
?>