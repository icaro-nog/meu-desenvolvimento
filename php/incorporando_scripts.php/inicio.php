<?php
    //include "menu.php"; // Produz um "Warning" caso não encontre a o include

    require_once "menu.php"; // Produz um "Fatal error" e não reproduz no conteúdo posterior a tag
?>

conteúdo da página (Início)
<br>

<?php
    //include_once "menu.php"; // Inclui apenas uma vez e não permite que outras tags incluam o mesmo include

    require_once "menu.php"; // Produz um "Fatal error" e não reproduz no conteúdo posterior a tag

    // ONCE -> Uma vez, permite reproduzir o script apenas uma vez por página
?>git