<?php include('../blades/header.php');
session_start();
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<main class="donation">
    <header class="donation-home">
        <nav class="comunitys">
            <?php
            include('../blades/comunity.php')
                ?>
        </nav>
        <section class="donation-global">
            <div class="about-comunitys">
                <?php
                include('../blades/aboutComunity.php')
                    ?>
            </div>
            <div class="profile-services">
                <sidebar class="profile">
                    <?php include('../blades/profile.php') ?>
                </sidebar>
                <section class="services" id="dynamic-content">

                </section>
            </div>
        </section>
    </header>

    <footer class="donation-footer">
        donation.com © 2022-2023 donation LTDA
    </footer>
</main>

<script src="../js/profile.js"></script>
<script src="../js/calendar.js"></script>
<!-- <script src="../js/services.js"></script> -->
<?php include('../blades/footer.php'); ?>

<script>
    $(document).on('click', 'a.cancel-button', function () {
        // Remove o estado de pausa do AJAX da localStorage
        localStorage.removeItem('ajaxPaused');
    });

    $(document).ready(function () {
        // Variável para armazenar o valor da textarea
        var textareaValue = '';

        // Variável para armazenar o status de foco da textarea
        var textareaFocused = false;

        // Função para carregar o conteúdo dinâmico
        function loadDynamicContent() {
            // Verifica se o AJAX está pausado com base no valor em localStorage
            var ajaxPaused = localStorage.getItem('ajaxPaused') === 'true';

            if (ajaxPaused) {
                return; // Se o AJAX estiver pausado, interrompa a execução
            }

            $.ajax({
                url: '../../controllers/ajax_script.php?idSolicitacao=<?php echo $_GET['idSolicitacao'] ?>', // Substitua pela URL do seu script PHP que gera o conteúdo dinâmico
                type: 'GET',
                success: function (response) {
                    // Armazena o valor da textarea antes da atualização
                    textareaValue = $('#r-2').val();

                    // Verifica se a textarea está focada antes da atualização
                    textareaFocused = $('#r-2').is(':focus');

                    // Atualiza o conteúdo do contêiner HTML
                    $('#dynamic-content').html(response);

                    // Restaura o valor da textarea após a atualização
                    $('#r-2').val(textareaValue);

                    // Verifica se a textarea estava focada antes da atualização
                    if (textareaFocused) {
                        $('#r-2').focus(); // Restaura o foco na textarea
                    }
                },
                error: function (xhr, status, error) {
                    console.log(error); // Lida com quaisquer erros
                }
            });
        }

        // Chama a função inicialmente
        loadDynamicContent();

        // Atualiza o conteúdo dinâmico periodicamente (opcional)
        setInterval(loadDynamicContent, 3000); // Ajuste o intervalo conforme necessário

        // Manipula o clique dos botões de submit
        $(document).on('click', 'button[type="submit"]', function () {
            // Salva o valor atual da textarea
            textareaValue = $('#r-2').val();
        });

        // Manipula o envio do formulário dentro do ajax_script.php
        $(document).on('submit', 'form', function (event) {
            // Verifica se o formulário não possui o atributo 'data-ajax-ignore'
            if (!$(this).attr('data-ajax-ignore')) {
                // Verifica se o valor da textarea foi alterado
                if ($('#r-2').val() !== textareaValue) {
                    event.preventDefault(); // Impede o comportamento padrão do formulário

                    var formData = $(this).serialize();

                    $.ajax({
                        url: $(this).attr('action'),
                        type: 'POST',
                        data: formData,
                        success: function (response) {
                            // Salva o valor atual da textarea
                            textareaValue = $('#r-2').val();

                            // Verifica se a textarea estava focada antes do envio do formulário
                            textareaFocused = $('#r-2').is(':focus');

                            // Atualiza o conteúdo dinâmico após o envio do formulário
                            loadDynamicContent();

                            // Verifica se a textarea estava focada antes do envio do formulário
                            if (textareaFocused) {
                                $('#r-2').focus(); // Restaura o foco na textarea
                            }
                        },
                        error: function (xhr, status, error) {
                            console.log(error); // Lida com quaisquer erros
                        }
                    });
                }
            }
        });

        // Manipula o clique no botão "Cancelar" para retomar o AJAX
        $(document).on('click', 'a.cancel-button', function () {
            // Remove o estado de pausa do AJAX da localStorage
            localStorage.removeItem('ajaxPaused');
        });
    });
</script>