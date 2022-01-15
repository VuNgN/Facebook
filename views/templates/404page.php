<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="icon" href="../../assets/images/Facebook_logo/Facebook_logo.ico" type="image/x-icon"/>
    <title>Facebook</title>
    <link
      rel="stylesheet"
      href="../../assets/css/templates/404page.css"
      type="text/css"
      media="all"
    />
    
  </head>
  <body>
    <div>
      <aside>
        <img
          src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/4424790/Mirror.png"
          alt="404 Image"
        />
      </aside>
      <main>
        <h1>Sorry!</h1>
<?php
echo "<p>".$_GET['error']."
                <em>. . . hãy kiểm tra lại.</em>
      </p>";
?>  
        <a href="../../index.php"><button>You can go back now!</button></a>
      </main>
    </div>
  </body>
</html>
