<div id="sidebar">
    <p><a href="index.php">На главную</a></p>
	<br>
    <p><a href="aboutSite.html">О сайте</a></p>
    <?
        //var_dump($_SESSION['FLAG_login']);
        if(!isset($_SESSION['FLAG_login'])||($_SESSION['FLAG_login'] == FALSE))
        {

    ?>
    <fieldset>
        <form method = "post" action = "">
            <legend>Вход</legend>
            <label>Логин <input type = "text" name = "login" required></label><br>
            <label>Пароль <input type = "text" name = "password" required></label><br>
            <input type = "submit" value = "Подтвердить">
        </form>
        <a href = "registration.php">Регистрация</a>
    </fieldset>
<?

        }
        else
        {
            print ("Приветствуем,".$_SESSION['name']."!");
?>
            <a href = "index.php?exit=1">Выйти</a>
<?
            if ($_SESSION['FLAG_ADM'] == TRUE )
            {
                ?>
                  <input type = "button" value = "Добавить новость" onClick = "add_news()">
            
            <script>
                function add_news()
                {
                    window.location = "add_news.php";
                }
            </script>
                <?
            }
        }

?>
</div>
   <div id="content">
    <h2>Февральские новости</h2>

    
