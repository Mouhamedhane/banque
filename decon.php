<?php
/
session_start();

session_destroy();

include('index.php');
?>

<script>
    history.replaceState(null, null, '<?php echo $_SERVER["REQUEST_URI"]; ?>');
</script>
