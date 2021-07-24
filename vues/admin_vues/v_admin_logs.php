<?php

use Utilities\Utilities;

require_once(__DIR__ . '/../../controleurs/utilities.php');

?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/codemirror.min.js" integrity="sha512-i9pd5Q6ntCp6LwSgAZDzsrsOlE8SN+H5E0T5oumSXWQz5l1Oc4Kb5ZrXASfyjjqtc6Mg6xWbu+ePbbmiEPJlDg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/codemirror.min.css" integrity="sha512-xIf9AdJauwKIVtrVRZ0i4nHP61Ogx9fSRAkCLecmE2dL/U8ioWpDvFCAy4dcfecN72HHB9+7FfQj3aiO68aaaw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/theme/ayu-dark.min.css" integrity="sha512-mV3RUXi1gt22jDb4UyRBFhZVFgAIiOfRE6ul+2l1Hcj6glyg6x4xlnjPH+neGm/t6XrFmsMRu4++McQu0asjqg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.2/mode/clojure/clojure.min.js" integrity="sha512-Bdg47TFnsz6MznbY1UUA9FkQl4i1A0U7yMrLalfzaFHnIoGve+bDipauF7PFOHu1nMVuK99FiSUYGZ/ktvWBjA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<h2>Journalisation</h2>

<label for="selectLog">Séléction d'une date</label>
<select class="form-control w-50" id="selectLog">
    <option value="">Choisir...</option>
    <?php
    $listMonths = [];
    foreach ($dates as $date) {
        $split = explode('/', $date);
        if (isset($split[1], $split[2])) {
            if (!in_array($split[1], $listMonths)) {
                $listMonths[] = $split[1];
                ?>
                <optgroup label="<?php echo Utilities::idToMonth($split[1]) . ' ' . $split[2] ?>"></optgroup>
                <?php
            }
        }
        
        ?>
        <option value="<?=$date?>"><?=$date?></option>
        <?php
    }
    ?>
</select>
<div id="logs"></div>
<div id="log-content" class="mt-4"></div>
