class Confirm{
    constructor(cDate, value){
        this.cDate = cDate;
        this.value = value;
    }
}

class Recovered{
    constructor(rDate, value){
        this.rDate = rDate;
        this.value = value;
    }
}

class Death{
    constructor(dDate, value){
        this.dDate = dDate;
        this.value = value;
    }
}

function getFormatedDate(){
    var dt = new Date();
    var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    return dt.getDate() + "-" + months[dt.getMonth()] + "-" + dt.getFullYear().toString().slice(2);
}
function previousDay(dt){
    return dt.replace(dt.slice(0,2), dt.slice(0,2) - 1);
}

var cnfArr = [], recArr = [], dedArr = [];

function populateGraph(graphID, type, dateArr, caseArr, color, labelText, optionalText){
        var screenWidth = window.innerWidth
            || document.documentElement.clientWidth
            || document.body.clientWidth;
        var axixDisplay = true;
        if(screenWidth < 700){
            axixDisplay = false;
        }
        var ctx = document.getElementById(graphID).getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: type,

            // The data for our dataset
            data: {
                labels: dateArr,
                datasets: [{
                    label: labelText, //labelText
                    fill: false,
                    //lineTension : 0,
                    backgroundColor: color,
                    borderColor: color,
                    data: caseArr
                }]
            },

            // Configuration options go here
            options: {
                responsive: true,
                title: {
                    display: false,
                    text: optionalText //optionalText Graph Header
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: axixDisplay,
                            labelString: 'Date'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: axixDisplay,
                            labelString: 'Number of Cases'
                        }
                    }]
                },
                legend : {
                    display : false,
                    position : "bottom"
                }
            }
      });
}

$.ajax({
    url : "https://api.covid19india.org/states_daily.json",
    type : "GET",
    success : function(data){
      var states_daily = data.states_daily;
      $.each(states_daily, function( index, value ) {
        if(value.jh > 0){
            switch(value.status){
                case "Confirmed":
                    var cnf = new Confirm(value.date, value.jh);
                    cnfArr.push(cnf);
                    break;
                case "Recovered":
                    var rec = new Recovered(value.date, value.jh);
                    recArr.push(rec);
                    break;
                case "Deceased":
                    var ded = new Death(value.date, value.jh);
                    dedArr.push(ded);
                    break;
            }
        }
      });
      
      var dateArr = [], caseArr = [];

      $.each(cnfArr, function(key, value){
          $.each(value, function(key1, value1){
              
              if(key1 == 'cDate')
                dateArr.push(value1);
              else
                caseArr.push(value1);
          });
      });

      populateGraph('newConfirmedCases', 'bar', dateArr, caseArr, 'blue', 'New Case', 'Daily new reported cases');
      $("#newCnf").prepend(" (" + caseArr[caseArr.length-1]);
      if((caseArr[caseArr.length-1] > 0) && (dateArr[dateArr.length-1] == getFormatedDate() || dateArr[dateArr.length-1] == previousDay(getFormatedDate())))
        $("#newCnf").css({"display": "inline"});
      var date = [...dateArr];
      var cases = [...caseArr];
      if(cases.length > 1){
        for(var i = 0 ; i < cases.length ; i++){
            if(i == 0)
                continue;
            else
            cases[i] = (cases[i - 1] * 1) + (cases[i] * 1);  //Multiplying with 1 to perform addition insted of string concatination
        }
      }
      populateGraph('ConfirmedCases', 'line', date, cases, 'blue', 'Confirmed Cases', 'Confirmed cases');
      dateArr = [];
      date = [];
      caseArr = [];
      cases = [];


      
      $.each(recArr, function(key, value){
        $.each(value, function(key1, value1){
            
            if(key1 == 'rDate')
                dateArr.push(value1);
              else
                caseArr.push(value1);
        });
      });

      populateGraph('newRecovered', 'bar', dateArr, caseArr, 'green', 'New Recovery', 'Daily new recovered cases');
      $("#newRec").prepend("(" + caseArr[caseArr.length-1]);
      if((caseArr[caseArr.length-1] > 0) && (dateArr[dateArr.length-1] == getFormatedDate() || dateArr[dateArr.length-1] == previousDay(getFormatedDate())))
        $("#newRec").css({"display": "inline"});
      date = [...dateArr];
      cases = [...caseArr];
      if(cases.length > 1){
        for(var i = 0 ; i < cases.length ; i++){
            if(i == 0)
                continue;
            else
            cases[i] = (cases[i - 1] * 1) + (cases[i] * 1);  //Multiplying with 1 to perform addition insted of string concatination
        }
      }
      populateGraph('Recovered', 'line', date, cases, 'green', 'Recovered Cases', 'Recovered cases');
      dateArr = [];
      date = [];
      caseArr = [];
      cases = [];


      
      $.each(dedArr, function(key, value){
        $.each(value, function(key1, value1){
            
            if(key1 == 'dDate')
                dateArr.push(value1);
              else
                caseArr.push(value1);
        });
      });

      populateGraph('newDeath', 'bar', dateArr, caseArr, 'red', 'New Death', 'Daily new Death');
      $("#newDed").prepend("(" + caseArr[caseArr.length-1]);
      if((caseArr[caseArr.length-1] > 0) && (dateArr[dateArr.length-1] == getFormatedDate() || dateArr[dateArr.length-1] == previousDay(getFormatedDate())))
        $("#newDed").css({"display": "inline"});
      date = [...dateArr];
      cases = [...caseArr];
      if(cases.length > 1){
        for(var i = 0 ; i < cases.length ; i++){
            if(i == 0)
                continue;
            else
            cases[i] = (cases[i - 1] * 1) + (cases[i] * 1);  //Multiplying with 1 to perform addition insted of string concatination
        }
      }
      populateGraph('Death', 'line', date, cases, 'red', 'Total Death', 'Total Death');
      dateArr = [];
      date = [];
      caseArr = [];
      cases = [];


    },
    error : function(data) {
      console.log(data);
    }
});