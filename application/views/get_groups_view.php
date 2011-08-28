<div class="grupy">
    <?php echo form_open('home/addGroup',array("id" => 'groupform')); ?>
    <label for="nazwagrupy">Dodaj grupę:</label><br>
    <input type="text" name="nazwagrupy" >
    <?php echo form_submit('submit','Dodaj'); ?>
    <?php echo form_close(); ?>
    <hr>
    <?php foreach ($grupa as $row): ?>

        <p id="<?php echo $row->id; ?>"><?php echo $row->name; ?></p>

    <?php endforeach; ?>
</div>
<div class="emails">

</div>
<script type="text/javascript">

    $(window).load(function() {
        $.jGrowl("Kliknij grupę aby wyświetlić adresy email do niej przypisane.")
    });

    $('div.grupy p').click(function() {
        $.ajax({
            type: "POST",
            url: "http://localhost:81/MM/index.php/home/getGroupClients",
            data: "id=" + $(this).attr('id'),
            success: function(result) {
                $(".emails").hide().fadeIn().html(result);
            }
        });
        return false;
    });
</script>
</section>