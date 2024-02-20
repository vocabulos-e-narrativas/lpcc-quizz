<?php
include_once './assets/dataset.php';
$currentQuiz = $q;
?>

<!DOCTYPE html>
<html lang="en">

<!--
 ___  ___  ___   ___  _  _  _____        ___   ___   ___  ___  _____  ___  _    
| _ )| _ \|_ _| / __|| || ||_   _|      |   \ |_ _| / __||_ _||_   _|/   \| |   
| _ \|   / | | | (_ || __ |  | |        | |) | | | | (_ | | |   | |  | - || |__ 
|___/|_|_\|___| \___||_||_|  |_|        |___/ |___| \___||___|  |_|  |_|_||____|

-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LPCC - Simulador</title>
    <meta property="og:title" content="LPCC - Quizz">
    <meta property="og:description"
        content="An interactive questionnaire for the Portuguese League Against Cancer (LPCC), with the aim of evaluating members' understanding of the rules and management of the organization's communication networks">
    <meta property="og:image" content="http://localhost/LPCC-QUIZZ/images/preview.jpg">
    <meta property="og:url" content="http://localhost/LPCC-QUIZZ/">
    <meta property="og:type" content="website">
    <link rel="icon" href="./assets/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./assets/styles/style.css">
    <link rel="stylesheet" href="./assets/fontawesome/css/solid.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <!-- Exibe apenas o quizz[i]  -->
    <?php for ($i = 0; $i < 30; $i++): ?>
        <section class="quizz-page h-100" id="question-<?php echo $i; ?>"
            style="display: <?php echo $i === 0 ? 'block' : 'none'; ?>;">
            <div class="row h-40 align-items-center bg-red text-white pb-3">
                <div class="logo px-4">
                    <img src="./assets/images/quiz_lpcc_materiais-34.png" class="logo" />
                </div>
                <div class="col"></div>
                <!-- Exibe a pergunta do quizz[i]  -->
                <div class="col-12 col-md-8 text-center px-3 px-md-5 pt-5 quizz-question">
                    <h2 class="pt-5 pt-md-0 py-2 regular">Pergunta
                        <?php echo $currentQuiz[$i]['X']; ?> de 30
                    </h2>
                    <h1 class="py-2 bold">
                        <?php echo $currentQuiz[$i]['question']; ?>
                    </h1>
                </div>
                <div class="col"></div>
            </div>
            <div class="row h-60 align-items-center pb-5">
                <!-- Se houver imagem na pergunta -->
                <?php if ($currentQuiz[$i]['img'] != "") { ?>
                    <!-- Exibe as opções do quizz[i]  -->
                    <div id="options-<?php echo $i; ?>" class="d-block">
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-12 col-md-8 text-center">
                                <a href="#" class="pre-modal-img" onclick="openModal('<?php echo $currentQuiz[$i]['img']; ?>')">
                                    <img id="image-<?php echo $i; ?>" src="<?php echo $currentQuiz[$i]['img']; ?>"
                                        class="my-w" />
                                    <div class="magnifying-glass-wrapper">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </div>
                                </a>
                            </div>
                            <div class="col-2"></div>
                        </div>
                        <div class="row pt-md-5">
                            <div class="col-2"></div>
                            <div class="col-12 col-md-2 text-center mini-ans pt-2 pt-md-0"
                                onclick="checkAnswer(<?php echo 1; ?>, this, <?php echo $i; ?>)" data-option="1">
                                <button class="font-size-19 regular">
                                    <div class="options-text-wrapper">
                                        <?php echo nl2br($currentQuiz[$i]['answers'][0]); ?>
                                    </div>
                                </button>
                            </div>
                            <div class="col-12 col-md-2 text-center mini-ans pt-2 pt-md-0"
                                onclick="checkAnswer(<?php echo 2; ?>, this, <?php echo $i; ?>)" data-option="2">
                                <button class="font-size-19 regular">
                                    <div class="options-text-wrapper">
                                        <?php echo nl2br($currentQuiz[$i]['answers'][1]); ?>
                                    </div>
                                </button>
                            </div>
                            <div class="col-12 col-md-2 text-center mini-ans pt-2 pt-md-0"
                                onclick="checkAnswer(<?php echo 3; ?>, this, <?php echo $i; ?>)" data-option="3">
                                <button class="font-size-19 regular">
                                    <div class="options-text-wrapper">
                                        <?php echo nl2br($currentQuiz[$i]['answers'][2]); ?>
                                    </div>
                                </button>
                            </div>
                            <div class="col-12 col-md-2 text-center mini-ans pt-2 pt-md-0"
                                onclick="checkAnswer(<?php echo 4; ?>, this, <?php echo $i; ?>)" data-option="4">
                                <button class="font-size-19 regular">
                                    <div class="options-text-wrapper">
                                        <?php echo nl2br($currentQuiz[$i]['answers'][3]); ?>
                                    </div>
                                </button>
                            </div>
                            <div class="col-2"></div>
                        </div>
                    </div>
                <?php } else { ?>
                    <!-- Exibe as opções do quizz[i]  -->
                    <div id="options-<?php echo $i; ?>" class="d-block">
                        <div class="row pt-5">
                            <div class="col-2"></div>
                            <div class="col-12 col-md-4 text-center ans pt-3 pt-md-0"
                                onclick="checkAnswer(<?php echo 1; ?>, this, <?php echo $i; ?>)" data-option="1">
                                <button class="font-size-19 regular">
                                    <div class="options-text-wrapper">
                                        <?php echo nl2br($currentQuiz[$i]['answers'][0]); ?>
                                    </div>
                                </button>
                            </div>
                            <div class="col-12 col-md-4 text-center ans pt-3 pt-md-0"
                                onclick="checkAnswer(<?php echo 2; ?>, this, <?php echo $i; ?>)" data-option="2">
                                <button class="font-size-19 regular">
                                    <div class="options-text-wrapper">
                                        <?php echo nl2br($currentQuiz[$i]['answers'][1]); ?>
                                    </div>
                                </button>
                            </div>
                            <div class="col-2"></div>
                        </div>
                        <div class="row pt-md-5">
                            <div class="col-2"></div>
                            <div class="col-12 col-md-4 text-center ans pt-3 pt-md-0"
                                onclick="checkAnswer(<?php echo 3; ?>, this, <?php echo $i; ?>)" data-option="3">
                                <button class="font-size-19 regular">
                                    <div class="options-text-wrapper">
                                        <?php echo nl2br($currentQuiz[$i]['answers'][2]); ?>
                                    </div>
                                </button>
                            </div>
                            <div class="col-12 col-md-4 text-center ans pt-3 pt-md-0"
                                onclick="checkAnswer(<?php echo 4; ?>, this, <?php echo $i; ?>)" data-option="4">
                                <button class="font-size-19 regular">
                                    <div class="options-text-wrapper">
                                        <?php echo nl2br($currentQuiz[$i]['answers'][3]); ?>
                                    </div>
                                </button>
                            </div>
                            <div class="col-2"></div>
                        </div>
                    </div>
                <?php } ?>
                <!-- Se a resposta selecionada do quizz[i] estiver correta, exibe a explicação -->
                <div id="right-<?php echo $i; ?>" class="d-none">
                    <div class="text-center row pt-3 pt-md-5">
                        <div class="col-12 col-md-5"></div>
                        <div class="col-12 col-md-2 text-center  mx-auto">
                            <img src="./assets/images/quiz_lpcc_materiais-26.png" class="quizz-right" />
                        </div>
                        <div class="col-12 col-md-5"></div>
                    </div>
                </div>
                <!-- Se a resposta selecionada do quizz[i] estiver errada, exibe a explicação -->
                <div id="wrong-<?php echo $i; ?>" class="d-none">
                    <div class="text-center row pt-3 pt-md-5">
                        <div class="col-12 col-md-5"></div>
                        <div class="col-12 col-md-2 text-center  mx-auto">
                            <img src="./assets/images/quiz_lpcc_materiais-25.png" class="quizz-right" />
                        </div>
                        <div class="col-12 col-md-5"></div>
                    </div>
                </div>
                <div class="row text-center pb-5">
                    <div class="col-md-2"></div>
                    <!-- Exibe a explicação do quizz[i] -->
                    <div class="col-12 col-md-8 text-center explanations px-3 px-md-0">
                        <h3 id="explanation-<?php echo $i; ?>" class="text-gray medium d-none">
                            <?php echo $currentQuiz[$i]['explanation']; ?>
                        </h3>
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <a class="text-center quizz-next">
                    <!-- Botão 'Seguinte' cinza de placeholder -->
                    <img id="quizzImg1-<?php echo $i; ?>" src="./assets/images/quiz_lpcc_materiais-30.png"
                        class="d-block mx-auto" />
                    <!-- Botão 'Seguinte' vermelho (serve para abrir a explicação) -->
                    <img id="quizzImg2-<?php echo $i; ?>" src="./assets/images/quiz_lpcc_materiais-29.png"
                        class="pointer d-none mx-auto" onclick="nextQuestion1(<?php echo $i; ?>)" />
                    <!-- Botão 'Seguinte' vermelho (serve para fechar a explicação e exibir a próxima pergunta) -->
                    <img id="quizzImg3-<?php echo $i; ?>" src="./assets/images/quiz_lpcc_materiais-28.png"
                        class="pointer d-none mx-auto" onclick="nextQuestion2(<?php echo $i; ?>)" />
                </a>
            </div>
        </section>
        <!-- Modal -->
        <div id="modal" class="modal" onclick="closeModal()">
            <span class="close">&times;</span>
            <img id="modalImage" src="" alt="Imagem em Tamanho Maior">
        </div>
    <?php endfor ?>
    <section id="end-section" class="quizz-page h-100 d-none">
        <div class="row h-40 align-items-center bg-red text-white pb-3">
            <div class="logo px-4">
                <img src="./assets/images/quiz_lpcc_materiais-34.png" class="logo" />
            </div>
            <div class="col"></div>
            <div class="col-12 col-md-8 text-center px-5 pt-5 quizz-question">
                <h2 class="pt-5 pt-md-0 py-2 regular">Quizz completo</h2>
                <h1 class="py-2 bold">Parabéns!<br />Acertou <span id="correctCounterDisplay">0</span> das 30 perguntas!
                </h1>
            </div>
            <div class="col"></div>
        </div>
        <div class="row h-60 align-items-center pb-5">
            <div class="row pb-5">
                <div class="col-1 col-md-4"></div>
                <div class="col-10 col-md-4 text-center">
                    <a href="https://www.ligacontracancro.pt/">
                        <img src="./assets/images/quiz_lpcc_materiais-24.png" class="d-block mx-auto w-100" />
                    </a>
                </div>
                <div class="col-1 col-md-4"></div>
            </div>
            <a class="text-center quizz-next" onclick="exit()">
                <!-- Botão 'Sair' vermelho -->
                <img id="quizzImg4" src="./assets/images/quiz_lpcc_materiais-27.png" class="pointer d-block mx-auto" />
            </a>
        </div>
    </section>
    <script>
        let correctCounter = 0;
        let currentQuestion = 0;
        let correct = false;

        // Array(15)
        let currentQuiz = <?php echo json_encode($currentQuiz); ?>;
        console.log("currentQuiz: ", currentQuiz);

        function checkAnswer(selectedAnswer, element, questionIndex) {
            const option = parseInt(element.getAttribute('data-option'), 10);
            console.log("questionIndex: ", questionIndex);
            console.log("currentQuestion: " + currentQuestion);

            // Verifique se a pergunta deve ser exibida em um layout de 2x2 ou 4 colunas
            const isMini = currentQuiz[questionIndex]['isMini'];

            // Botão 'Seguinte' cinza de placeholder
            const img1 = document.getElementById('quizzImg1-' + questionIndex);
            // Botão 'Seguinte' vermelho (serve para abrir a explicação)
            const img2 = document.getElementById('quizzImg2-' + questionIndex);
            // Botão 'Seguinte' vermelho (serve para fechar a explicação e exibir a próxima pergunta)
            const img3 = document.getElementById('quizzImg3-' + questionIndex);

            if (currentQuestion !== questionIndex) {
                return;
            }

            // Ajuste o índice
            const correctAnswer = currentQuiz[questionIndex]['correct_answer'];
            console.log("selectedAnswer: ", option);
            console.log("correctAnswer: ", correctAnswer);


            // Bloqueia a seleção de outra opção e remove as cores para o próximo Quizz
            const ansElements = document.querySelectorAll('#question-' + questionIndex + ' .ans');
            ansElements.forEach(function (ansElement) {
                ansElement.classList.remove('ans-right', 'ans-wrong');
                ansElement.onclick = null;
            });
            const miniAnsElements = document.querySelectorAll('#question-' + questionIndex + ' .mini-ans');
            miniAnsElements.forEach(function (ansElement) {
                ansElement.classList.remove('mini-ans-right', 'mini-ans-wrong');
                ansElement.onclick = null;
            });

            if (option === correctAnswer) {
                if (isMini) {
                    element.classList.add('mini-ans-right');
                } else {
                    element.classList.add('ans-right');
                }
                correct = true;
                correctCounter++;
            } else {
                if (isMini) {
                    element.classList.add('mini-ans-wrong');
                } else {
                    element.classList.add('ans-wrong');
                }
                correct = false;
            }

            img1.classList.remove('d-block');
            img1.classList.add('d-none');
            img2.classList.remove('d-none');
            img2.classList.add('d-block');
        }

        function nextQuestion1(questionIndex) {
            const explanationElement = document.getElementById('explanation-' + questionIndex);
            const optionsElement = document.getElementById('options-' + questionIndex);
            const rightElement = document.getElementById('right-' + questionIndex);
            const wrongElement = document.getElementById('wrong-' + questionIndex);

            // Botão 'Seguinte' cinza de placeholder
            const img1 = document.getElementById('quizzImg1-' + questionIndex);
            // Botão 'Seguinte' vermelho (serve para abrir a explicação)
            const img2 = document.getElementById('quizzImg2-' + questionIndex);
            // Botão 'Seguinte' vermelho (serve para fechar a explicação e exibir a próxima pergunta)
            const img3 = document.getElementById('quizzImg3-' + questionIndex);

            img2.classList.remove('d-block');
            img2.classList.add('d-none');
            img3.classList.remove('d-none');
            img3.classList.add('d-block');

            optionsElement.classList.remove('d-block');
            optionsElement.classList.add('d-none');
            explanationElement.classList.remove('d-none');
            explanationElement.classList.add('d-block');

            if (correct) {
                rightElement.classList.remove('d-none');
                rightElement.classList.add('d-block');
            } else {
                wrongElement.classList.remove('d-none');
                wrongElement.classList.add('d-block');
            }
        }

        function nextQuestion2(questionIndex) {
            const explanationElement = document.getElementById('explanation-' + questionIndex);
            const optionsElement = document.getElementById('options-' + questionIndex);
            const rightElement = document.getElementById('right-' + questionIndex);
            const wrongElement = document.getElementById('wrong-' + questionIndex);

            // Botão 'Seguinte' cinza de placeholder
            const img1 = document.getElementById('quizzImg1-' + questionIndex);
            // Botão 'Seguinte' vermelho (serve para abrir a explicação)
            const img2 = document.getElementById('quizzImg2-' + questionIndex);
            // Botão 'Seguinte' vermelho (serve para fechar a explicação e exibir a próxima pergunta)
            const img3 = document.getElementById('quizzImg3-' + questionIndex);

            optionsElement.classList.remove('d-block');
            optionsElement.classList.add('d-none');
            rightElement.classList.remove('d-block');
            rightElement.classList.add('d-none');
            wrongElement.classList.remove('d-block');
            wrongElement.classList.add('d-none');
            explanationElement.classList.remove('d-block');
            explanationElement.classList.add('d-none');
            img1.classList.remove('d-none');
            img1.classList.add('d-block');
            img3.classList.remove('d-block');
            img3.classList.add('d-none');

            currentQuestion++;

            if (currentQuestion < 30) {
                const currentQuestionContainer = document.getElementById('question-' + questionIndex);
                currentQuestionContainer.style.display = 'none';

                const nextQuestionContainer = document.getElementById('question-' + currentQuestion);
                nextQuestionContainer.style.display = 'block';

                const ansElements = nextQuestionContainer.querySelectorAll('.ans');
                ansElements.forEach(function (ansElement) {
                    ansElement.classList.remove('ans-right', 'ans-wrong');
                    ansElement.onclick = function () {
                        checkAnswer(
                            ansElement.getAttribute('data-option'),
                            ansElement,
                            currentQuestion
                        );
                    };
                });

                // Esconde as imagens right ou wrong da próxima pergunta
                const nextRightElement = document.getElementById('right-' + currentQuestion);
                const nextWrongElement = document.getElementById('wrong-' + currentQuestion);
                nextRightElement.classList.remove('d-block');
                nextRightElement.classList.add('d-none');
                nextWrongElement.classList.remove('d-block');
                nextWrongElement.classList.add('d-none');
            } else {
                console.log('Fim do quiz');
                // Esconde tudo
                const currentQuestionContainer = document.getElementById('question-' + questionIndex);
                currentQuestionContainer.style.display = 'none';
                // Exibe o resultado
                const endSection = document.getElementById('end-section');
                endSection.classList.remove('d-none');
                // Atualiza a contagem correta na mensagem final
                const correctCounterDisplay = document.getElementById('correctCounterDisplay');
                correctCounterDisplay.textContent = correctCounter;
            }
        }

        function openModal(imageSrc) {
            const modal = document.getElementById('modal');
            const modalImage = document.getElementById('modalImage');
            modalImage.src = imageSrc;
            modal.style.display = 'flex';
        }

        function closeModal() {
            const modal = document.getElementById('modal');
            modal.style.display = 'none';
        }

        function exit() {
            window.location.href = 'https://www.ligacontracancro.pt/';
        }
    </script>
    <script src="https://kit.fontawesome.com/dd481e244b.js" crossorigin="anonymous"></script>
</body>

</html>