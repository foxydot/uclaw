<?php
/**
 * MySQL Table Prefix Changer DXC Version
 * By deuxcode.com
 * Version 10.6.3
 *
 * This is a modified version of R.Dunham's script. Original details below.
 *
 * New in this version:
 *  Possibility to specify current prefix which gives us the power to
 *  delete and rename prefixes in addition to add a new one.
 *
 * This version can be downloaded from
 * http://www.deuxcode.com/downloads/mysql-table-prefix-changer-dxc-version
 *
 * - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

    MySQL Table Prefix Changer
    Copyright © 2008 by Robert Dunham <http://www.nilpo.com>
    Version 1.1
    Original version: <http://www.nilpo.com/pub/examples/prefix.php>
                                  <http://www.nilpo.com/pub/examples/>

    Description:
        This script can be used to change all of the table prefixes
        in a database.  This can be useful as a security precaution
        when using preset table names like with phpBB.  This can help
        prevent sql injections.

    License:
        This program is free software: you can redistribute it and/or modify
        it under the terms of the GNU General Public License as published by
        the Free Software Foundation, either version 3 of the License, Or
        (at your option) any later version. This notice must remain intact.

        This program is distributed in the hope that it will be useful,
        but WITHOUT ANY WARRANTY; without even the implied warranty of
        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
        GNU General Public License for more details.

        You can read the GNU General Public License online at
        <http://www.gnu.org/licenses/>.
 */
?>
<html>
<head>
  <title>MySQL Table Prefix Changer - DXC Version</title>
</head>
<body style="font: 11px Arial">
<h3>MySQL Table Prefix Changer (DXC Version)</h3>
<p>NOTE: This script will modify your database tables, use with care!</p>
<hr />
<form name="form1" method="post" action="<?php print $_SERVER['SCRIPT_NAME']; ?>">
	<table width="500" border="0" cellspacing="2" cellpadding="2">
    <tr>
			<td>Enter server address<span style="color:red">*</span>:</td>
			<td><input name="s" type="text" id="s" size="20" value="localhost"></td>
		</tr>
		<tr valign="top">
			<td>Enter database name:</td>
			<td><input name="d" type="text" id="d" size="20" value=""></td>
		</tr>
		<tr valign="top">
			<td>Enter database user:</td>
			<td><input name="u" type="text" id="u" size="20" value=""></td>
		</tr>
		<tr valign="top">
			<td>Enter database password:</td>
			<td><input name="p" type="password" id="p" size="20"></td>
		</tr>
		<tr valign="top">
			<td>Enter Current Prefix:<br><small>- including underscore<br>- leave empty to add new prefix</small></td>
			<td><input name="c" type="text" id="c" size="20" value=""></td>
		</tr>
		<tr valign="top">
			<td>Enter New Prefix:<br><small>- including underscore<br>- leave empty to delete prefix given above</small></td>
			<td><input name="n" type="text" id="n" size="20" value=""></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input name="action" type="hidden" id="action" value="data">
				<input type="submit" name="Submit" value="Change Table Prefixes"></td>
		</tr>
	</table>
</form>
<hr />
<?php
if ($_POST) {

$mysql_server = $_REQUEST['s'];
$mysql_db     = $_REQUEST['d'];
$mysql_user   = $_REQUEST['u'];
$mysql_pass   = $_REQUEST['p'];
$table_prefix_curr = $_REQUEST['c'];
$table_prefix_new  = $_REQUEST['n'];

// Open MySQL link
$link = mysql_connect($mysql_server, $mysql_user, $mysql_pass);
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
print 'Connected successfully<br><br>';

// Select database and grab table list
mysql_select_db($mysql_db, $link) or die ("Database not found.");
$tables = mysql_list_tables($mysql_db);

// Pull table names into an array and replace prefixes
$i = 0;
while ($i < mysql_num_rows($tables)) {
	$table_name = mysql_tablename($tables, $i);
	$table_array[$i] = $table_name;
	$i++;
}

// Pull table names into another array after replacing prefixes
foreach ($table_array as $key => $value) {
	$table_names[$key] = _switch_prefix($value, $table_prefix_curr, $table_prefix_new);
}

// Write new table names back
foreach ($table_array as $key => $value) {
	$query = sprintf('RENAME TABLE %s TO %s', $table_array[$key], $table_names[$key]);
	$result = mysql_query($query, $link);
	if (!$result) {
		$error = mysql_error();
		print "Could not $query : $error<br>";
	} else {
		$message = sprintf('Successfully renamed <strong>%s</strong> to <strong>%s</strong> in %s', $table_array[$key], $table_names[$key], $mysql_db);
		print "$message<br>";
	}
}
mysql_close($link);
}

/**
 * Returns prefixed string (table name).
 */
function _switch_prefix($table_name, $prefix_curr, $prefix_new) {
  // get assumed current prefix
  $table_curr_prefix = substr($table_name, 0, strlen($prefix_curr));
  // get table name without prefix
  $table_name_clean  = substr($table_name, strlen($prefix_curr), strlen($table_name));
  // simple check if given prefix match actual prefix
  if ($table_curr_prefix == $prefix_curr) {
    // return prefixed table
    return $prefix_new . $table_name_clean;
  }
  else {
    // return current table name
    return $table_name;
  }
}


















?>