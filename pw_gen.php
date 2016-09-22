<?php
  $word_source = './ozymandias.txt';
  $default_num_words = 4;
  $default_delim = '-';

  $words = strtolower(file_get_contents($word_source)); # Lowercase str
  $words = preg_replace('/[^\w\s]/', '', $words);       # No punctuation
  $words = preg_split('/\s+/', $words);                 # Make it an array
  $words = array_unique($words);                        # No duplicates

  function error_message($message) {
    return '<div class="error">' . $message . '</div>';
  }

  function pw_gen($num_words, $delim, $words) {
    #bad input
    if ( is_numeric($num_words) == False ) {
      return error_message('It\'s gotta be a number, silly!');
    }
    if ($num_words > 9 or $num_words == 0) {
      return error_message('Password must be between 1 and 9 words in length!');
    }

    if ($num_words == 1){
      return $words[array_rand($words)];
    }

    foreach ( array_rand( $words, $num_words ) as $key ) {
      $selections[] = $words[$key];
    }
    $pw = implode($delim, $selections);
    return $pw;
  }
?>
