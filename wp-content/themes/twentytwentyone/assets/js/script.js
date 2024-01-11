$(document).ready(function () {
 if (typeof is_user_logged_in !== 'undefined' && is_user_logged_in) {
      // Disable a specific element by its ID or class
      $('#payment').prop('disabled', true); // Change 'elementToDisable' to your actual element ID or class
    } else {
      $('#payment').prop('disabled', false);
    }
    $(".dynamicRadio").on('change', function () {
      var priceValue = $(this).data("price"); // Use data() to retrieve 'data-price' value
      var teacherId = $(this).attr("name").split("_").pop(); // Extract the unique identifier from the radio button ID
      $('#hiddenPrice_' + teacherId).val(priceValue); // Set value for the corresponding hidden field
    });
    $("#center").click(function () {
      if ($("input[name='teachers[]']").is(":checked")) {
        alert("Check box in Checked");
        $("#teacherlisting").submit();
      } else {
        alert("Check box is Unchecked");
      }
    });
    $("#purpose").click(function () {
      var selectedOption = $('#inputState').val();
      var checkboxChecked = $("input[name='purpose[]']").is(":checked");

      if (selectedOption && selectedOption !== 'Choose Time Period' && checkboxChecked) {
        alert('Option is selected: ' + selectedOption + ' ' + 'checkbox is checked ');
        $("#onpurpose").submit();
      } else {
        alert('Please select a valid option and check the checkbox!');
      }
    });
    $('#login').submit(function (e) {
      e.preventDefault()
      var email = $('#login_email').val();
      var password = $('#login_password').val();
      console.log(ajax_object.ajax_url);
      $.ajax({
        type: 'POST',
        url: ajax_object.ajax_url,
        data: {
          'action': 'ajax_login',
          'email': email,
          'password': password,
          'security': ajax_object.ajax_nonce,
        },
        success: function (response) {
          $('#registration-message').html(response).fadeIn(1000);
          window.location.reload();
        }
      });
    });
    $('#register').submit(function (e) {
      e.preventDefault()
      var username = $('#username').val();
      var email = $('#email').val();
      var password = $('#password').val();
      var confirm_password = $('#confirm-password').val();
      //  console.log(ajax_object.ajax_url);
      $.ajax({
        type: 'POST',
        url: ajax_object.ajax_url,
        data: {
          'action': 'register_user',
          'username': username,
          'email': email,
          'password': password,
          'confirm_password': confirm_password,
          'security': ajax_object.ajax_nonce,
        },
        success: function (response) {
          $('#registration-message').html(response).fadeIn(1000);
          window.location.reload();
        }
      });
    });
		$("#payment-form").submit(function(event) {
      event.preventDefault(); // Prevent the default form submission
  
      var formData = $(this).serialize();    
      $.ajax({
          type: 'post',
          url: ajax_object.ajax_url, // Use admin-ajax.php as the URL
          data: formData,
          success: function(response) {
         
              $('#response').html(response).fadeOut(1000);
          },
          error: function(error) {
    
              $('#response').html(error).fadeOut(1000);
          }
      });
  });
  
	});



  /**
   * Datepicker code
   */
  jQuery(function () {
    var count;
    setTimeout(() => {
      jQuery("[id^='datepicker_']").each(function (i) {
        jQuery(this).datepicker({
          minDate: 0,
          dateFormat: 'dd-mm-yy',
          onSelect: function (dateText, inst) {
            var array = [];
            $(this).attr('data-date', dateText);
            var displayId = $(this).closest('.container').find('span').attr('id');
            $('#' + displayId).text(dateText);
            jQuery("[id^='datepicker_']").each(function (i) {
              var value = $(this).attr('data-date');
              console.log(value);
              if (value != null) {
                array.push(value);
              }
              $('#selectdate').val(array);
            });

            count = array.length;
          }
        });
      });
    }, 1000);
    /* validation in datepicker */
    $(".nextbtn").click(function () {
      var countradio = 3;
      if (count === 3 && $('input:radio:checked').length == countradio) {
        $("#date_time").submit();
      } else {
        alert("select atleast each and select time also");
      }
    });

    $('input[type="radio"]').change(function () {
      var selectedValue = $(this).val(); // Get the value of the selected radio button
      var displayId = $(this).closest('.Timepicker').find('span').attr('id');
      $('#' + displayId).text(selectedValue);
    });
  });

  /**
   * Search code START
   */
  var level;
  if (document.querySelector('select[name="level-select"]') != null) {
    level = document.querySelector('select[name="level-select"]').value;
  }
  else {
    level = null;
  }
  var country;
  if (document.querySelector('select[name="country-select"]') != null) {
    country = document.querySelector('select[name="country-select"]').value;
  }
  else {
    country = null;
  }
  var language;
  if (document.querySelector('select[name="language-select"]') != null) {
    language = document.querySelector('select[name="language-select"]').value;
  }
  else {
    language = null;
  }
  var searchButton;
  if (document.getElementById("search-button") != null) {
    searchButton = document.getElementById("search-button").value;
  }
  else {
    searchButton = null;
  }


  if (level === "0") {
    document.querySelector("#level_err").innerHTML =
      '<div class="alert alert-warning">Please select at least One option</div>';
    alert("Please select at least One option");
  }

  if (country === "0") {
    document.querySelector("#country_err").innerHTML =
      '<div class="alert alert-warning">Please select at least One option</div>';
    alert("Please select at least One option");
  }

  if (language === "0") {
    document.querySelector("#language_err").innerHTML =
      '<div class="alert alert-warning">Please select at least One option</div>';
    alert("Please select at least One option");
  }
  document.addEventListener("DOMContentLoaded", function () {
    // Get references to the select boxes and search button
    const levelSelect = document.getElementById("level-select");
    const countrySelect = document.getElementById("country-select");
    const languageSelect = document.getElementById("language-select");
    if (searchButton) {
      const searchButton = document.getElementById("search-button");

    }
  });

/**
* Search code END
*/