<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <link href="images/novirus.png" rel="icon" type="image/png"/>
    <title>Report</title>
</head>
<body>
    <?php include("nav.html"); ?>
    <div class="container bg-dark text-light p-5 mb-3 shadow">
        <h3 class="h3">Report and become Partner..!</h3>
        <p>If you find anything suspecious or have any doubt regarding the data, feel free to report</p>
        <span class="text-muted m-0 p-0">Reporting Via @WhatsApp</span>
    </div>
    <div class="container bg-dark text-light p-3 mb-3 shadow border border-light rounded">

        
            <div class="text-center"><h3>Report</h3></div>
            <form method="post" action="report_post.php" class="needs-validation">
                <div class="form-group">
                    <label for="comment">Comment:</label>
                    <textarea class="form-control" rows="5" id="comment" name="message"></textarea>
                </div>
                
                <div class="form-group"><button type="submit" class="btn btn-outline-info form-control" name="report">Report</button></div>
            </form>
        
    </div>
    <?php include("footer.html"); ?>

    <!--scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>