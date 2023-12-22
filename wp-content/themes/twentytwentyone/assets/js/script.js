
$(document).ready(function () {
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
});

/**
 * Datepicker code
 */
jQuery(function () {
  setTimeout(() => {
    jQuery("[id^='datepicker_']").each(function (i) {
      jQuery(this).datepicker({ minDate: 0 ,dateFormat: 'dd-mm-yy'}); 
      $(this).on("change",function(){
        var selected = $(this).val();
        var displayId = $(this).closest('.container').find('span').attr('id');
        $('#' + displayId).text(selected);
        alert(displayId);
        alert(selected);
    });
    });
  }, 1000);
  //Handle hour selection and display in AM/PM format
  $('input[type="radio"]').change(function() {
    var selectedValue = $(this).val(); // Get the value of the selected radio button
    var displayId = $(this).closest('.Timepicker').find('span').attr('id'); // Find the span ID in the current Timepicker div
    $('#' + displayId).text(selectedValue); // Update the text of the span with the selected value
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

jQuery(document).ready(function ($) {
  // Register AJAX
     $('#register-submit').on('click', function () {
         var data = {
             action: 'ajax_register',
             security: ajax_auth_object.nonce,
             username: $('#register-username').val(),
             email: $('#register-email').val(),
             password: $('#register-password').val(),
         };
 
         $.post(ajax_auth_object.ajaxurl, data, function (response) {
             var result = JSON.parse(response);
             $('#register-message').html(result.message);
 
             if (result.registered) {
                 location.reload();
             }
         });
     });
 });
