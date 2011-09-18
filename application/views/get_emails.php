<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.simplemodal.js"></script>
<?php echo anchor('home/addEmailView', 'Nowa Wiadomość'); ?>
<table class="getClients">
    <?php foreach ($clients as $row): ?>
    <?php $id = $row->id; ?>
    <tr id="<?php echo $id ?>">
        <td><?php echo $row->id; ?></td>
        <td><a href="updateEmail/<?php echo $id ?>"><?php echo $row->title; ?></a></td>
        <td width="50px"><img class="delete" id="<?php echo $row->id; ?>"
                              src="<?php echo base_url() ?>assets/img/delete.png"></td>
        <td width="50px"><img class="preview" id="<?php echo $row->id; ?>"
                              src="<?php echo base_url() ?>assets/img/options.png"></td>
        <td width="50px"><a href="<?php echo site_url() ?>/home/sendEmail/<?php echo $row->id ?>"><img class="send" id="<?php echo $row->id; ?>"
                                  src="<?php echo base_url() ?>assets/img/mail_small.png"></a></td>
    </tr>
    <?php $content = str_replace(array("\n\r", "\n", "\r"), "", addslashes($row->content)); ?>
    <script type="text/javascript">
        $("img.preview").click(function() {
            $.modal("<?php echo $content; ?>");
        });
    </script>
    <?php endforeach; ?>

</table>
<div id="pagination"><?php echo $paglinks ?></div>
<div>
</div>
</section>

<script type="text/javascript">

    $("img.delete").click(function() {
        var id = $(this).attr('id');
        $.ajax({
            type: "POST",
            url: "<?php echo site_url()?>/home/deleteEmail",
            data: "id=" + id,
            success: function() {
                $("tr[id='" + id + "']").css("color", "red").delay(1000).fadeOut();
                $.jGrowl("Wiadomość została usunięta");
            },
            error: function() {
                alert("wystapil bląd");
            }
        });
        return false;
    });
</script>
