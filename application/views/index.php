<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title></title>
    <?php echo link_tag('assets/css/style.css'); ?>
    <?php echo link_tag('assets/css/jquery.jgrowl.css'); ?>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.6.2.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.jgrowl_minimized.js"></script>
</head>
<body>
<section id="wrapper">


    <table id="indexMenu">
        <tr>
            <td colspan="5"><?php echo img('assets/img/mm_logo_big.png'); ?></td>
        </tr>
        <tr>
            <td colspan="5">&nbsp;</td>
        </tr>
        <tr>
            <td><a href="<?php echo site_url(); ?>"><img src="assets/img/home.jpg" alt=""></a></td>
            <td><a href="index.php/home/getClients"><img src="assets/img/clients.jpg" alt=""></a></td>
            <td><a href="index.php/home/getClients/home/addClients"><img src="assets/img/add.jpg" alt=""></a></td>
            <td><a href="index.php/home/getGroups"><img src="assets/img/groups.jpg" alt=""></a></td>
            <td><a href="index.php/home/getEmails"><img src="assets/img/mail.jpg" alt=""></a></td>
        </tr>
        <tr>
            <td>HOME</td>
            <td>KLIENCI</td>
            <td>DODAJ KLIENTÓW</td>
            <td>GRUPY</td>
            <td>Wiadomości</td>
        </tr>
    </table>
</section>
