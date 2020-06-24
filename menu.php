<div id="menu">
    <?php
        // если нет параметра меню – добавляем его
        if (!isset($_GET['p'])) $_GET['p']='viewer';
        echo '<a href="?p=viewer"'; // первый пункт меню
        if ($_GET['p'] == 'viewer') // если он выбран
        echo ' class="selected"'; // выделяем его
        echo '>Просмотр записей</a><br>';

        if( $_GET['p'] == 'viewer' ) //если был выбран первый пунт меню
            {
            echo '<div id="submenu">'; // выводим подменю
            echo '<a href="?p=viewer&sort=byid"'; // первый пункт подменю
            if( !isset($_GET['sort']) || $_GET['sort'] == 'byid' )
                echo ' class="selected"';
            echo '>По-умолчанию</a><br>';
            echo '<a href="?p=viewer&sort=fam"'; // второй пункт подменю
            if( isset($_GET['sort']) && $_GET['sort'] == 'fam' )
                echo ' class="selected"';
            echo '>По фамилии</a><br>';
            echo '<a href="?p=viewer&sort=date"'; // третий пункт подменю
            if( isset($_GET['sort']) && $_GET['sort'] == 'date_birthday' )
                echo ' class="selected"';
            echo '>По дате рождения</a><br>';
            echo '</div>'; // конец подменю
            }

        echo '<a href="?p=add"'; // второй пункт меню
        if( $_GET['p'] == 'add' ) echo ' class="selected"';
        echo '>Добавление записи</a><br>';
            echo '<a href="?p=edit"'; // третий пункт меню
        if( $_GET['p'] == 'edit' ) echo ' class="selected"';
        echo '>Редактирование записи</a><br>';
        echo '<a href="?p=delete"'; // четвёртый пункт меню
        if( $_GET['p'] == 'delete' ) echo ' class="selected"';
        echo '>Удаление записи</a><br>';

    ?>
</div>