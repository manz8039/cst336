<?php
function changeView() {
    $_SESSION['form'] = ($_SESSION['form'] == 'generate' ? 'history' : 'generate');
}
?>
