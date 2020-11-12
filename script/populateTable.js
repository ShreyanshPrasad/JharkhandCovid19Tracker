$(function(){
    function removeParenthesis(num){
        if(num.indexOf('(') != -1)
            return num.substring(0, num.indexOf('('));
        return num;
    }
    function reverseString(str) {
        return str.split("/").reverse().join("-");
    }
    let lstUpdated = "";
    $.ajax({
        url : "https://api.covid19india.org/data.json",
        type : "GET",
        success : function(data){
          var jharkhandIndex = 0;
          $.each(data.statewise, function(key, value){
            $.each(value, function(key1, value1){
              if(key1 == 'state' && value1 == 'Jharkhand')
              jharkhandIndex = key;
            });
          });
          
          var jharkhand = data.statewise[jharkhandIndex];
          $('#cnf').text(jharkhand.confirmed);
          $('#totCnf').text(jharkhand.confirmed);
          $('#ded').text(jharkhand.deaths);
          $('#totDed').text(jharkhand.deaths);
          $('#rec').text(jharkhand.recovered);
          $('#totRec').text(jharkhand.recovered);
          $('#act').text(jharkhand.active);
          $('#totAct').text(jharkhand.active);
          $('#lastUpdateDate').text(jharkhand.lastupdatedtime);
          lstUpdated = jharkhand.lastupdatedtime;
          lstUpdated = lstUpdated.substring(0, lstUpdated.indexOf(' '));
          lstUpdated = reverseString(lstUpdated);
          console.log(lstUpdated);
          //YYYY-MM-DD
          const url = `https://api.covid19india.org/v4/data-${lstUpdated}.json`;
          console.log(url);
          let dataSet = [];
          $.ajax({
            url : 'https://api.covid19india.org/v4/data.json',
            type : "GET",
            success : function(data){
                $.each(data, function(key, value){
                    if("JH" == key){
                        console.log(key,value,'\n\n\n');
                        let totCnf = 0, totRec = 0, totDed = 0;
                        $.each(value, function(key1, value1){
                            //console.log('\n\n\n');
                            //console.log(key1);
                            if(key1 == "delta"){
                                //details of new confirmed, deceased, recovered, tested
                                $.each(value1, function(key2, value2){
                                    //console.log(key2, value2);
                                    if(key2 == 'confirmed'){
                                        if(value2 > 0){
                                            $('#newCnf').html(' ( ' + value2 + " <i class='fas fa-arrow-up text-primary'></i> )");
                                            $('#totCnfNew').html(' ( ' + value2 + " <i class='fas fa-arrow-up text-primary'></i> )");
                                        }
                                    }
                                    if(key2 == 'deceased'){
                                        if(value2 > 0){
                                            $('#newDed').html(' ( ' + value2 + " <i class='fas fa-arrow-up text-danger'></i> )");
                                            $('#totDedNew').html(' ( ' + value2 + " <i class='fas fa-arrow-up text-danger'></i> )");
                                        }
                                    }
                                    if(key2 == 'recovered'){
                                        if(value2 > 0){
                                            $('#newRec').html(' ( ' + value2 + " <i class='fas fa-arrow-up text-success'></i> )");
                                            $('#totRecNew').html(' ( ' + value2 + " <i class='fas fa-arrow-up text-success'></i> )");
                                        }
                                    }
                                    if(key2 == 'tested'){
                                        if(value2 > 0){
                                            $('#newTst').html(' (' + value2 + " <i class='fas fa-arrow-up text-muted'></i> )");
                                        }
                                    }
                                });
                            }
                            if(key1 == "districts"){
                                //details of all districst of Jharkhand
                                
                                $.each(value1, function(key2, value2){
                                    let rec = ['District', '0', '0', '0', '0', '0'];
                                    rec[0] = key2;
                                    $.each(value2, function(key3, value3){
                                        
                                        if(key3 == "delta"){
                                            $.each(value3, function(key4, value4){
                                                //console.log(key4, value4);
                                                if(key4 == 'confirmed')
                                                    rec[3] = value4;
                                                if(key4 == 'deceased')
                                                    rec[5] = value4;
                                                if(key4 == 'recovered')
                                                    rec[4] = "" + value4;
                                            });
                                            
                                        }

                                        //console.log("cnfNew", cnfNew, "dedNew", dedNew, "recNew", recNew);
                                        if(key3 == "meta"){
                                            rec[1] = "" + value3.population;
                                        }
                                        if(key3 == "total"){
                                            $.each(value3, function(key4, value4){
                                                //console.log(key4, value4);
                                                var cnfNew = 0, recNew = 0, dedNew = 0;
                                                if(key4 == 'confirmed'){
                                                    cnfNew = rec[3];
                                                    rec[3] = cnfNew > 0 ? `${value4} ( <i class='fas fa-arrow-up text-primary'></i> ${cnfNew} )` : value4;
                                                }
                                                if(key4 == 'deceased'){
                                                    dedNew = rec[5];
                                                    rec[5] = dedNew > 0 ? `${value4} ( <i class='fas fa-arrow-up text-danger'></i> ${dedNew} )` : value4;
                                                }
                                                if(key4 == 'recovered'){
                                                    recNew = rec[4];
                                                    rec[4] = recNew > 0 ? `${value4} ( <i class='fas fa-arrow-up text-success'></i> ${recNew} )` : value4;
                                                }
                                            });
                                        }
                                    });
                                    let cnf = removeParenthesis(rec[3].toString());
                                    let cur = removeParenthesis(rec[4].toString());
                                    let ded = removeParenthesis(rec[5].toString());
                                    rec[2] = cnf - cur - ded;
                                    //console.log(rec);
                                    dataSet.push(rec);
                                    //console.log(key2, value2);
                                });
                                $('#example')
                                    .addClass( 'nowrap' )
                                    .dataTable( {
                                        data: dataSet,
                                        "paging":   false,
                                        responsive: true,
                                        "info":     true
                                    });
                            }
                            if(key1 == "meta"){
                                //Last updated and total population of Jharkhand
                                $.each(value1, function(key2, value2){
                                    //console.log(key2, value2);
                                    if(key2 == 'population'){
                                        $('#totalPop').text(value2);
                                    }
                                });
                            }
                            if(key1 == "total"){
                                //details of total confirmed, deceased, recovered, tested
                                $.each(value1, function(key2, value2){
                                    console.log(key2, value2);
                                    if(key2 == 'tested'){
                                        $('#tst').html(value2);
                                    }
                                });                            
                            }
                        });
                    }
                });
            },
            error : function(data) {
              console.log("Error occured");
              console.log(data);
            }
        });

        },
        error : function(data) {
          console.log(data);
        }
    });
    
});