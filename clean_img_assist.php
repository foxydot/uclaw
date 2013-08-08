<?php
/*
 * A useful troubleshooting function. Displays arrays in an easy to follow format in a textarea.
*/
if ( ! function_exists( 'ts_data' ) ) :
function ts_data($data){
	$ret = '<textarea class="troubleshoot" cols="100" rows="20">';
	$ret .= print_r($data,true);
	$ret .= '</textarea>';
	print $ret;
}
endif;
/*
 * A useful troubleshooting function. Dumps variable info in an easy to follow format in a textarea.
*/
if ( ! function_exists( 'ts_var' ) && function_exists( 'ts_data' ) ) :
function ts_var($var){
	ts_data(var_export( $var , true ));
}
endif;

$prefix = '';
/*$server = "localhost";
$login = "msdlabth_uclawd7";
$password = "(i9f@yco]=fk";
$database = "msdlabth_uclawd7";
*/
$server = "localhost";
$login = "rps_uclawd7";
$password = "rps_uclawd7";
$database = "rps_uclawd627_img_assist_test";

///////////////////////////////////////////////////////////////////////////////////////////////////
echo $database.'<br>';
$link = mysql_connect($server, $login, $password) or die("Connect error : " . mysql_error());
echo "Connect OK</br><br>\n";

$db_selected = mysql_select_db($database, $link);
if (!$db_selected)
	die ('Select DB error : ' . mysql_error());

$query = "SELECT * FROM " . $prefix . "field_data_body WHERE body_value like '%[img_assist%'";
$result = mysql_query($query);

if (!$result) {
	$message  = 'Query error : ' . mysql_error() . "<br>\n";
	$message .= 'Query : ' . $query;
	die($message);
}

//ts_data($query);

$count=0;
while ($row = mysql_fetch_assoc($result))
{
	//if($count>10){die();}
	$tmp = $row['body_value'];
	$count++;
	//echo "</br><br>\n###############################################################################</br><br>\n";
	//echo "Entity ID: ".$row['entity_id'];
	//echo $tmp;
	//echo "<br>\n###############################################################################<br>\n";

	$start = strpos($tmp, "[img_assist");

	while (($start = strpos($tmp, "[img_assist")) !== FALSE) // Added parentheses here since operator precedence was incorrect.
	{
		$end = strpos($tmp, "]", $start);
		$img = substr($tmp, $start+12, $end-$start-12);

		echo "Img: $img <br>\n";

		$myimg = explode("|", $img);
		foreach($myimg AS $i){
			$set = explode("=",$i);
			${trim($set[0])} = trim($set[1]);
		}
		
		//echo "NID: $nid <br>\n";

		$query_image = "SELECT * FROM " . $prefix . "image WHERE nid=".$nid ;
		$result_image = mysql_query($query_image);
		
		//ts_data($query_image);
		
		$row_image = mysql_fetch_assoc($result_image);
		$fid = $row_image['fid'];

		//echo "FID: $fid <br>\n";

		$query_file = "SELECT * FROM " . $prefix . "files WHERE fid=".$fid;
		$result_file = mysql_query($query_file);
		//ts_data($query_file);

		$row_file = mysql_fetch_assoc($result_file);
				$img_path = $row_file['filepath'];

				if ($img_path[0] != '/')
					$img_path = '/' . $img_path;

				//echo "Src: $img_path <br>\n";

				$buffer = substr($tmp, 0, $start);

				$buffer .= "<img alt=\"$desc\" src=\"$img_path\" width=\"$width\" height=\"$height\" class=\"inline inline-$align\" />"; // Not a critical change, but now specifies width and height in the image's attribute tags. Also preserves the alignment of the image if the user specified an alignment through image assist.

				$buffer .= substr($tmp, $end+1);

				//echo "Buffer: <br>\n";
				//ts_data($buffer);
				//echo '<br>';

				$tmp = $buffer;

				mysql_free_result($result_image);
				//break; // Test
	} // End : while ($start = strpos($tmp, "[img_assist"))

	$update_query .= "UPDATE " . $prefix . "field_data_body SET body_value = '".addslashes($tmp)."' WHERE entity_id = ".$row['entity_id'].';'."\n";
	/*$res = mysql_query($update_query);

	if (!$res) {
	$message  = 'Query error : ' . mysql_error() . "<br>\n";
	$message .= 'Query : ' . $update_query;
			die($message);
    }*/

    //break; // Test
}// End : while ($row = mysql_fetch_assoc($result))
ts_data($update_query);
mysql_free_result($result);

mysql_close($link);
			echo "<br>\nEnd ($count entities modified)<br>\n<br>\n";
			?>
