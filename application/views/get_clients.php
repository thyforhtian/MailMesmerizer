<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <?php echo link_tag('assets/css/style.css'); ?>
    </head>
    <body>
    <section id="wrapper">
        <header>
        <nav>
            <?php echo anchor(site_url(),'Start'); ?>
            <?php echo anchor('/home/getClients','Klienci'); ?>
            <?php echo anchor('/home/addClientView','Dodaj Klienta'); ?>
            <?php echo anchor('/home/getGroups','Grupy'); ?>
        </nav>
    </header>
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
    </section>
    </body>
</html>
