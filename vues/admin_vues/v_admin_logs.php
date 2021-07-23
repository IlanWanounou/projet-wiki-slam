<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/codemirror.min.js" integrity="sha512-i9pd5Q6ntCp6LwSgAZDzsrsOlE8SN+H5E0T5oumSXWQz5l1Oc4Kb5ZrXASfyjjqtc6Mg6xWbu+ePbbmiEPJlDg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/codemirror.min.css" integrity="sha512-xIf9AdJauwKIVtrVRZ0i4nHP61Ogx9fSRAkCLecmE2dL/U8ioWpDvFCAy4dcfecN72HHB9+7FfQj3aiO68aaaw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/theme/ayu-dark.min.css" integrity="sha512-mV3RUXi1gt22jDb4UyRBFhZVFgAIiOfRE6ul+2l1Hcj6glyg6x4xlnjPH+neGm/t6XrFmsMRu4++McQu0asjqg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/mode/css/css.min.js" integrity="sha512-YeNG6eTv+q+p/vvx+E5u05IBRurTlv0jfQuvitZMD+oNe9TfrGw+z4MHHxhPlE3X3csemC5YXlzDLMSZrgb34A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/keymap/sublime.min.js" integrity="sha512-CB1k89Ilzxp1upm9MpHjWR0Ec2wg/OzDfWC/pmjJkDnxmXMl4AhgZ4bYPdkWjlL6NoLfoZppxHf55hunUgg8wQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<h2>Journalisation</h2>

<label for="selectLog">Séléction d'une date</label>
<select class="form-control w-50" id="selectLog">
    <option value="">Choisir...</option>
    <?php
    foreach ($dates as $date) {
        ?>
        <option value="<?=$date?>"><?=$date?></option>
        <?php
    }
    ?>
</select>
<div id="logs"></div>
