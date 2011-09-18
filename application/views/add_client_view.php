        <table class='addClient'>
            <tr>
                <td>
                    <h2>Dodaj Klienta</h2>
                    <?php echo form_open('home/addClient'); ?>
                    <p>
                        <label for="imie">Imie:</label><br>
                        <input type="text" id="imie" name="imie"/>
                    </p>

                    <p>
                        <label for="nazwisko">Nazwisko:</label><br>
                        <input type="text" id="nazwisko" name="nazwisko"/>
                    </p>

                    <p>
                        <label for="firma">Nazwa firmy:</label><br>
                        <input type="text" id="firma" name="firma"/>
                    </p>

                    <p>
                        <label for="email">Email:</label><br>
                        <input type="text" id="email" name="email"/>
                    </p>
                    Grupa: 
                    <select name="grupa" id="grupa">
                        <?php foreach ($grupa as $row): ?>
                        <option value="<?php echo (int)$row->id; ?>"><?php echo $row->name; ?></option>
                        <?php endforeach;  ?>
                    </select>

                    <p><?php echo form_submit('submit', 'dodaj') ?></p>
                    <?php echo form_close(); ?></td>
                <td>
                    <h2>Dodaj z pliku</h2>
                    <?php echo form_open_multipart('home/readFromFile',array('id' => 'wczytajPlik')); ?>
                    <input type="file" name="emailsFile"><br>

                    <select name="grupa" id="grupa">
                        <?php foreach ($grupa as $row): ?>
                        <option value="<?php echo (int)$row->id; ?>"><?php echo $row->name; ?></option>
                        <?php endforeach;  ?>
                    </select>

                    <input type="submit" value="Wczytaj">

                    <?php echo form_close(); ?>
                </td>
            </tr>
        </table>
       </section>