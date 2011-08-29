<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <?php echo link_tag('assets/css/style.css'); ?>
        <?php echo link_tag('assets/css/jquery.jgrowl.css'); ?>
        <?php echo link_tag('assets/css/basic.css'); ?>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.6.2.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.jgrowl_minimized.js"></script>

    </head>
    <body>
    <section id="wrapper">
        <header>
            <?php echo img('assets/img/mm_logo_small.png'); ?>
        <nav>
            <?php echo anchor(site_url(),'Start'); ?>
            <?php echo anchor('/home/getClients','Klienci'); ?>
            <?php echo anchor('/home/addClientView','Dodaj Klienta'); ?>
            <?php echo anchor('/home/getGroups','Grupy'); ?>
            <?php echo anchor('/home/getEmails','Wiadomości'); ?>
        </nav>
    </header>