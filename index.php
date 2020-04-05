<?
  include("header.php");
  include("sidebar.php");
  $newsQuery = "SELECT * FROM news ORDER BY Date DESC LIMIT 6"; // LIMIT = 10 
  $result = mysqli_query($link, $newsQuery);
  while( $row = $result -> fetch_assoc())
  {
     $id_ed = $row["ID"];
?>
  
  
   
   <div class="news">
      <img class="picture" src=<?=$row["img"]?>>
      <div class="newsBody">
         <div class="newsDate"><?=$row["Date"]?> </div>
	      <a class="newsTitle" href="detailedNews.php?id=<?=$row["ID"]?>"><h3><?=$row["SText"]?></h3></a>
	      <p class="newsText"> <?=$row["Prev"]?></p>
         <p class="newsText"> <?=$row["ID"]?></p>
	   </div>	
   </div>
   
    
   

<?
      if(isset($_SESSION['FLAG_login']))
      {
               if ($_SESSION['FLAG_ADM'] == TRUE )
               {
?>
                     <a class="newsTitle" href="edit_news.php?ed_id=<?=$id_ed?>"><h3>Изменить новость<?=$row["ID"]?></h3></a>
                     <a class="newsTitle" href="del_news.php?del_id=<?=$id_ed?>"><h3>Удалить новость<?=$row["ID"]?></h3></a>
<?
               }
      }
?>
      
<?
   }
   include ("footer.php");
?>   
</div>