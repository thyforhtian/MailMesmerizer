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