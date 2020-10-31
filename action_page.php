<?php
    if(isset($_POST['submit'])){

        include("connection.php");

        function changeDate($date){ //2020-04-19
            $yyyy = substr($date,0,4);
            $mm = substr($date,5,2);
            $dd = substr($date,8,2);
            return $dd . "-" . $mm . "-" . $yyyy;
        }

        $type = $_POST['type'];
        $district = $_POST['district'];
        $cases = $_POST['cases'];
        $reported_date = changeDate($_POST['reported_date']);
        $last_updated = changeDate($_POST['last_updated']);
        
        //echo $type . " <br> " . $district . " <br> " . $cases . " <br> " . $reported_date . " <br> " . $last_updated;
        if("new_case" == $type){
            $query1 = "INSERT INTO `t_new_confirmed_cases`(`district_id`, `number_of_cases`, `date`) VALUES ('$district', $cases, STR_TO_DATE('$reported_date', '%d-%m-%Y'))";
            $query2 = "UPDATE `t_districts_covid_details` SET `is_covid_free`= 'N', `confirmed`= confirmed + $cases WHERE district_id = '$district'";

        }
        elseif("new_death" == $type){
            $query1 = "INSERT INTO `t_new_death`(`district_id`, `number_of_death`, `date`) VALUES ('$district', $cases, STR_TO_DATE('$reported_date', '%d-%m-%Y'))";
            $query2 = "UPDATE `t_districts_covid_details` SET `died`= died + $cases WHERE district_id = '$district'";
        }
        elseif ("new_recover" == $type) {
            $query1 = "INSERT INTO `t_new_recovery`(`district_id`, `number_of_recovery`, `date`) VALUES ('$district', $cases, STR_TO_DATE('$reported_date', '%d-%m-%Y'))";
            $query2 = "UPDATE `t_districts_covid_details` SET `recovered`= recovered + $cases WHERE district_id = '$district'";
        }
        else{
            die('Invalid type...!');
        }
        if (($conn->query($query1) === TRUE) && ($conn->query($query2) === TRUE)){
            $query3 = "INSERT INTO `t_last_update`(`last_updated`) VALUES (STR_TO_DATE('$last_updated', '%d-%m-%Y'))";
            $conn->query($query3);
            echo "<script> window.location = 'index.php'; </script>";
        }else{
            echo $query;
            die('Somthing went wrong');
        }
    }else{
        echo "<script> alert('Access denied..!'); window.location = 'index.php'; </script>";
    }
?>