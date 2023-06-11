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
                    <script>
                    sessionStorage.removeItem('ajaxPaused');
                    </script>

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
        // Remove the AJAX pause state from sessionStorage
        sessionStorage.removeItem('ajaxPaused');
    });

    $(document).ready(function () {
        // Variable to store the textarea value
        var textareaValue = '';

        // Variable to store the textarea focus status
        var textareaFocused = false;

        // Function to load dynamic content
        function loadDynamicContent() {
            // Check if AJAX is paused based on the value in sessionStorage
            var ajaxPaused = sessionStorage.getItem('ajaxPaused') ?? 'false';

            if (ajaxPaused !== 'false') {
                return; // If AJAX is paused, stop execution
            }

            $.ajax({
                url: '../../controllers/ajax_script.php?idSolicitacao=<?php echo $_GET['idSolicitacao'] ?>', // Replace with the URL of your PHP script that generates the dynamic content
                type: 'GET',
                success: function (response) {
                    // Store the textarea value before the update
                    textareaValue = $('#r-2').val();

                    // Check if the textarea is focused before the update
                    textareaFocused = $('#r-2').is(':focus');

                    // Update the HTML container with the new content
                    $('#dynamic-content').html(response);

                    // Restore the textarea value after the update
                    $('#r-2').val(textareaValue);

                    // Check if the textarea was focused before the update
                    if (textareaFocused) {
                        $('#r-2').focus(); // Restore focus to the textarea
                    }
                },
                error: function (xhr, status, error) {
                    console.log(error); // Handle any errors
                }
            });
        }

        // Call the function initially
        loadDynamicContent();

        // Update the dynamic content periodically (optional)
        setInterval(loadDynamicContent, 1000); // Adjust the interval as needed

        // Handle submit button clicks
        $(document).on('click', 'button[type="submit"]', function () {
            // Save the current textarea value
            textareaValue = $('#r-2').val();
        });

        // Handle form submission within ajax_script.php
        $(document).on('submit', 'form', function (event) {
            // Check if the form doesn't have the 'data-ajax-ignore' attribute
            if (!$(this).attr('data-ajax-ignore')) {
                // Check if the textarea value has changed
                if ($('#r-2').val() !== textareaValue) {
                    event.preventDefault(); // Prevent the default form behavior

                    var formData = $(this).serialize();

                    $.ajax({
                        url: $(this).attr('action'),
                        type: 'POST',
                        data: formData,
                        success: function (response) {
                            // Save the current textarea value
                            textareaValue = $('#r-2').val();

                            // Check if the textarea was focused before form submission
                            textareaFocused = $('#r-2').is(':focus');

                            // Update the dynamic content after form submission
                            loadDynamicContent();

                            // Check if the textarea was focused before form submission
                            if (textareaFocused) {
                                $('#r-2').focus(); // Restore focus to the textarea
                            }
                        },
                        error: function (xhr, status, error) {
                            console.log(error); // Handle any errors
                        }
                    });
                }
            }
        });

        // Handle click on "Cancel" button to resume AJAX
        $(document).on('click', 'a.cancel-button', function () {
            // Remove the AJAX pause state from sessionStorage
            sessionStorage.removeItem('ajaxPaused');
        });

        // Pause AJAX on window/tab close
        $(window).on('beforeunload', function () {
            sessionStorage.setItem('ajaxPaused', 'true');
        });
    });
</script>
