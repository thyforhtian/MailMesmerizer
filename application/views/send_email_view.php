<?php foreach ($email as $row): ?>
<h2><?php echo $row->title; ?></h2>
<?php $mailid = $row->id; ?>
<?php endforeach; ?>
<table class='addClient'>
    <tr>
        <td id="grupy">
            <ul>
                <?php foreach ($grupy as $grupa): ?>
                <li id="<?php echo $grupa->id ?>">
                    <?php echo $grupa->name; ?>
                </li>
                <?php endforeach ?>
            </ul>


        </td>
        <td id="grupywybrane">
            <p id="bgText">Przenieś grupy do których chcesz wysłać wiadomość</p>
            <ul>
                <li class="placeholder"></li>
            </ul>
        </td>
    </tr>
</table>


<section class="sendingopt">
    <label for="topic">Temat:</label>
    <input type="text" name="topic"><br>
    <table class="sendingopt">
        <tr>
            <td>
                <label for="sendas">Wyślij z adresu:</label>
                <input type="text" name="sendas"><br>
                <label for="sendasvisible">Wyświetlana nazwa:</label>
                <input type="text" name="sendasvisible">

            </td>
            <td>
                <label for="sendchnks">Wysyłaj w częściach(podaj ilość):</label>
                <input type="text" name="sendChunks"><br>
                <label for="sendInterval">Interwał(w sekundach):</label>
                <input type="text" name="sendInterval">
            </td>
            <td>
                <input type="button" name="submit" id="sendMails" value="Wyślij">
            </td>
        </tr>
    </table>

</section>
<textarea name="toSendto" id="toSendto" cols="auto" rows="auto"></textarea>
<script type="text/javascript">
    $("td#grupy li").draggable({
        revert: true,
        appendTo: 'body'
    });
    $("td#grupywybrane").droppable({
        hoverClass: 'liHover',
        drop: function(event, ui) {
            $("p#bgText").fadeOut('slow');
            $(this).find(".placeholder").remove();
            $("<li></li>").text(ui.draggable.text()).appendTo(this).attr("id", (ui.draggable).attr('id'));
            setTimeout(function() {
                $(ui.draggable).fadeOut('slow');
            }, 100);

            var id = $(ui.draggable).attr('id');

            $.ajax({
                type: "POST",
                url: "<?php echo site_url() ?>/home/getGroupClients/",
                data: "id=" + id,
                success: function(data) {
                    $("textarea#toSendto").prepend(data, function() {
                        $("textarea#toSendto").css('display', 'visible');
                    });
                    console.log('sukces')
                },
                error: function() {
                    console.log("wystapil bląd");
                }
            });

        }
    });

    $("input#sendMails").click(function() {
        var emtsa = $("textarea#toSendto").val();
        var sendas = "&sendas=" + $("input[name = 'sendas']").val();
        var sendasvisible = "&sendasvisible=" + $("input[name = 'sendasvisible']").val();
        var sendChunks = "&sendChunks=" + $("input[name = 'sendChunks']").val();
        var sendInterval = "&sendInterval=" + $("input[name = 'sendInterval']").val();
        var topic = "&topic=" + $("input[name = 'topic']").val();
        $.ajax({
            type: "POST",
            url: "<?php echo site_url() ?>/home/sendEmail",
            data: "&submit=submit&emtsa=" + emtsa + "&mailid=<?php echo $mailid;  ?>" + sendas + sendasvisible + sendChunks + sendInterval + topic,
            success: function(data) {
                console.log(data);
                console.log('sukces')
            },
            error: function(data) {
                console.log(data);
                console.log("wystapil bląd");
            }
        });


    });
</script>