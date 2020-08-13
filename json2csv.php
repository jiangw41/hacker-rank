<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<?php
   $permissions_file = fopen("permissions.json", "r") or die("file cannot be opened"); 
   $permissions = fread($permissions_file, filesize("permissions.json"));
   $permissions = json_decode($permissions, true); 
   fclose($permissions_file); 

   $csv_file = fopen("permissions.csv", "w"); 
   $header = ["", "view_grades", "change_grades", "add_grades", "delete_grades", "view_classes",
          "change_classes", "add_classes", "delete_classes"]; 
   fputcsv($csv_file, $header);

   $row = $header;
   $arrlength = count($row);

   foreach ($permissions as $name => $permission_list) {
     $row[0] = $name;
     for($i = 1; $i < $arrlength; $i++) {
	   if (in_array($header[$i], $permission_list))
	     {
	 	 $row[$i] = "1"; 
	 	 }
	   else
	 	 {
	     $row[$i] = "0"; 
	 	 }
     }
   	 fputcsv($csv_file, $row);
   }
   fclose($csv_file); 

   echo "permissions.csv file created"; 
?>

</body>
</html>  