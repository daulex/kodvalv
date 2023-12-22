<div class="k-form-row row-checkbox">
    <input 
        name="<?=$args['name']?>" 
        type="checkbox" 
        value="1" 
        <?php if ($args['value'] === '1') { echo 'checked'; } ?>
    >
    <label for="<?=$args['name']?>"><?=$args['label']?></label>
</div>