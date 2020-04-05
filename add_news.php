
<?php
    include ("header.php");
    //include ("sidebar.php");
?>
    <fieldset>
		<form method ="post" action = "">
            <strong><legend>Добавление новости</legend></strong>
            <br>
			<u><label >Заголовок новости:<input type="text" style = "padding: 10px; width:100%; height: 20px;" name = "prev" required placeholder=  "Заголовок новости" value = ""></label><br>
			<label >Краткое описание новости:<input type="text" style = "padding: 10px; width:100%; height: 50px;" name = "stext" required placeholder=  "Краткое описание новости:" value = ""></label><br>
			<label >Полный текст новости:<input type="text" style = "padding: 10px; width:100%; height: 200px;" name = "ltext" required placeholder=  "Полный текст новости" value = ""></label><br>
            <label >Адрес изображения:<input type="text" style = "padding: 10px; width:100%; height: 20px;" name = "img" required placeholder=  "Введите адрес до изображения: " value = "images/preview/.png"></label><br>
            <input type="submit" value="Добавить новость">
		</form>
	</fieldset>
<?php
    include ("footer.php");
?>
<?php
if (isset($_POST['prev'])&&isset($_POST['stext'])&&isset($_POST['ltext'])&&isset($_POST['img']))
    {
        $prev = $_POST['prev'];
        $stext = $_POST['stext'];
        $ltext = $_POST['ltext'];
        //$image= 'images/'.$index.'.jpg';
        $img = $_POST['img']; 
     
        //$dir = 'images/'. $index .'.jpg';
        $check_query = "SELECT id FROM news WHERE LText = '$ltext' OR 	Prev = '$prev' OR SText = '$stext' ";
        $query = mysqli_query($link, $check_query);
        if(mysqli_num_rows($query) > 0)
        {
            //var_dump($check_query);
            print ("Подобная новость уже существует в базе данных");
        }  
        else
        {
            
            $add_news = "INSERT INTO `news` SET  LText = '$ltext',	Prev = '$prev', SText = '$stext', img = '$img '";// name = '$name_for_check', password = '$password' "; 
            $added_new_news = mysqli_query($link, $add_news);
            if($added_new_news)
            {
                echo "<script>alert('Новость добавлена успешно');</script>";
                echo "<script>self.location='index.php';</script>";
            }
        }

    }
?>
