    <?php 
    include("Config.php");
      
		if (isset($_FILES['image']) &&  $_FILES['image']['size'] > 0)
			{ 


      $tmpName  = $_FILES['image']['tmp_name'];  

      $fp = fopen($tmpName, 'r');

      $data = fread($fp, filesize($tmpName));

      $data = addslashes($data);

      fclose($fp);

        ?>