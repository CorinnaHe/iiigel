 <?php 

	$db_connection = mysqli_connect('localhost', 'root', '', 'iiigel');
	
	if(!$db_connection){
		echo('Keine Verbindung mit der Datenbank möglich');
	}
 /*error_reporting( E_DEPRECATED & E_NOTICE );
 
	define('DBHOST', 'localhost');
	define('DBUSER', 'root');
	define('DBPASS', '');
	define('DBNAME', 'iiigel');
	 
	$conn = mysql_connect(DBHOST,DBUSER,DBPASS);
	$dbcon = mysql_select_db(DBNAME);
 
	if ( !$conn ) {
	  die("Connection failed : " . mysql_error());
	}
	 
	if ( !$dbcon ) {
	  die("Database Connection failed : " . mysql_error());
	}*/
 ?>