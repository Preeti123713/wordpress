<?php
/*
Template name: Home
*/
get_header();
?>
<section class="vh-100">
  <div class="container-fluid home-custom">
    <div class="row d-flex justify-content-center align-items-center h-100" id="custom-form">
      <div class="col-md-9 col-lg-6">
        <img src="https://cdn.pixabay.com/photo/2022/04/03/18/28/webcam-7109621_1280.png" class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6">
        <form class="home-form d-flex" method='get' action='<?php echo get_permalink(67); ?>'>

          <!-- Select Box 1 -->
          <div class="form-group">
            <select id='level-select' name="level-select" class="form-control" placeholder='select a Level...'>
              <option value=''>Select a Level...</option>
              <option value='Beginner'>Beginner</option>
              <option value='Intermediate'>Intermediate</option>
              <option value='Advanced'>Advanced</option>
              <option value='Native'>Native</option>
            </select> 
            <span class="error" id="level_err"></span>
          </div>

          <!-- Select Box 2 -->
          <div class="form-group ml-2">
            <select id='country-select' name="country-select" class="form-control" placeholder='select a country...'>
              <option value=''>Select a country...</option>
              <option value='India'>India</option>
              <option value='USA'>USA</option>
              <option value='Germany'>Germany</option>
              <option value='Singapore'>Singapore</option>
            </select>
            <span class="error" id="country_err"></span>
          </div>

          <!-- Select Box 3 -->
          <div class="form-group ml-2">
            <select id='language-select' name="language-select" class="form-control" placeholder='select a language...'>
              <option value=''>Select a language...</option>
              <option value='English'>English</option>
              <option value='German'>German</option>
              <option value='French'>French</option>
              <option value='Mandarin'>Mandarin</option>
            </select>
            <span class="error" id="language_err"></span>
          </div>

          <!-- Search Button -->
          <button class="btn btn-primary ml-2" id='search-button' type='submit'>Search</button>
          
        </form>
        <div id='search-results'>
          <!-- Display search results here -->
        </div>
      </div>
    </div>
  </div>
</section>
<?php get_footer();
?>