<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
    <header>
        <nav>
            <?php echo anchor(site_url(),'Start'); ?>
            <?php echo anchor('/home/getClients','Klienci'); ?>
            <?php echo anchor('/home/addClientView','Dodaj Klienta'); ?>
        </nav>
    </header>
        <table>
            <?php foreach($clients as $row): ?>
            
            <tr>
                <td><?php echo $row->imie; ?></td>
                <td><?php echo $row->nazwisko; ?></td>
                <td><?php echo $row->adres; ?></td>
                <td><?php echo $row->email; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>
