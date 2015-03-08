# php-debugger


This is a basic debugger class

function: write debug info to a file specified by a file name.
          in a specified relative directory.
          will write time stamp on start en end, and adds newline
    use:  require_once( 'debugger.php' );
          $debugger = new debugger( $fileName );    
          $debugger->debug( type, 'subject:' . $subject ); 
          //type = [ 'message', 'warning', 'error' ]  


