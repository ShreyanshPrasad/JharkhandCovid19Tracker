$(function(){
    function removeSpace(text){
        return text.replace(" ", "_");
    }


    $.ajax({
        url : "https://api.covid19india.org/districts_daily.json",
        type : "GET",
        success : function(data){
            $.each(data, function(key, value){
                $.each(value, function(key1, value1){
                    var TotCnf = 0;
                    var TotRec = 0;
                    var TotDed = 0;
                    if(key1 == "Jharkhand"){
                        $.each(value1, function(districtName, dateArray){
                            //console.log(districtName + " : " + removeSpace(districtName)); //district name
                            //console.log(dateArray); // array of date wise objects
                            var currentDay = dateArray[dateArray.length - 1];
                            var lastDay = dateArray[dateArray.length - 2];
                            var dayBeforeLastDay = dateArray[dateArray.length - 3];
                            //console.log(dayBeforeLastDay);
                            //console.log(lastDay);
                            var newCnf = 0;
                            var newRec = 0;
                            var newDed = 0;

                            newCnf = currentDay.confirmed - lastDay.confirmed;
                            newRec = currentDay.recovered - lastDay.recovered;
                            newDed = currentDay.deceased  - lastDay.deceased;

                            if(newCnf == 0 || newCnf == undefined || newCnf == NaN)
                                newCnf = lastDay.confirmed - dayBeforeLastDay.confirmed;
                            
                            if(newRec == 0 || newRec == undefined || newRec == NaN)
                                newRec = lastDay.recovered - dayBeforeLastDay.recovered;

                            if(newDed == 0 || newDed == undefined || newDed == NaN)
                                newDed = lastDay.deceased - dayBeforeLastDay.deceased;

                            //console.log("confirmed : " + newCnf);
                            //console.log("recovered : " + newRec);
                            //console.log("deceased : " + newDed + "\n\n");
                            if("Unknown" != districtName){
                                TotCnf += newCnf;
                                TotRec += newRec;
                                TotDed += newDed;
                            }
                            
                            var district_act_new = removeSpace(districtName) + "_Act_New";
                            var district_rec_new = removeSpace(districtName) + "_Rec_New";
                            var district_cnf_new = removeSpace(districtName) + "_Cnf_New";
                            var district_ded_new = removeSpace(districtName) + "_Ded_New";

                            //var act = $("#" + district_act_new).text();
                            var rec = $("#" + district_rec_new).text("");
                            var cnf = $("#" + district_cnf_new).text("");
                            var ded = $("#" + district_ded_new).text("");

                            //$("#" + district_act_new).text("");
                            if(newRec > 0)
                                $("#" + district_rec_new).append(" (<i class='fas fa-arrow-up'></i>" + (newRec) + ")");
                            if(newCnf > 0)
                                $("#" + district_cnf_new).append(" (<i class='fas fa-arrow-up'></i>" + (newCnf) + ")");
                            if(newDed > 0)
                                $("#" + district_ded_new).append(" (<i class='fas fa-arrow-up'></i>" + (newDed) + ")");
                            /*$("#" + removeSpace(districtName) +" td:nth-child(1)").text(removeSpace(districtName));
                            $("#" + removeSpace(districtName) +" td:nth-child(2)").text(removeSpace(""));
                            $("#" + removeSpace(districtName) +" td:nth-child(3)").text(newCnf);
                            $("#" + removeSpace(districtName) +" td:nth-child(4)").text(newRec);
                            $("#" + removeSpace(districtName) +" td:nth-child(5)").text(newDed);*/
                        });

                        //console.log("Total confirmed : " + TotCnf);
                        //console.log("Total recovered : " + TotRec);
                        //console.log("Total deceased : " + TotDed);
                        if(TotCnf > 0)
                            $("#totCnfNew").append(" (<i class='fas fa-arrow-up'></i>" + (TotCnf) + ")");
                        if(TotRec > 0)
                            $("#totRecNew").append(" (<i class='fas fa-arrow-up'></i>" + (TotRec) + ")");
                        if(TotDed > 0)
                            $("#totDedNew").append(" (<i class='fas fa-arrow-up'></i>" + (TotDed) + ")");
                    }
                });
            });
        },
        error : function(data) {
          console.log("Error occured");
          console.log(data);
        }
    });
});