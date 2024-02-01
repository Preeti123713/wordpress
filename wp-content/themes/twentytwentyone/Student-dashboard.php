<?php
/* Template Name: Student-dashboard */
get_header('student');
?>
<div class="container-student">
            <h1 class="main--title"> Today`s Data</h1>
            <div class="module--wrapper">
                <div class="payment--card light-red">
                    <div class="payment--header">
                        <div class="amount">
                            <span class="title">
                                Payment Amount
                            </span>
                            <span class="amount--value">$500.00</span>
                        </div>
                        <i class="fa-solid fa-dollar-sign icon"></i>
                    </div>
                    <span class="payment-card-details">************2345</span>
                </div>
                <div class="payment--card light-purple">
                    <div class="payment--header">  
                        <div class="amount">
                            <span class="title">
                                Payment 
                            </span>
                            <span class="amount--value">$20.00</span>
                        </div>
                        <i class="fa-solid fa-list dark-purple icon"></i>
                    </div>
                    <span class="payment-card-details">************4242</span>
                </div>
                <div class="payment--card light-green">
                    <div class="payment--header">  
                        <div class="amount">
                            <span class="title">
                                Payment Customer
                            </span>
                            <span class="amount--value">$350.00</span>
                        </div>
                        <i class="fa-solid fa-users dark-green icon"></i>
                    </div>
                    <span class="payment-card-details">************4347</span>
                </div>
                <div class="payment--card light-blue">
                    <div class="payment--header">  
                        <div class="amount">
                            <span class="title">
                                Payment Processed
                            </span>
                            <span class="amount--value">$150.00</span>
                        </div>
                        <i class="fa-solid fa-check dark-blue icon"></i>
                    </div>
                    <span class="payment-card-details">************7745</span>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php get_footer('student'); ?>