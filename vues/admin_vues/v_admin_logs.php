<h2>Journalisation</h2>

<label for="selectLog">Séléction d'une date</label>
<select class="form-control w-50" id="selectLog">
    <?php
    foreach ($dates as $date) {
        ?>
        <option value=""><?=$date?></option>
        <?php
    }
    ?>
</select>
