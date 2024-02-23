<?php /*Template Name: Teacher Register */
get_header();
?>
<div class="vh-75 gradient-custom">
    <div class="container py-5  h-100">
        <div class="row justify-content-center align-items-center ">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body">
                        <h3 class="mb-4 pb-md-0 mb-md-3"> Teacher Registration Form</h3>
                        <form id="Teacher-register" method="post" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputName">Name</label>
                                    <input type="text" class="form-control" id="inputName" name="name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Email</label>
                                    <input type="email" class="form-control" id="inputEmail4" name="email">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="pwd">Password</label>
                                    <input type="password" id="pwd" name="pwd" class="form-control">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="Teachingexp">Teaching Experience</label>
                                    <select id="Teachingexp" class="form-control" name="teachingExperience">
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
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputLevel">Level</label>
                                    <select id="inputLevel" class="form-control" name="level">
                                        <option selected>Choose level</option>
                                        <option value='Beginner'>Beginner</option>
                                        <option value='Intermediate'>Intermediate</option>
                                        <option value='Advanced'>Advanced</option>
                                        <option value='Native'>Native</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputLanguage">Language</label>
                                    <select id="inputLanguage" class="form-control" name="language">
                                        <option selected>Choose Language</option>
                                        <option value='English'>English</option>
                                        <option value='German'>German</option>
                                        <option value='French'>French</option>
                                        <option value='Mandarin'>Mandarin</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputCountry">Country</label>
                                    <select id="inputCountry" class="form-control" name="country">
                                        <option selected>Choose Country</option>
                                        <option value='India'>India</option>
                                        <option value='USA'>USA</option>
                                        <option value='Germany'>Germany</option>
                                        <option value='Singapore'>Singapore</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-9">
                                <div class="form-group">
                                    <label for="self-description">Self Description</label>
                                    <textarea class="form-control" id="self-description" rows="3" name="selfDescription"></textarea>
                                </div>
                            </div>

                            <div class="form-group right-inner-addon col-md-9" id="count_1">
                                <label for="qualification">Qualification</label>
                                <span class="add input-group-addon"><i class="fa-solid fa-plus"></i></span>
                                <span class="remove input-group-addon-minus"><i class="fa-solid fa-xmark"></i></span>
                                <input type="file" name="qualifications[]" class="form-control images" accept=".jpg, .jpeg, .png, .gif" required />
                            </div>
                            <input type="hidden" name="action" value="CreateTeachers">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer();
?>