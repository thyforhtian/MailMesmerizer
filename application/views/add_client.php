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
        <h2>Dodaj Klienta</h2>
        <?php echo form_open('home/addClient'); ?>
        <p>
        <label for="imie">Imie:</label><br>
        <input type="text" id="imie" name="imie" />
        </p>
        <p>
        <label for="nazwisko">Nazwisko:</label><br>
        <input type="text" id="nazwisko" name="nazwisko" />
        </p>
        <p>
        <label for="adres">Adres:</label><br>
        <input type="text" id="adres" name="adres" />
        </p>
        <p>
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email" />
        </p>
        <select name="grupa" id="grupa">
            <?php foreach($grupa as $row): ?>
            <option value="<?php echo (int)$row->id; ?>"><?php echo $row->name; ?></option>
            <?php endforeach;  ?>
        </select>
        <p><?php echo form_submit('submit','dodaj') ?></p>
        <?php echo form_close(); ?>
    </body>
</html>
