<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <nav aria-label="breadcrumb" class="w-100">  
        <ol class="breadcrumb border">
            <li class="breadcrumb-item"><a href="/"><?= $_SERVER['HTTP_HOST']; ?></a></li>
            <li class="breadcrumb-item"><a href="/admin/panel">Panel d'administration</a></li>
            <?php
            if (isset($currentConfigPage['heading']) && !empty($currentConfigPage['heading'])) {
                ?>
                <li class="breadcrumb-item"><a href="/admin/<?= $currentConfigPage['heading']['href'] ?>"><?= $currentConfigPage['heading']['title'] ?></a></li>
                <?php
            }
            ?>
            <li class="breadcrumb-item active"><?= $currentConfigPage['title'] ?></li>
        </ol>
    </nav>
</div>
