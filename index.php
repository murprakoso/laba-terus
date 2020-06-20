<?php
session_start();

require 'function.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>Laba Terus</title>
</head>

<body class="bg-light">

    <!-- Content -->
    <div style="min-height: 80vh;">
        <?php include 'content.php'; ?>
    </div>
    <!-- /.Content -->

    <!-- Script -->
    <script type="text/javascript" src="./assets/js/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).on('dblclick', '.form-check-input', function() {
            if (this.checked) {
                $(this).prop('checked', false);
            }
        });
    </script>

</body>

</html>