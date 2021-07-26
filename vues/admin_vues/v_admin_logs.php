<?php

use Controller\src\Utilities\DateManager;

require_once(__DIR__ . '/../../controleurs/src/Utilities.php');

?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/codemirror.min.js" integrity="sha512-i9pd5Q6ntCp6LwSgAZDzsrsOlE8SN+H5E0T5oumSXWQz5l1Oc4Kb5ZrXASfyjjqtc6Mg6xWbu+ePbbmiEPJlDg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/codemirror.min.css" integrity="sha512-xIf9AdJauwKIVtrVRZ0i4nHP61Ogx9fSRAkCLecmE2dL/U8ioWpDvFCAy4dcfecN72HHB9+7FfQj3aiO68aaaw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/theme/ayu-dark.min.css" integrity="sha512-mV3RUXi1gt22jDb4UyRBFhZVFgAIiOfRE6ul+2l1Hcj6glyg6x4xlnjPH+neGm/t6XrFmsMRu4++McQu0asjqg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.2/mode/clojure/clojure.min.js" integrity="sha512-Bdg47TFnsz6MznbY1UUA9FkQl4i1A0U7yMrLalfzaFHnIoGve+bDipauF7PFOHu1nMVuK99FiSUYGZ/ktvWBjA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<h2>Journalisation</h2>

<div class="alerts"></div>

<noscript>
    <div class="alert alert-danger" role="alert">
        <i class="fas fa-exclamation-triangle"></i>
        Cette page nécessite l'activation de JavaScript
    </div>
    <style>
        #content {
            display: none !important;
        }
    </style>
</noscript>
<div id="content">
    <div class="form-group w-50">
        <label for="search-bar">Rechercher une date</label>
        <input type="text" class="form-control" autocomplete="off" name="search-bar" placeholder="ex: 22/07/2021" id="search">
    </div>
    <label for="search-bar">Rechercher parmi la liste</label>
    <div id="select">
        <select class="form-control w-50" id="selectLog">
            <option value="">Choisir ...</option>
            <?php
            $listMonths = [];
            foreach ($dates as $date) {
                $split = explode('/', $date);
                if (isset($split[1], $split[2])) {
                    if (!in_array($split[1] . '/' . $split[2], $listMonths)) {
                        $listMonths[] = $split[1] . '/' . $split[2];
                        ?>
                        <optgroup label="<?php echo DateManager::idToMonth($split[1]) . ' ' . $split[2] ?>"></optgroup>
                        <?php
                    }
                }
                ?>
                <option value="<?=$date?>"><?=$date?></option>
                <?php
            }
            ?>
        </select>
    </div>
    <div id="logs"></div>
    <div id="log-content"></div>
</div>

