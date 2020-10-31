<?php
    if(isset($_POST['submit_btn'])){
        if($_POST['adminid'] == "Clever" && $_POST['password'] == "ckmkv"){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <link href="images/novirus.png" rel="icon" type="image/png"/>
    <title>Control</title>
</head>
<body>
    <?php include("nav.html"); ?>
    <div class="container bg-dark text-light p-5 mb-3 shadow">

        <div class="section my-5 p-3 border border-primary rounded">
            <div class="text-center"><h3>Update</h3></div>
            <form method="post" action="action_page.php" class="needs-validation">
                <div class="form-group">
                    <select class="form-control" id="selectType" name="type" required>
                        <option value="#">Please select</option>
                        <option value="new_case">New Case</option>
                        <option value="new_death">New Death</option>
                        <option value="new_recover">New Recovery</option>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control" id="selectDistrict" name="district" required>
                        <option value="#">Please select District</option>
                        <option value="D01">Bokaro</option>
                        <option value="D02">Chatra</option>
                        <option value="D03">Deoghar</option>
                        <option value="D04">Dhanbad</option>
                        <option value="D05">Dumka</option>
                        <option value="D06">E Singhbhum</option>
                        <option value="D07">Garhwa</option>
                        <option value="D08">Giridih</option>
                        <option value="D09">Godda</option>
                        <option value="D10">Gumla</option>
                        <option value="D11">Hazaribagh</option>
                        <option value="D12">Jamtara</option>
                        <option value="D13">Khunti</option>
                        <option value="D14">Koderma</option>
                        <option value="D15">Latehar</option>
                        <option value="D16">Lohardaga</option>
                        <option value="D17">Pakur</option>
                        <option value="D18">Palamu</option>
                        <option value="D19">Ramgarh</option>
                        <option value="D20">Ranchi</option>
                        <option value="D21">Sahebganj</option>
                        <option value="D22">Saraikela</option>
                        <option value="D23">Simdega</option>
                        <option value="D24">W Singhbhum</option>
                    </select>
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="cases" placeholder="Number of cases" required>
                </div>
                <div class="form-row my-2">
                    <div class="col">
                        <input type="date" class="form-control" name="reported_date" placeholder="Reported on date(dd/mm/yyyy)" varia-describedby="reportDate" required>
                        <small id="reportDate" class="form-text text-muted my-2">Reported on date(dd/mm/yyyy)</small>
                    </div>
                    <div class="col">
                        <input type="date" class="form-control" name="last_updated" placeholder="Last updated on date(dd/mm/yyyy)" varia-describedby="UpdateDate" required>
                        <small id="UpdateDate" class="form-text text-muted my-2">Last updated on date(dd/mm/yyyy)</small>
                    </div>
                </div>
                <div class="form-group"><button type="submit" class="btn btn-primary form-control" name="submit">Submit</button></div>
            </form>
        </div>
    </div>

    <!--scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
<?php
    }
    else{
        echo "<script> alert('Wrong ID or Password'); window.location = 'index.php'; </script>";
    }
}else{
    echo "<script> alert('Access denied..!'); window.location = 'index.php'; </script>";
}
?>