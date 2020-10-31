function removeSpace(text){
    return text.replace(" ", "_");
}


$.ajax({
    url : "https://api.covid19india.org/v2/state_district_wise.json",
    type : "GET",
    success : function(data){
      
        //console.log(data);
        var jIndex = 0;
        $.each(data, function(key, value){
            $.each(value, function(key1, value1){
                if(key1 == 'statecode' && value1 == 'JH')
                jIndex = key;
            });
        });
        
        var jharkhand = data[jIndex];
        var districts = jharkhand.districtData;
        $.each(districts, function(key, value){
            var confirmed = 0, recovered = 0, died = 0, active = 0, district = '';
            $.each(value, function(key1, value1){
                
                switch(key1){
                    case 'district':
                        district = value1;
                        break;
                    case 'confirmed':
                        confirmed = value1;
                        break;
                    case 'deceased':
                        died = value1;
                        break;
                    case 'recovered':
                        recovered = value1;
                        break;
                    case 'active':
                        active = value1;
                        break;
                }
                
            });
            var row = '<tr><td>' + district + '</td><td>' + confirmed +'</td><td>' + recovered + '</td><td>' + died + '</td><td>' + active + '</td></tr>';
            if(confirmed > 0)
                $('#tableBody').append(row);
            //console.log(district + ":");
            //console.log("Cnf : " + confirmed);
            //console.log("Rec : " + recovered);
            //console.log("Ded : " + died);
            //console.log("Act : " + active);

            var district_act = removeSpace(district) + "_Act";
            var district_rec = removeSpace(district) + "_Rec";
            var district_cnf = removeSpace(district) + "_Cnf";
            var district_ded = removeSpace(district) + "_Ded";
            //if(district == "Kodarma")
                //alert(district_act + ":" + district_rec + ":" + district_cnf + ":" + district_ded);

            var act = $("#" + district_act).text();
            var rec = $("#" + district_rec).text();
            var cnf = $("#" + district_cnf).text();
            var ded = $("#" + district_ded).text();


            $("#" + district_act).text(act * 1 + active);
            $("#" + district_rec).text(rec * 1 + recovered);
            $("#" + district_cnf).text(cnf * 1 + confirmed);
            $("#" + district_ded).text(ded * 1 + died);
        });
      
    },
    error : function(data) {
      console.log("Error occured");
      console.log(data);
    }
});