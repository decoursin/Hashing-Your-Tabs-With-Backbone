<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>jQuery UI Autocomplete - Categories</title>

	<script src="./jquery-2.1.1.js"></script>
	<link href="jquery-ui-1.10.4.custom/css/redmond/jquery-ui-1.10.4.custom.css" rel="stylesheet">
	<script src="jquery-ui-1.10.4.custom/js/jquery-ui-1.10.4.custom.js"></script>
  <style>
  .ui-autocomplete-category {
    font-weight: bold;
    padding: .2em .4em;
    margin: .8em 0 .2em;
    line-height: 1.5;
  }
  </style>
  <script>
  $.widget( "custom.catcomplete", $.ui.autocomplete, {
    _renderMenu: function( ul, items ) {
      var that = this,
        currentCategory = "";
      $.each( items, function( index, item ) {
        if ( item.category != currentCategory ) {
		ul.append( "<li class='ui-autocomplete-category'>" + item.category + "</li>" );
          currentCategory = item.category;
        }
        that._renderItemData( ul, item );
      });
    }
  });
  $(function() {
    $( "ul.ui-autocomplete" ).accordion({
header: "li.ui-autocomplete-category",
      collapsible: true
    });
  });
$(document).ready(function(){
//Hide the tooglebox when page load
//slide up and down when click over heading 2
$("li").click(function(){
// slide toggle effect set to slow you can set it to fast too.
var x = $(this).next(".ui-autocomplete-category").css("display");  
if(x=="block")
	$(this).text("+ Read More");
else
	$(this).text("- Read More");
$(this).next(".togglebox").slideToggle("slow");
return true;
});
});
  </script>
</head>
<body>
<div id="accordion"> 
<label for="search">Search: </label>
<input id="search">
</div>
 
<?php
	require ('config.php');

	//TODO: Throw for exception
	$fdnamerows = [];
	// Autocomplete takes an array of objects of label and value.
	$query="SELECT NDB_No as value, Shrt_Desc as label, Energ_Kcal as category FROM nutrition_db.foods_tbl";

	if($result = mysqli_query($link, $query))
	{
		$fdnamerows = [];
		while($fdnamerows[] = mysqli_fetch_object($result));
		// Pop null from the array.
		//var_dump($fdnamerows);
		array_pop($fdnamerows);
	}

	$fdnamerows = json_encode($fdnamerows);
	mysqli_free_result($result);
?>
<div id="accordion1">
  <h3>Section 1</h3>
  <div>
    <p>Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.</p>
  </div>
  <h3>Section 2</h3>
  <div>
    <p>Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet purus. Vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor velit, faucibus interdum tellus libero ac justo. Vivamus non quam. In suscipit faucibus urna. </p>
  </div>
  <h3>Section 3</h3>
  <div>
    <p>Nam enim risus, molestie et, porta ac, aliquam ac, risus. Quisque lobortis. Phasellus pellentesque purus in massa. Aenean in pede. Phasellus ac libero ac tellus pellentesque semper. Sed ac felis. Sed commodo, magna quis lacinia ornare, quam ante aliquam nisi, eu iaculis leo purus venenatis dui. </p>
    <ul>
      <li>List item one</li>
      <li>List item two</li>
      <li>List item three</li>
    </ul>
  </div>
  <h3>Section 4</h3>
  <div>
    <p>Cras dictum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean lacinia mauris vel est. </p><p>Suspendisse eu nisl. Nullam ut libero. Integer dignissim consequat lectus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. </p>
  </div>
</div>
 
<script>
	var $fdNames = JSON.parse(<?php echo json_encode($fdnamerows) ?>);

  $(function() {
    var data = [
      { label: "anders", category: "" },
      { label: "andreas", category: "" },
      { label: "antal", category: "" },
      { label: "annhhx10", category: "Products" },
      { label: "annk K12", category: "Products" },
      { label: "annttop C13", category: "Products" },
      { label: "anders andersson", category: "People" },
      { label: "andreas andersson", category: "People" },
      { label: "andreas johnson", category: "People" }
    ];
 
    $( "#search" ).catcomplete({
      delay: 0,
	  minLength: 3,
      source: $fdNames
    });
  });

  </script>
 
</body>
</html>
