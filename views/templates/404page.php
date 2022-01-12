<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title></title>
    <link
      rel="stylesheet"
      href="../../assets/css/404page.css"
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
        <a href="/facebook/login.php"><button>You can go back now!</button></a>
      </main>
    </div>
  </body>
</html>
