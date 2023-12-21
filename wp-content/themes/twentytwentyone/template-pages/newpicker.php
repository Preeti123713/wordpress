<?php
get_header();
$teachers = $_GET['teachers'];
$count = count($teachers);
?>
<?php for ($i = 0; $i < $count; $i++) { ?>
  <form method="GET" action="<?php echo get_permalink(48) ?>">
    <input type="hidden" name="selectdate" id="selectdate_<?php echo $i; ?>" value="">
    <input type="hidden" name="selecttime" id="selecttime_<?php echo $i; ?>" value="">
    <?php foreach ($teachers as $value) { ?>
      <input type="hidden" name="teachers[]" value="<?php echo $value ?>">
    <?php } ?>
    <div class="container" id="datepicker">
      <label for="date_<?php echo $i; ?>">Select a date:</label>
      <div class="calendar-container">
        <div id="datepicker_<?php echo $i; ?>"></div>
        <div class="time">
        <div id="clock_<?php echo $i; ?>">12:00 AM</div>
        <label for="hour_<?php echo $i; ?>">Select an hour:</label>
        <br>
        <div class="clocked">
        <fieldset id="hour_1">
            <input type="radio" name="hour_1" value="9" checked>9 AM
            <input type="radio" name="hour_1" value="10">10 AM
            <input type="radio" name="hour_1" value="11">11 AM
            <input type="radio" name="hour_1" value="12">12 AM
        </fieldset>
        <fieldset id="hour_2">
            <input type="radio" name="hour_1" value="1">1 PM
            <input type="radio" name="hour_1" value="2">2 PM
            <input type="radio" name="hour_1" value="3">3 PM
            <input type="radio" name="hour_1" value="4">4 PM
        </fieldset>
        <fieldset id="hour_3">
            <input type="radio" name="hour_1" value="5">5 PM
            <input type="radio" name="hour_1" value="6">6 PM
            <input type="radio" nPMe="hour_1" value="7">7 PM
            <input type="radio" nPMe="hour_1" value="8">8 PM
        </fieldset>
        <fieldset id="hour_4">
            <input type="radio" name="hour_1" value="5">9 PM
            <input type="radio" name="hour_1" value="6">10 PM
        </fieldset>
        </div>
      </div>
      </div>
    </div>
  </form>
  <?php  } ?>
  <div id="wrapper">
  <button type="submit" class="btn btn-success gradient-custom-4">Next</button>
  </div>
<?php get_footer(); ?>