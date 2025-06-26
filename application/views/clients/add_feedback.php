<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style>
        .control-group {
            margin: 10px !important;
        }

        .list-unstyled {
            color: #000;
            text-align: left;
            padding: 5px 10px;
            font-size: 14px;
            border-bottom: 1px dotted #a3b5e0;
            list-style: none;
        }

        .liClass {
            background-color: #eaf5f4;
            padding: 2px;
            margin-bottom: 2px;
            margin-left: -17%;
            border: 1px solid blue;
            cursor: pointer;
        }

        .addLinkC {
            margin-top: 2px;
            margin-left: -17%;
        }
    </style>
</head>
<body onLoad="doThis()">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title">
                        <span class="icon"><i class="icon-th"></i></span>
                        <h5>Feedback Form</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="span6">
                                <div class="control-group"></div>
                            </div>

                            <div class="control-group">
                                <label for="subject">Subject:</label>
                                <div class="controls">
                                    <input type="text" id="subject" name="subject" required value="<?= $this_element->subject ?>">
                                </div>
                            </div>

                            <div class="control-group">
                                <label for="message">Message:</label>
                                <div class="controls">
                                    <textarea id="message" name="message" required><?= $this_element->message ?></textarea>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function doThis() {
            // Define your function logic here
        }
    </script>
</body>
</html>
