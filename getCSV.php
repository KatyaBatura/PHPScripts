<?php 
  
// Initialize a file URL to the variable 
$url = 'https://data.ontario.ca/dataset/.......csv'; 
  
// Initialize the cURL session 
$ch = curl_init($url); 
  
// Inintialize directory name where 
// file will be save 
$dir = './'; 
  
// Use basename() function to return 
// the base name of file  
$file_name = basename($url); 
  
// Save file into file location 
$save_file_loc = $dir . $file_name; 
  
// Open file  
$fp = fopen($save_file_loc, 'wb'); 
  
// It set an option for a cURL transfer 
curl_setopt($ch, CURLOPT_FILE, $fp); 
curl_setopt($ch, CURLOPT_HEADER, 0); 
  
// Perform a cURL session 
curl_exec($ch); 
  
// Closes a cURL session and frees all resources 
curl_close($ch); 
 
// Close file 
fclose($fp); 

$db = mysqli_connect("localhost", "", "password", "");

    if ($db->connect_errno) {
      echo "Failed to connect to MySQL: " . $db->connect_error;
      exit();
    }

    if(($handle     =   fopen("data.csv", "r")) !== FALSE){
        while(($row =   fgetcsv($handle)) !== FALSE){
            $db->query('INSERT INTO `table`(`COL1`, `COL2`, `COL3`, `COL4`, `COL5`, `COL6`) VALUES ("'.$row[0].'","'.$row[1].'","'.$row[2].'","'.$row[3].'","'.$row[4].'","'.$row[5].'")');
        }    
    }
 fclose($handle);
  
?> 