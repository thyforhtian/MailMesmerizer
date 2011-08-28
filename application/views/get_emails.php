<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.simplemodal.js"></script>
<?php echo anchor('home/addEmailView', 'Nowa Wiadomość'); ?>
<table class="getClients">
    <?php foreach ($clients as $row): ?>
    <?php $id = $row->id; ?>
    <tr>
        <td><?php echo $row->id; ?></td>
        <td><?php echo $row->title; ?></td>
        <td width="50px"><?php echo img('assets/img/delete.png'); ?></td>
        <td width="50px"><img class="preview" id="<?php echo $row->id; ?>"
                              src="<?php echo base_url() ?>assets/img/options.png"></td>
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
</section>


