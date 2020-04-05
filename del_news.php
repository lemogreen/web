
<?php

    $del_id = $_GET["del_id"];  
    $link = mysqli_connect('localhost', "root", '', 'newslr2');  
        $del_news = "DELETE FROM news WHERE ID = $del_id";// name = '$name_for_check', password = '$password' "; 
        $deleted_news = mysqli_query($link, $del_news);
        if($deleted_news)
        {
            echo "<script>alert('Новость удалена успешно');</script>";
            echo "<script>self.location='index.php';</script>";
        }
        
?>
