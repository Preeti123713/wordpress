<?php
get_header();
$teachers = $_GET['teachers'];
$count = count($teachers);


?>
<form id ="date_time" method="GET" action="<?php echo get_permalink(48) ?>">
    
<input type="hidden" name="selectdate" id="selectdate" >
<!-- <input type="hidden" name="selecttime" id="selecttime_" value=""> -->
    
    <?php
      foreach ($teachers as $value) { ?>
        <input type="hidden" name="teachers[]" value="<?php echo $value ?>">
      <?php } 
    for ($i = 0; $i < $count; $i++) {
   ?>
    <div class="container" id="datepicker">
      <label for="date_<?php echo $i; ?>">Select a date: <span id="Displaydate_<?php echo $i; ?>"></span></label>
      <div class="calendar-container">
        <div id="datepicker_<?php echo $i; ?>" required></div>
        <div class="Timepicker" id="selectedTime_<?php echo $i; ?>">
          Selected Time: <span id="displayTime_<?php echo $i; ?>"></span>
          <div class="clocked">
            <?php
            $hours = [
              ["9 AM", "10 AM", "11 AM", "12 PM"],
              ["1 PM", "2 PM", "3 PM", "4 PM"],
              ["5 PM", "6 PM", "7 PM", "8 PM"],
              ["9 PM", "10 PM"]
            ];
            for ($j = 0; $j < count($hours); $j++) {
              echo '<fieldset id="hour_' . ($j + 1) . '_' . $i . '">';
              foreach ($hours[$j] as $hour) {
                echo '<input type="radio" name="time_'.$i.'"  value="' . $hour . '"';
                // if ($hour === "9 AM") {
                //   // echo ' checked';
                // }
                echo '> ' . $hour . ' ';
              }
              echo '</fieldset>';
            }
            ?>
          </div>
        </div>
      </div>
    </div>
    <?php
} ?>
    <div id="wrapper">
      <a href="javascript:void(0);"  class="btn btn-success gradient-custom-4 nextbtn">Next</a>
    </div>
  </form>

<?php get_footer();
?>
