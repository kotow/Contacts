<?php include_once DX_ROOT_DIR . 'views/elements/header.php'; ?>
<?php if(isset($_SESSION['username'])){include_once DX_ROOT_DIR . 'views/elements/sidebar.php'; }?>
<?php include_once $template_file; ?>
<?php include_once DX_ROOT_DIR . 'views/elements/footer.php'; ?>