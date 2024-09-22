<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Atualiza Curso</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
    <meta name="author" content="Codedthemes" />
    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap/css/bootstrap.min.css">
    <!-- waves.css -->
    <link rel="stylesheet" href="assets/pages/waves/css/waves.min.css" type="text/css" media="all">
    <!-- themify icon -->
    <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
    <!-- font-awesome-n -->
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome-n.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <!-- scrollbar.css -->
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.mCustomScrollbar.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>
    
    <?php include 'menu_principal.php'; ?>

    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-body start -->
                <div class="page-body">
                    <div class="row">
                        <!-- Project statustic start -->
                        <div class="col-xl-12">
                            <div class="row">
                                <div class="col-xl-8 col-md-10 m-auto">
                                    <h2>Atualizar Aluno</h2>
                                    <?php
                                        $id = intval($_GET['id']); // Converte o valor para inteiro

                                        $url = "http://localhost/exercicio/api.php/alunos/{$id}";

                                        $response = file_get_contents($url);
                                        $data = json_decode($response, true);

                                        echo $data;
                                    ?>
                                    
                                    <form action="executa_atualiza_aluno.php?id=<?php echo $id;?>" method="POST">

                                        <div class="mb-3">
                                            <label for="nome" class="form-label">Nome do Aluno</label>
                                            <input type="text" id="nome" name="nome" class="form-control" value="<?php echo htmlspecialchars($data['dados_aluno']['nome']); ?>" placeholder="Digite o nome do aluno" required>
                                        </div> 

                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email do Aluno</label>
                                            <input type="email" id="email" name="email" class="form-control" value="<?php echo htmlspecialchars($data['dados_aluno']['email']); ?>" placeholder="Digite o email do aluno" required>
                                        </div> 

                                        <div class="mb-3">
                                            <label for="cursos-dropdown" class="form-label">Nome do Curso</label>
                                            <?php
                                                $url = 'http://localhost/exercicio/api.php/cursos';
                                                $response = file_get_contents($url);
                                                $cursos = json_decode($response, true);

                                                if (isset($cursos['dados'])) {
                                                    echo '<select class="form-select" id="cursos-dropdown" name="curso_id" required>';
                                                    echo '<option value="" disabled>Selecione um curso</option>';
                                                    foreach ($cursos['dados'] as $curso) {
                                                        $selected = ($curso['id_curso'] == $data['dados_aluno']['fk_cursos_id_curso']) ? 'selected' : '';
                                                        echo '<option value="' . $curso['id_curso'] . '" ' . $selected . '>' . htmlspecialchars($curso['nome_curso']) . '</option>';
                                                    }
                                                    echo '</select>';
                                                } else {
                                                    echo '<p>Nenhum curso encontrado.</p>';
                                                }
                                            ?>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Atualizar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Project statustic end -->
                    </div>
                </div>
                <!-- Page-body end -->
            </div>
            <div id="styleSelector"> </div>
        </div>
    </div>

    <!-- Required Jquery -->
    <script type="text/javascript" src="assets/js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js"></script>
    <!-- waves js -->
    <script src="assets/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
    <!-- slimscroll js -->
    <script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- menu js -->
    <script src="assets/js/pcoded.min.js"></script>
    <script src="assets/js/vertical/vertical-layout.min.js"></script>
    <script type="text/javascript" src="assets/js/script.js"></script>
</body>

</html>
