
<!DOCTYPE html> 
<html> 
<head> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <title>State Senate Expendatures</title> 
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js" type="text/javascript"></script> 
  <script type="text/javascript" src="http://www.google.com/jsapi"></script> 
  <!--   customize function --> 
    <script type="text/javascript"> 
      google.load("visualization", "1", {packages:["columnchart,table,piechart,annotatedtimeline"]});
 
      google.setOnLoadCallback(drawVisualization);



      function drawVisualization(senator) {
        var  sparqlproxy = "http://logd.tw.rpi.edu/sparql?";
	var select = document.forms["senator_form"]["senator_select"];
	var url = window.location.toString();
	alert(senator);
        // Replace the data source URL on next line with your data source URL.
         var queryloc = "http://cgi2.cs.rpi.edu/~souzad/ny/createsparql?name=" + encodeURIComponent(senator) ;
         var queryurl = sparqlproxy + "output=gvds" + "&query-uri=" + encodeURIComponent(queryloc) ;
         var query = new google.visualization.Query(queryurl);

        // Send the query with a callback function.
        query.send(handleQueryResponse);
      };

      function indexOf(array, obj){
	for(var i=0; i<array.length; i++){
	  if(array[i]==obj){
	    return i;
	  }
	}
	return -1;
      }

      function handleQueryResponse(response) {
        if (response.isError()) {
          alert('Error in query: ' + response.getMessage() + ' ' + response.getDetailedMessage());
          return;
        }
	var data= response.getDataTable();
	var columns  = new Array();
	var rows = data.getNumberOfRows();
 	var values = new Array();
	values[0] = new Array(); //2009
	values[1] = new Array(); //2010

	// get all unique account names
	for (var i = 0; i < rows; i++ ){
	  var column = data.getValue(i,3);
	  if (indexOf(columns,column)<0){
	    columns [columns.length]=column;
	    values [0] [indexOf(columns,column)] = 0;
	    values [1] [indexOf(columns,column)] = 0;
	  }
	}
	for (var i = 0; i < rows; i++ ){
	  var column = data.getValue(i,3);
	  if(data.getValue(i,0) != null) {
	    values [0] [indexOf(columns,column)] += data.getValue(i,4);
	}
	  else
	    values [1] [indexOf(columns,column)] += data.getValue(i,4);
	  }

	  var newdata = new google.visualization.DataTable();
	  newdata.addRows(columns.length);
	  newdata.addColumn('string', 'Year');
	  newdata.addColumn('number', "2009");
	  newdata.addColumn('number', "2010");
	  for (var i = 0; i < columns.length; i++ ){
	    newdata.setValue(i,0, columns[i].replace("http://logd.tw.rpi.edu/source/nysenate-gov/dataset/expenditure/value-of/expense_type/","").replace("_", " "));
	    for(var j = 0; j < 2; j++){
	      newdata.setValue(i, j+1, parseFloat(values[j][i].toFixed(2)));
	    }
	  }
	  var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
	  chart.draw(newdata, {width: 800, height: 480, title: 'Spending', hAxis: {title: 'Type of Expense', titleTextStyle: {color: 'red'}}});
	}
	function popselect() {

	var  sparqlproxy = "http://logd.tw.rpi.edu/sparql?";

	// Replace the data source URL on next line with your data source URL.
	var queryloc = "http://cgi2.cs.rpi.edu/~souzad/ny/senators.sparql" ;
	var queryurl = sparqlproxy + "output=gvds" + "&query-uri=" + encodeURIComponent(queryloc) ;
	var query = new google.visualization.Query(queryurl);
	// Send the query with a callback function.
	query.send(processDataTable);
      };

      function processDataTable(response) {
	var data= response.getDataTable();
	var senators = new Array();
	for (var i = 0; i < data.getNumberOfRows(); i++) {
	  senators[i] = data.getValue(i, 0);
	}
	var select = document.forms["senator_form"]["senator_select"];
	var  rows= senators.length;
	for (var i = 0; i < rows; i++ ){
	  var value = senators[i] ;
	  var text = senators[i];
	  var element = document.createElement("option");
	  element.setAttribute("value",value);
	  element.innerHTML = text;
	  select.options[i]=new Option(senators[i], senators[i].replace("SENATOR ",""), true, false);
	  
	}

      }


 
	  
	$(document).ready(function() {
	
	//if select value is changed
	
	$('#senator_select').change(function() {
	
	var query = $('#senator_select').val();
		
	query = query.replace('SENATOR ','');

	drawVisualization(query);
	
	alert(query);



	$('#feeds').load('nyt.php?query='+encodeURIComponent(query));
	
		
  
});
   
 });
 

    </script> 
</head> 
<body onLoad = popselect()> 
 <div id="wrap"> 
  <div id="wrap-padding"> 
   <div class="main-title"> 
    <div style="text-align:left; width: 1100px"> 
     <form id="senator_form" action ="" > 
      Senator
      <select name="senator" id="senator_select"><option disabled>Select a senator...</option></select>
	  </form> 
    </div> 
    <div id="chart_div" style=" height: 500px;"></div> 
	<div name="feeds" id="feeds">
	
	<?php
	
	include 'nyt.php';
	
	?>
	
	</div>
		

   </div> 
  </div> 
 </div> 
</body> 
</html> 
