
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
      alert('Option is selected: ' + selectedOption  + ' ' + 'checkbox is checked ');
      $("#onpurpose").submit();
    } else {
      alert('Please select a valid option and check the checkbox!');
    }
  });
});

/**
 * Datepicker code
 */
jQuery(function() {
  setTimeout(() => {
    jQuery("[id^='datepicker_']").each(function(i) {
      jQuery(this).datepicker({ minDate: 0 }); // Apply datepicker to each element
    });
  }, 1000);
//Handle hour selection and display in AM/PM format
  $('input[name=hour_0]').change(function(){
    var value = $('input[name=hour_0]:checked').val();
    
    // Adjusting hours and displaying in AM/PM format
    var hour = parseInt(value.substring(0, 2));
    var ampm = (hour >= 12) ? 'PM' : 'AM';
    hour = (hour % 12) || 12; // Convert to 12-hour format
    var formattedHour = ("0" + hour).slice(-2); // Zero-padding for single-digit hours
    
    $("#clock_0").html(formattedHour + ':00 ' + ampm); // Display formatted hour
  }); 
});




/**
 * Search code START
 */

var level;
  if (document.querySelector('select[name="level-select"]')!= null) {
  level = document.querySelector('select[name="level-select"]').value;
}
else {
    level = null;
}
  var country;
  if (document.querySelector('select[name="country-select"]')!= null) {
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
