
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
 
      // set callback function for drawing visualizations
      google.setOnLoadCallback(drawMap);
 
      ///////////////////////////////
      // Initializes the query and service to pull the data
      ///////////////////////////////
      function drawMap() {
 
	var  sparqlproxy = "http://logd.tw.rpi.edu/sparql?";
 
	{
	// Replace the data source URL on next line with your data source URL.
	 var queryloc = "http://rowez.myrpi.org/rowez/nydata/createsparql.php?name="+encodeURIComponent("Roy J. McDonald") ;
	 var queryurl = sparqlproxy + "output=gvds" + "&query-uri=" + encodeURIComponent(queryloc) ;
	 var query = new google.visualization.Query(queryurl);
 
	 // Send the query with a callback function.
	 query.send(handleQueryResponse);
	}
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
 
 
/*	  var data= response.getDataTable();
	  var column40x  = new Array();		
	  var rows = data.getNumberOfRows();
 
	  // get all unique account names
	  for (var i = 0; i < rows; i++ ){
		  var column = data.getValue(i,2);
		  if (indexOf(column40x,column)<0){
			column40x [column40x.length]=column;
		  }
	  }	 
 
	  // prepare table
 
        var year_data = new Array();
	  for (var i = 0; i < rows; i++ ){
		   column =data.getValue(i,2);
 
		   var year = data.getValue(i,0);
		   var substr = year.substr(0,42);
		   if (substr == "http://data-gov.tw.rpi.edu/vocab/p/401/num"){
		      year = year.substring(42);
				
			var  newrow = year_data[year];
			if (null == newrow){
			       newrow = new Array(column40x.length+1);
				newrow[0] = year;
				year_data[year] = newrow;
			}
			var column_index = indexOf(column40x,column);
 	              newrow[column_index+1]= data.getValue(i,1) *1000; //scale value, in thousands of dollars
		   }
	  }
 
 
 	  // build new data table
		var newdata = new google.visualization.DataTable();
		newdata.addColumn('string', 'Year');
  	    	for (var i = 0; i < column40x.length; i++ ){
   	    		 newdata.addColumn('number', column40x[i]);
	    	}
 
		var keys = new Array();
		for(k in year_data)
		{
		     keys.push(k);
		}
		
		keys.sort( function (a, b){return (a > b) - (a < b);} );
 
		for (var i = 0; i < keys.length; i++)
		{
			var  newrow = year_data[keys[i]];
			newdata.addRow(newrow);		
		}
 
 
		// render column chart
		{
            		var options = {};
			options['height'] = 600;			
			options['legend'] = 'right';			
			options['showRowNumber'] =true;
			options['isStacked'] =true;
			options['axisFontSize'] =10;
			options['legendFontSize']=10;
//			options['tooltipFontSize']=20;
//			options['legend']="top";
			options['title'] = 'Detailed budget (1962-2014), by account';			
			
										 
			// Create container and draw visualization
			var visualization
	      		visualization = new google.visualization.ColumnChart(document.getElementById('visualization_ColumnChart'));
       	    	visualization.draw(newdata, options);	
		}
 
		// render table
		{
            		var options = {};
			options['allowHtml'] = true;		
			options['height'] = 600;		
			options['width'] = '100%';		
			options['title'] = 'Detailed budget (1962-2014), by account';			
 
										 
			// Create container and draw visualization
			var visualization
	      		visualization = new google.visualization.Table(document.getElementById('visualization_Table'));
       	    	visualization.draw(newdata, options);	
		}
 
 
 
	  // build new data table
		var newdata = new google.visualization.DataTable();
		newdata.addColumn('string', 'Account');
    		newdata.addColumn('number', "Aggregated Value");
 
		var account_value = new Array(column40x.length);
		for (var j =0 ; j<column40x.length; j++){
			account_value[j] =0;
		}
 
		for(year in year_data)
		{
			var  newrow = year_data[year];
			for (var j =1 ; j<newrow.length; j++){
				if (!isNaN(newrow[j]))
					account_value[j-1] += newrow[j];
			} 
		}
 
		for (var i = 0; i < account_value.length; i++)
		{
			var  myrow = new Array();
			myrow[0] = column40x[i];
			myrow[1] = account_value[i];
			newdata.addRow(myrow);		
		}
 
 
		//draw annotated timeline
		{
 			var options = {};
			options['is3D'] = true;
       	       options['pieJoinAngle'] = 5;
			options['height'] = 600;
			options['legendFontSize']=12;
			options['legend'] = 'left';			
			options['title'] = 'Sum of budget (1962-2014), by account';			
		
			// Create container and draw visualization
			var visualization
	      		visualization = new google.visualization.PieChart(document.getElementById('visualization_PieChart'));
       	    	visualization.draw(newdata, options);	
	
		}
 
	};
 
	var ary_agency = new Array();
	var ary_data = new Array();
	var map_key_agency = new Array();
 
	function handle_index(data){
		ary_data =data.items;
	}
 
 
	function get_key(agency, bureau){
		if (bureau == agency)
			return bureau ;
		else
			return agency + " - " + bureau;
*/ 
	}
	
	var pattern=undefined;
	function set_options(){
 
		/*var agency= "Christopher Columbus Fellowship Foundation";
		var bureau = "Christopher Columbus Fellowship Foundation";
 
 
		if ( pattern == document.getElementById("bureau_filter").value )
			return;
		
		pattern = document.getElementById("bureau_filter").value;
 
		var select = document.getElementById("bureau_select");
		var  options = "";
		var  rows= ary_data.length;
		var index = -1;
 
   		while ( select.childNodes.length >= 1 )
 		{
   	  		  select.removeChild( select.firstChild );       
  		} 
 
		for (var i = 0; i < rows; i++ )
		{
			var value = ary_data[i].bureau ;
			
			var text = get_key(ary_data[i].agency, ary_data[i].bureau) + " ("+ary_data[i].count+" sources)";
			if (!text.match(new RegExp(pattern,"i"))){
				continue;
			}
 
			map_key_agency[text] =ary_data[i].agency ;
 
			if (agency==ary_data[i].agency && bureau ==ary_data[i].bureau){
				index=i;
			}
			var element = document.createElement("option");
			element.setAttribute("value",value);
			element.innerHTML = text; 
 
			select.appendChild(element);
		}
 
		if (select.childNodes.length ==1){
			select.selectedIndex = 0;
			//onchange_bureau();
			//return;
		}
 
		
		if (index>=0)	{
			select.selectedIndex =index;
		}else{
			select.selectedIndex = 0;
		}
		onselect_senator();*/
 
	}
      function popselect() {
 
        var  sparqlproxy = "http://logd.tw.rpi.edu/sparql?";
        // Replace the data source URL on next line with your data source URL.
         var queryloc = "http://rowez.myrpi.org/rowez/nydata/senators.sparql" ;
         var queryurl = sparqlproxy + "output=gvds" + "&query-uri=" + encodeURIComponent(queryloc) ;
         var query = new google.visualization.Query(queryurl);
 
         // Send the query with a callback function.
         //document.write("yo");
         query.send(processDataTable);
      };
 
      function processDataTable(response) {
	var data = response.getDataTable();
	var senators = new Array();
	
	
	//document.write("yo2");
               for (var i = 0; i < data.getNumberOfRows(); i++) {
                   senators[i] = data.getValue(i, 0);
				  				   
		   //document.write(data.getValue(i, 0));
		}
                var select = $("#senator_select").val();
                var  options = "";
                var rows = senators.length;
				
				//document.write(senators.length);
                var index = -1;
 
 
                /*while ( select.childNodes.length >= 1 )
                {
                          select.removeChild( select.firstChild );
                }*/
 
                for (var i = 0; i < rows; i++ )
                {
                        var value = senators[i];
                        var text = senators[i];
                        var element = document.createElement("option");
                        element.setAttribute("value",value);
                        element.innerHTML = text;
						
                        $("<option value='" + value + "'>" + text + "</option>").appendTo("#senator_select");
                        			
                }
 
/*                if (select.childNodes.length ==1){
                        select.selectedIndex = 0;
                }
 
                if (index>=0)   {
                        select.selectedIndex =index;
                }else{
                        select.selectedIndex = 0;
                }*/
      }
	  
	$(document).ready(function() {
	
	//if select value is changed
	
	$('#senator_select').change(function() {
	
	var query = $('#senator_select').val();
		
	query = query.replace('SENATOR ','');

	
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
	<div name="feeds" id="feeds">
	
	<?php
	
	include 'nyt.php';
	
	?>
	
	</div>
		
    <div id="chart_div" style=" height: 500px;"></div> 
   </div> 
  </div> 
 </div> 
</body> 
</html> 