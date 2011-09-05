        <table class='addClient'>
            <?php foreach($email as $mail): ?>
            <h2><?php echo $mail->title; ?></h2>
            <?php endforeach ?>
            <tr>
                <td id="grupy">
            <ul>
                <?php foreach($grupy as $grupa): ?>
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
        <script type="text/javascript">
            $("td#grupy li").draggable({
                revert: true,
                appendTo: 'body'
            });
            $("td#grupywybrane").droppable({
                hoverClass: 'liHover',
                drop: function(event,ui) {
                    $("p#bgText").fadeOut('slow');
                    $(this).find(".placeholder").remove();
                    $("<li></li>").text(ui.draggable.text()).appendTo(this).attr("id",(ui.draggable).attr('id'));
                    setTimeout(function() {
                       $(ui.draggable).fadeOut('slow');
                    },100);
                }
            });
        </script>