<!DOCTYPE html>
<html>

<head>
    <title>Page Title</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <style>
        .input-container {
            padding-bottom: 1em;
        }

        .left-inner-addon {
            position: relative;
        }

        .left-inner-addon input {
            padding-left: 35px !important;
        }

        .left-inner-addon i {
            position: absolute;
            padding: 12px 12px;
            pointer-events: none;
        }

        .right-inner-addon {
            position: relative;
        }

        .right-inner-addon input {
            padding-right: 35px !important;
        }

        .right-inner-addon i {
            position: absolute;
            right: 0px;
            padding: 12px 12px;
            pointer-events: none;
        }

        .left-and-right-inner-addon {
            position: relative;
        }

        .left-and-right-inner-addon input {
            padding-right: 35px !important;
            padding-left: 35px !important;
        }

        .left-and-right-inner-addon i.left {
            position: absolute;
            padding: 12px 12px;
            pointer-events: none;
        }

        .left-and-right-inner-addon i.right {
            position: absolute;
            right: 0px;
            padding: 12px 12px;
            pointer-events: none;
        }

        .right-inner-addon-b {
            position: relative;
        }

        .right-inner-addon-b input {
            padding-right: 35px !important;
        }

        .right-inner-addon-b i {
            position: absolute;
            right: 0px;
            padding: 9px 12px;
            pointer-events: none;
        }

        input {
            width: 100%;
            padding: 1em !important;
            margin: 0em !important;
            box-sizing: border-box;
        }
    </style>
</head>

<body>
    <div class="row">
        <p>Examples:</p>
        <div>
            <div class="left-inner-addon input-container">
                <i class="fa fa-lock"></i>
                <input type="password" class="form-control" placeholder="Left icon" />
            </div>
        </div>
        <div>
            <div class="right-inner-addon input-container">
                <i class="fa fa-search"></i>
                <input type="text" class="form-control" placeholder="Right icon" />
            </div>
        </div>
        <div>
            <div class="left-and-right-inner-addon input-container">
                <i class="fa fa-child left"></i>
                <i class="fa fa-circle-o right"></i>
                <input type="text" class="form-control" placeholder="Left and right icons" />
            </div>
        </div>
    </div>
</body>
</html>