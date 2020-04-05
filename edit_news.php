
<?php
    include ("header.php");
    //include ("sidebar.php");
    $ed_id = $_GET["ed_id"];
    echo $ed_id;
    //$detailedNewsQuery ="SELECT * FROM news WHERE `id` = $new_id";
    $result = mysqli_query($link, "SELECT * FROM news WHERE `ID` = $ed_id");
    //var_dump($result);
    $row = $result->fetch_assoc();
    $prev = $row['Prev'];
    $stext = $row['SText'];
    $ltext = $row['LText'];
    $img = $row['img']; 

?>
    <fieldset>
		<form method ="post" action = "">
            <strong><legend>Добавление новости</legend></strong>
            <br>
			<u><label >Заголовок новости:<input type="text" style = "padding: 10px; width:100%; height: 20px;" name = "edit_prev" required placeholder=  "Заголовок новости" value="<?=$prev?>"></label><br>
			<label >Краткое описание новости:<input type="text" style = "padding: 10px; width:100%; height: 50px;" name = "edit_stext" required placeholder=  "Краткое описание новости:" value = "<?=$stext?>"></label><br>
			<label >Полный текст новости:<input type="text" style = "padding: 10px; width:100%; height: 200px;" name = "edit_ltext" required placeholder=  "Полный текст новости" value = "<?=$ltext?>"></label><br>
            <label >Адрес изображения:<input type="text" style = "padding: 10px; width:100%; height: 20px;" name = "edit_img" required placeholder=  "Введите адрес до изображения: " value = "<?=$img?>"></label><br>
            <input type="submit" value="Редактировать новость">
            <input type = "button" value = "Отмена" onClick = "exit()" >
        <script>
            function exit()
            {
                window.location = "index.php";
            }
        </script>
		</form>
	</fieldset>
<?php
    include ("footer.php");
?>
<?php
if (isset($_POST['edit_prev'])&&isset($_POST['edit_stext'])&&isset($_POST['edit_ltext'])&&isset($_POST['edit_img']))
    {
        $edit_prev = $_POST['edit_prev'];
        $edit_stext = $_POST['edit_stext'];
        $edit_ltext = $_POST['edit_ltext'];
        //$image= 'images/'.$index.'.jpg';
        $edit_img = $_POST['edit_img']; 
     
        
            
        $add_news = "UPDATE news SET  LText = '$edit_ltext', Prev = '$edit_prev', SText = '$edit_stext', img = '$edit_img' WHERE ID = $ed_id";// name = '$name_for_check', password = '$password' "; 
        $added_new_news = mysqli_query($link, $add_news);
        if($added_new_news)
        {
            echo "<script>alert('Новость изменена успешно');</script>";
            echo "<script>self.location='index.php';</script>";
        }
        
    }
?>
