<html>
    <head><title>Sample</title>
        <link rel="stylesheet" href="http://www.blackpepper.co.nz/test-stylesheet/1463372307"/>
    </head>

    <body>

<!--
_
\`*-.
 )  _`-.
.  : `. .
: _   '  \
; *` _.   `*-._
`-.-'          `-.
  ;       `       `.
  :.       .        \
  . \  .   :   .-'   .
  '  `+.;  ;  '      :
  :  '  |    ;       ;-.
  ; '   : :`-:     _.`* ;
*' /  .*' ; .*`- +'  `*'
*-*   `*-*  `*-*'


-->

        <header>
            <a href="http://www.blackpepper.co.nz/"><img src="http://www.blackpepper.co.nz/images/logo1.png"></a>
        </header>
        <main>

<?php
    require_once 'src/ListOfCustomers.php';

    $listOfCustomers = new ListOfCustomers();
    $listOfCustomers->echoList();
?>
        </main>
    </body>
</html>