<div class='addEmail'>
    <h2>Dodaj Wiadomość</h2>
    <?php echo form_open('home/addEmail'); ?>
    <p>
        <label for="title">Tytuł:</label><br>
        <input type="text" id="title" name="title"/>
    </p>

    <p>
        <label for="mailBody">Treść wiadomości:</label>
        <?php echo form_textarea('mailBody'); ?>
    </p>
     <p>
        <?php echo form_submit('','Zapisz'); ?>
    </p>

    <?php echo form_close(); ?></td>
</div>
</section>