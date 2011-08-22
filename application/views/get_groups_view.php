<div class="grupy">
    <?php foreach ($grupa as $row): ?>

        <p id="<?php echo $row->id; ?>"><?php echo $row->name; ?></p>

    <?php endforeach; ?>
</div>
<div class="emails">

</div>
<script type="text/javascript">

    $('div.grupy p').click(function() {
        $.ajax({
            type: "POST",
            url: "http://localhost:81/MM/index.php/home/getGroupClients",
            data: "id=" + $(this).attr('id'),
            success: function(result) {
                $(".emails").hide().fadeIn().text(result);
            }
        });
        return false;
    });
</script>
</section>