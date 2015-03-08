<?php
/*
* Author: Pleisterman
* Info: 
* Web: www.pleisterman.nl 
* Mail: info@pleisterman.nl 
* GitHub: Pleisterman 
* 
* NOTICE OF LICENSE
*
* Copyright (C) 2014  Pleisterman
* 
*    This program is free software: you can redistribute it and/or modify
*    it under the terms of the GNU General Public License as published by
*    the Free Software Foundation, either version 3 of the License, or
*    (at your option) any later version.
* 
*    This program is distributed in the hope that it will be useful,
*    but WITHOUT ANY WARRANTY; without even the implied warranty of
*    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*    GNU General Public License for more details.
*
*    You should have received a copy of the GNU General Public License
*    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*
*      file:     debugger.php
*      class:    debugger
*      function: write debug info to a file specified by a file name.
*                in a specified relative directory.
*                will write time stamp on start en end, and adds newline
*      use:      require_once( 'debugger.php' );
*                $debugger = new debugger( $fileName );    
*                $debugger->debug( type, 'subject:' . $subject ); 
*                *type = [ 'message', 'warning', 'error' ]  
*/

class debugger
{
    private $dir = '/../../debug/';
    private $f;
    private $errors = true;
    private $warnings = true;
    private $messages = true;
   function __construct($str)
   {
       $this->dir = dirname( __FILE__ ) . $this->dir;
       $this->f = fopen( $this->dir . $str . ".txt", "wb");
       fwrite( $this->f, "program started at" . date("H:i:s:u", time()) . "\r\n" );
   }
   function __destruct( )
   {
       fwrite( $this->f, "program ended at " . date("H:i:s:u", time()) . "\r\n" );
       fclose( $this->f );
    }
   function set_timestamp( $type )
   {
        if( $type == "error" && $this->errors )
        {
            fwrite( $this->f, "time: " . date("H:i:s", time()) . "\r\n" );
        }
        if( $type == "warning" && $this->warnings )
        {
            fwrite( $this->f, "time: " . date("H:i:s", time()) . "\r\n" );
        }
        if( $type == "message" && $this->messages )
        {
            fwrite( $this->f, "time: " . date("H:i:s", time()) . "\r\n" );
        }
   }
   function debug( $type, $message )
   {
      if( $type == "error" && $this->errors )
      {
         fwrite( $this->f, " error: " . $message  .  "\r\n" );
      }
      if( $type == "warning" && $this->warnings )
      {
         fwrite( $this->f, " warning: " . $message  .  "\r\n" );
      }
      if( $type == "message" && $this->messages )
      {
         fwrite( $this->f, " message: " . $message .  "\r\n"  );
      }
   }
   function debugfileline( $file, $line )
   {
      fwrite( $this->f, " in file: " . basename($file) . " line: ". $line .  "\r\n" );
   }
}

?>