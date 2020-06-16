<html>
<?php
    session_start();
    ?>
<head>
    <meta charset="utf-8">
    <!-- importer le fichier de style -->
    <link rel="stylesheet" href="style2.css" media="screen" type="text/css" />
    <title>Web Project - Contact</title>
</head>

<body class="contactbody">

    <div><a class="button" href="News.php"> Back to home</a></div>

    <div id="container">


        <form method="POST">
            <h1>Contact Us!</h1>

            <h2><?php echo $_SESSION["username"] ?></h2> </br>
            

            <label><b>Subject</b></label>
            <input type="text" placeholder="Enter the subject of the mail" name="objet" required>

            <label><b>Your message</b></label>
            <textarea type="test" placeholder="Enter your message" name="message" required></textarea>

            <input type="submit" id='submit' name="button" value='SEND MESSAGE'>
            <?php
               $to="billy.bly.billy@gmail.com";
               $object=$_POST["objet"];
               $message=$_POST["message"];
               if(!$_POST["button"]){
                mail($to,$objet,$message);
            }
         
           

            ?>


        </form>


    </div>

</body>

</html>