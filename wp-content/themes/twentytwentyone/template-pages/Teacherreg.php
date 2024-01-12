<?php /*Template Name: Teacher Register */
get_header();
?>
<div class="vh-100 gradient-custom">
    <div class="container py-5  h-100">
        <div class="row justify-content-center align-items-center ">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5"> Teacher Registration Form</h3>
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputName">Name</label>
                                    <input type="text" class="form-control" id="inputName">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Email</label>
                                    <input type="email" class="form-control" id="inputEmail4">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputLevel">Level</label>
                                    <select id="inputLevel" class="form-control">
                                        <option selected>Choose level</option>
                                        <option value='Beginner'>Beginner</option>
                                        <option value='Intermediate'>Intermediate</option>
                                        <option value='Advanced'>Advanced</option>
                                        <option value='Native'>Native</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputLanguage">Language</label>
                                    <select id="inputLanguage" class="form-control">
                                        <option selected>Choose Language</option>
                                        <option value='English'>English</option>
                                        <option value='German'>German</option>
                                        <option value='French'>French</option>
                                        <option value='Mandarin'>Mandarin</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputCountry">Country</label>
                                    <select id="inputCountry" class="form-control">
                                        <option selected>Choose Country</option>
                                        <option value='India'>India</option>
                                        <option value='USA'>USA</option>
                                        <option value='Germany'>Germany</option>
                                        <option value='Singapore'>Singapore</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputPhone">Phone No.</label>
                                    <input type="text" class="form-control" id="inputPhone" placeholder="8933453434" maxlength="10">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="Teachingexp">Teaching Experience</label>
                                    <select id="Teachingexp" class="form-control">
                                        <option value="None">None</option>
                                        <option value="Less than a year">Less than a year</option>
                                        <option value="1 - 2 years">1 - 2 years</option>
                                        <option value="2 - 4 years">2 - 4 years</option>
                                        <option value="4 - 7 years">4 - 7 years</option>
                                        <option value="7 - 10 years">7 - 10 years</option>
                                        <option value="10+ years">10+ years</option>
                                    </select>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group right-inner-addon col-md-9" id="count_1">
                                <label for="qualification">Qualification</label>
                                <span class="add input-group-addon"><i class="fa-solid fa-plus"></i></span>
                                <span class="remove input-group-addon-minus"><i class="fa-solid fa-xmark"></i></span>
                                <input required name="qualification" type="file" class="form-control" id="qualification_1" />
                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                    <label class="form-check-label" for="gridCheck">
                                        Check me out
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Sign in</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?php get_footer();
?>