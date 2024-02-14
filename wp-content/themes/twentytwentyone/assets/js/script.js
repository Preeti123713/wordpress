$(document).ready(function () {
  $('.edit').click(function () {
    // Get the value of the hidden input field inside the previous-image div
    var imageId = $("#imageid").val();
    // Find the div with the class previous-image containing the input field with the specified ID
    var previousImageDiv = $('[value="' + imageId + '"]').closest('.previous-image');
    //ajax call 
    $.ajax({
      type: 'post',
      url: ajax_object.ajax_url,
      data: {
        'image_id': imageId,
        'action': 'proremoveImages'
      },
      success: function (response) {
        alert(response);
        // Remove the div with the class previous-image
        previousImageDiv.remove();
      },
      error: function (response) {
        alert(response);
      }
    })
  });

  $('#user-img').on('change', function () {
    $('#image-preview').css('display', 'block');
    previewImage(this);
  });

  function previewImage(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('#image-preview').html('<img src="' + e.target.result + '" style="max-width:100%; max-height:100%;" />');
      }
      reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
  }
  $('#update').submit(function (event) {
    // Prevent default form submission
    event.preventDefault();
    alert(ajax_object.ajax_url);
    // Show an alert after form submission
    var formData = new FormData($("#update")[0]);
    $.ajax({
      type: 'post',
      url: ajax_object.ajax_url,
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success: function (response) {
        alert(response);
        // Reload the page
        location.reload();
        if ($('#user-img')[0].files.length === 0) {
          $('.previous-image').remove();
        }
      },
      error: function (xhr, status, error) { // Modified error function parameters to handle proper error response
        var errorMessage = xhr.status + ': ' + xhr.statusText;
        alert('Error - ' + errorMessage);
      }
    });
  });

  $("#forgetpassword").submit(function (event) {
    event.preventDefault();
    var Form = $(this);
    console.log(Form);
    $.ajax({
      url: ajax_object.ajax_url,
      type: 'POST',
      data: Form.serialize(),
      success: function (response) {
        alert(response);
      },
      error: function (response) {
        alert(response);
      }
    })
  });

  // remove images
  $(".remove").click(function () {
    alert("remove");
    var card = $(this).closest('.card');
    var current_imageid = $(this).closest('.card').find(".card-img-top").data("id");

    // Send AJAX request to the server
    $.ajax({
      url: ajax_object.ajax_url,
      type: 'POST',
      data: {
        'image_id': current_imageid,
        'action': 'removeImages'
      },
      success: function (response) {
        console.log(response);
        card.remove();

      },
      error: function (response) {
        alert(response);
      }
    });
  });

  $("#Teacher-update").submit(function (event) {
    event.preventDefault();
    var formData = new FormData($("#Teacher-update")[0]);
    $.ajax({
      type: 'post',
      url: ajax_object.ajax_url,
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success: function (response) {
      alert(response);
      // location.reload();     
     },
      error: function (xhr, status, error) { // Modified error function parameters to handle proper error response
        var errorMessage = xhr.status + ': ' + xhr.statusText;
        alert('Error - ' + errorMessage);
      }
    });
  });

  // Now you can do something with the newImages array
  $('#ajax-login-form').submit(function (event) {
    event.preventDefault();
    var Form = $(this);
    $.ajax({
      type: 'post',
      url: ajax_object.ajax_url,
      data: Form.serialize(),
      dataType: 'json',
      success: function (data) {
        if (data.status) {
          alert(data.message);
          $(Form).trigger("reset");
        } else {
          alert(data.message);
        }

        setTimeout(() => {
          window.location.href = data.url;
        }, 1000);
      },
      error: function (error) {
        alert(error);
      }
    });
  });
  // Check total number elements
  $(".add").click(function () {
    var totalElements = $(".right-inner-addon").length;
    var lastId = $(".right-inner-addon:last").attr("id");
    var splitId = lastId ? lastId.split("_") : [0];
    var nextIndex = Number(splitId[1]) + 1;
    var maxElements = 5;

    if (totalElements < maxElements) {
      // Append a new div container after the last occurrence of an element with class "right-inner-addon"
      $(".right-inner-addon:last").after("<div class='form-group right-inner-addon col-md-9' id='count_" + nextIndex + "'>");

      // Add elements to the newly created div
      $("#count_" + nextIndex).append("<label for='qualification_" + nextIndex + "'>Qualification</label>");
      $("#count_" + nextIndex).append("<span class='remove input-group-addon-minus' id='remove_" + nextIndex + "'><i class='fa-solid fa-xmark'></i></span>");
      $("#count_" + nextIndex).append("<input required name='qualifications[]' type='file' class='form-control' id='qualification_" + nextIndex + "' />");
      // Change the display property of the "minus" icon to block
      $("#remove_" + nextIndex).css("display", "block");
    }
    // Remove element
    $('.right-inner-addon').on('click', '.remove', function () {
      var id = this.id;
      var splitId = id.split("_");
      var deleteIndex = splitId[1];
      // Remove <div> with id
      $("#count_" + deleteIndex).remove();
    });
  });
  $("#Teacher-register").submit(function (event) {
    event.preventDefault();
    var formData = new FormData($("#Teacher-register")[0]); //  here we create formdata object  to give whole form data including images
    // var formData = $(this).serialize();
    $.ajax({
      type: 'post',
      url: ajax_object.ajax_url,
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success: function (response) {
        alert(response);
        $("#Teacher-register").trigger("reset");
      },
      error: function (error) {
        alert(error);
      }
    });
  });
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
      },
      error: function (response) {
        $('#registration-message').html(response).fadeIn(1000);
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
        $('#registration-message').html(response).fadeIn(5000);
        window.location.reload();
      }
    });
  });
  $("#payment-form").submit(function (event) {
    event.preventDefault(); // Prevent the default form submission
    var formData = $(this).serialize();
    $.ajax({
      type: 'post',
      url: ajax_object.ajax_url, // Use admin-ajax.php as the URL
      data: formData,
      success: function (response) {
        // console.log(response);
        $('#response').html(response).fadeOut(5000);
        window.location.href = "http://localhost/wordpress/thank-you/";
      },
      error: function (error) {
        // console.log(error);
        $('#response').html(error).fadeOut(5000);
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
    if (count >= 1 && $('input:radio:checked').length >= 1) {
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