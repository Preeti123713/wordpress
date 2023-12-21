<?php
/*
Template name: Home
*/
get_header();
?>
<div class='img'></div>
<div class='center'>
  <div class='search-block'>
    <form role='search' method='get' action='<?php echo get_permalink(67); ?>'>
      <!-- <form role = 'search' method = 'get' id = 'search-form'> -->
      <!-- <input type = 'hidden' name = 'path' id = 'path' value = 'http://localhost/wordpress/wp-content/themes/Teaching/search.php'> -->
      <select id='level-select' name="level-select" placeholder='select a Level...'>
        <option value=''>Select a Level...</option>
        <option value='Beginner'>Beginner</option>
        <option value='Intermediate'>Intermediate</option>
        <option value='Advanced'>Advanced</option>
        <option value='Native'>Native</option>
      </select>
      <span class="error" id="level_err"></span>
      <select id='country-select' name="country-select" placeholder='select a country...'>
        <option value=''>Select a country...</option>
        <option value='India'>India</option>
        <option value='USA'>USA</option>
        <option value='Germany'>Germany</option>
        <option value='Singapore'>Singapore</option>
      </select>
      <span class="error" id="country_err"></span>
      <select id='language-select' name="language-select" placeholder='select a language...'>
        <option value=''>Select a language...</option>
        <option value='English'>English</option>
        <option value='German'>German</option>
        <option value='French'>French</option>
        <option value='Mandarin'>Mandarin</option>
      </select>
      <span class="error" id="language_err"></span>
      <button id='search-button' type='submit'>Search</button>
    </form>
    <div id='search-results'>
      <!-- Display search results here -->
    </div>
  </div>
</div>
<?php
get_footer();
?>