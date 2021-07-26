<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
            <?php
            foreach ($admin_pages as $item) {
                if (isset($item['header']) && $item['header'] === true) {
                    ?>
                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span><?= $item['title'] ?></span>
                    </h6>
                    <?php
                } else {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link<?php
                        if ($currentPagePath == $item['href'] || $currentConfigPage['href'] === $item['href']) {
                            echo ' active';
                        }
                        ?>" href="/admin/<?= $item['href'] ?>">
                            <i class="<?php echo $item['icon']; ?>"></i>
                            <span class="text-color-default"><?php echo $item['title']; ?></span>
                        </a>
                    </li>
                    <?php
                }
            }
            ?>
        </ul>
    </div>
</nav>
