<?php
/**
 * Created by PhpStorm.
 * User: toure
 * Date: 13/02/2020
 * Time: 12:12
 */

function autoload( $class, $dir = null ) {
    if ( is_null( $dir ) )
        $dir = './';

    foreach ( scandir( $dir ) as $file ) {

        if ( is_dir( $dir.$file ) && substr( $file, 0, 1 ) !== '.' )
            autoload( $class, $dir.$file.'/' );

        if ( substr( $file, 0, 2 ) !== '._' && preg_match( "/.php$/i" , $file ) ) {
            if ( str_replace( '.php', '', $file ) == $class || str_replace( '.class.php', '', $file ) == $class ) {
                include $dir . $file;
            }
        }
    }

}

spl_autoload_register('autoload');