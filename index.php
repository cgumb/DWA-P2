<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Password Generator</title>
  </head>
  <body>
    <?php
      error_reporting(E_ALL);       # Report Errors, Warnings, and Notices
      ini_set('display_errors', 1); # Display errors on page (instead of a log file)
    ?>
    <?php
      $word_source = './ozymandias.txt';
      $default_num_words = 4;

      $words = strtolower(file_get_contents($word_source)); # Lowercase str
      $words = preg_replace('/[^\w\s]/', '', $words);       # No punctuation
      $words = preg_split('/\s+/', $words);                 # Make it an array
      $words = array_unique($words);                        # No duplicates
      

      function pw_gen($num_words, $words) {
        #bad input
        if ( is_numeric($num_words) == False ) {
          return 'It\'s gotta be a number, silly!';
        }
        if ($num_words > 9 or $num_words == 0) {
          return 'Your password must be between 1 and 9 words in length!';
        }

        if ($num_words == 1){
          return $words[array_rand($words)];
        }

        foreach ( array_rand( $words, $num_words ) as $key ) {
          $selections[] = $words[$key];
        }
        $pw = implode('-', $selections);
        return $pw;
      }
    ?>
    <pre>
      <?php
        if ( isset($_POST['num_words']) ) {
          echo pw_gen($_POST['num_words'], $words);
        }
        else {
          echo pw_gen($default_num_words, $words);
        }
      ?>
    </pre>
    <form method="POST" action="index.php" >
      Number of Words:
      <input type="text" name="num_words">
      <input type="submit" value="generate">
  </form>
  </body>
</html>
