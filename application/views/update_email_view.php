<script type="text/javascript" src="<?php echo base_url() ?>/assets/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>/assets/ckeditor/adapters/jquery.js"></script>
<div class='addEmail'>
    <h2>Edytuj Wiadomość</h2>
    <?php foreach ($email as $e): ?>
    <?php
        $title = $e->title;
    $content = $e->content;
    ?>
    <?php endforeach ?>
    <?php echo form_open('home/updateEmail/' . $id); ?>
    <p>
        <label for="title">Tytuł:</label><br>
        <input type="text" id="title" name="title" value="<?php echo $title; ?>"/>
    </p>

    <p>
        <label for="mailBody">Treść wiadomości:</label>
        <?php echo form_textarea('mailBody', $content); ?>
    </p>

    <p>
        <?php echo form_submit('', 'Zapisz'); ?>
    </p>

    <?php echo form_close(); ?></td>
</div>
</section>
<script type="text/javascript">
    $(document).ready(function() {
        $("textarea.[name='mailBody']").ckeditor({
            skin: 'office2003',
            autoParagraph: false,
            autoGrow_minHeight: 400
        });
    });
</script>

    