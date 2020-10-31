
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
      
    },
    error : function(data) {
      console.log(data);
    }
});