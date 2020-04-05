<?
  include("header.php");


?>

  <fieldset>
    <form method = "post" action = "">
        <legend>Вход</legend>
        <label>Придумайте логин <input type = "text" name = "new_login" required></label><br>
        <label>Придумайте пароль <input type = "text" name = "new_password" required></label><br>
        <input type = "submit" value = "Подтвердить">
        <input type = "button" value = "Отмена" onClick = "exit()" >
        <script>
            function exit()
            {
                window.location = "index.php";
            }
        </script>
    </form>
  </fieldset>
  
<?
    if(isset($_POST['new_login'])&&isset($_POST['new_password']))
    {
        $name_for_check = $_POST['new_login'];
        $check_name = "SELECT id FROM users WHERE name = '$name_for_check' ";
        $check_query = mysqli_query($link, $check_name);
        if(mysqli_num_rows($check_query) > 0)
        {
            print("Логин ".$name_for_check." уже есть");
        }
        else
        {
            $password = md5(md5($_POST['new_password']));
            $add_user = mysqli_query($link, "INSERT INTO users SET name = '$name_for_check', password = '$password' ");;
            if($add_user)
            {
                echo "<script>alert('Регистрация прошла успешно');</script>";
                echo "<script>self.location='index.php';</script>";
            }
        }
    }
    
include("footer.php");
?>