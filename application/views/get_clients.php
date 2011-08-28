        <table class="getClients">
            <?php foreach($clients as $row): ?>

            <tr>
                <td><?php echo $row->imie; ?></td>
                <td><?php echo $row->nazwisko; ?></td>
                <td><?php echo $row->firma; ?></td>
                <td><?php echo $row->email; ?></td>
                <td>kontrolki</td>
            </tr>
            <?php endforeach; ?>

            </table>
            <div id="pagination"><?php echo $paglinks ?></div>
    </section>
