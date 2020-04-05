<?
    include("header.php");
    include("sidebar.php"); 
    $new_id = $_GET["id"];
    //$detailedNewsQuery ="SELECT * FROM news WHERE `id` = $new_id";
    $result = mysqli_query($link, "SELECT * FROM news WHERE `ID` = $new_id");
    //var_dump($result);
    $row = $result->fetch_assoc();
?>

    <div>
    <img class="picture" src=<?=$row["img"]?>>
        <div class="newsBody">
         <div class="newsDate"> <?=$row["Date"]?></div> <h3><?=$row["SText"]?></h3> <p class="newsText"> <?=$row["LText"]?> </p> </div>	
    </div>

<?
  include("footer.php");
?>