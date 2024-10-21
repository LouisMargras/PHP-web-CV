<?php
header('Location: /login');
session_start();

if (isset($_POST['dark_mode'])) {
    $_SESSION['dark_mode'] = $_POST['dark_mode'];
}

$dark_mode_class = isset($_SESSION['dark_mode']) && $_SESSION['dark_mode'] === 'enabled' ? 'dark-mode' : '';
?>
<body class="<?php echo $dark_mode_class; 
?>">

