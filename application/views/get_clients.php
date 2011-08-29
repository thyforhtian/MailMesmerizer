<table class="getClients">
    <?php foreach ($clients as $row): ?>

    <tr id="<?php echo $row->id; ?>">
        <td><?php echo $row->imie; ?></td>
        <td><?php echo $row->nazwisko; ?></td>
        <td><?php echo $row->firma; ?></td>
        <td><?php echo $row->email; ?></td>
        <td width="50px"><img class="delete" id="<?php echo $row->id; ?>"
                              src="<?php echo base_url() ?>assets/img/delete.png"></td>
    </tr>
    <?php endforeach; ?>

</table>
<div id="pagination"><?php echo $paglinks ?></div>
</section>

<script type="text/javascript">

    $("img.delete").click(function() {
        var id = $(this).attr('id');
        $.ajax({
            type: "POST",
            url: "http://localhost:81/MM/index.php/home/deleteClient",
            data: "id=" + id,
            success: function() {
                $("tr[id='" + id + "']").css("color", "red").delay(1000).fadeOut();
                $.jGrowl("Klient został usunięty");
            },
            error: function() {
                alert("wystapil bląd");
            }
        });
        return false;
    });
</script>
