<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Password Generator</title>
    <link rel='stylesheet' type='text/css' href='css/style.css' />
  </head>
  <body>
    <?php
      error_reporting(E_ALL);       # Report Errors, Warnings, and Notices
      ini_set('display_errors', 1); # Display errors on page (instead of a log file)
    ?>
    <?php require 'pw_gen.php'; ?>

    <pre class="password">
      <?php
        if ( isset($_POST['num_words']) ) {
          echo pw_gen($_POST['num_words'], $_POST['delim'], $words);
        }
        else {
          echo pw_gen($default_num_words, $default_delim, $words);
        }
      ?>
    </pre>
    <form method="POST" action="index.php" >
      <strong>Number of Words (1-9):</strong>
      <br />
      <input type="text" name="num_words" size="1" maxlength="1">
      <br />
      <strong>Separate Words By:</strong>
      <br />
      <input type="radio" name="delim" value="-" checked="checked">hyphen (-)
      <input type="radio" name="delim" value="_">underscore (_)
      <input type="radio" name="delim" value=".">period (.)
      <br />
      <input type="submit" value="generate password">
  </form>
  </body>
</html>
