<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


<body onload="myFunction()">

  <button onclick="display()">Show</button>

  <input id="para1" value="" />
  <input id="para2" value="" style="display:none;" data-display="0" />

</body>


<script>

function myFunction() 
{
  var str="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";



  var res1 = str.substr(0, 100);
  var res2 = str.substr(101, 100000);
  $('#para1').val(res1);
}

function display()
{
  if($('#para2').attr('data-display') == 0)
  {
    $('#para2').data('display',1);
    $('#para2').val(res2);
    $('#para2').show();
  }
  else
  {
    $('#para2').hide();
  }
}


</script>