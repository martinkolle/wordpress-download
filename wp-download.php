<?php 
/**
 * Copy latest wordpress version to server and unzip.
 * @author Martin Kollerup
 * @license GNU/GPL v.3 - http://www.gnu.org/licenses/gpl-3.0.en.html
 */
 
//Wordpress latest source
$remote_file_url = 'https://wordpress.org/latest.zip';
 
//Local filename
$local_file = 'wordpress-latest.zip';
 
//Copy wordpress
$copy = copy( $remote_file_url, $local_file );
 
//Check succes or failure
if( !$copy ) {
    echo "Failed to copy $file...\n";
}
else{
    echo "Success to copy $file...\n";

    //unzip wordpress files. 
    $zip = new ZipArchive;
    $res = $zip->open($local_file);
    if ($res === TRUE) {
        $zip->extractTo(realpath(dirname(__FILE__)).'/');
        $zip->close();
        echo 'woot! ZIP SUCESS - WP READY';
    } else {
        echo 'doh! UNZIP FAILED';
    }
}