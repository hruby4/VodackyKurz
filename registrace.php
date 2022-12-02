<!DOCTYPE html>
<html>
<head>
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Registrace</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>

  setInterval(function() {
    
      $.ajax({url: "messages.txt", success: function(result){
          $("#messages").html(result);
          console.log("loaded: " + result);
      }});


  }, 1000);


  </script>
</head>
<body class="bg-slate-300">

<form action="sendMessage.php" method="post" id="searchForm" class="bg-primary w-1/2 mx-auto mt-20 px-20 py-20 grid grid-cols-1 gap-y-12" style="" >
      <div class="form-group" class="">
        <label class="text-white font-semibold" for="nick" >Jméno:</label>
        <input class="form-control" type="text" name="nick" id="nick" pattern="^[A-ZĚŠČŘŽÝÁÍÉa-zěščřžýáíé]{1,20}$" required>
      </div>
      <div class="form-group" class="">
        <label class="text-white font-semibold" for="prijmeni">Příjmení:</label>
        <input class="form-control" type="text" name="prijmeni" id="prijmeni" pattern="^[A-ZĚŠČŘŽÝÁÍÉa-zěščřžýáíé]{1,20}$" required>
      </div>
      <div class="form-group" class="">
        <label class="text-white font-semibold" for="class">Třída:</label>
        <select class="form-control" name="class" id="class">
          <option value="C1a">C1a</option>
          <option value="C1b">C1b</option>
          <option value="C2a">C2a</option>
          <option value="C2b">C2b</option>
          <option value="C3b">C3b</option>
          <option value="C3b">C3b</option>
          <option value="C4b">C4b</option>
          <option value="C4b">C4b</option>
          <option value="E1">E1</option>
          <option value="E2">E2</option>
          <option value="E3">E3</option>
          <option value="E4">E4</option>
        </select>
      </div>
      <div class="form-group">
        <label class="text-white font-semibold" for="je_plavec">Jste plavec?</label>
        <select class="form-control" name="je_plavec" id="je_plavec">
        <option value="Ano">Ano</option>
        <option value="Ne">Ne</option>
        </select>
      </div>
      <div class="form-group">
        <label class="text-white font-semibold" for="kanoe_kamarad">S kým chcete být na lodi(Jméno,Příjmení):</label>
        <input class="form-control" type="text" name="kanoe_kamarad" pattern="^[A-ZĚŠČŘŽÝÁÍÉa-zěščřžýáíé]+\s[A-ZĚŠČŘŽÝÁÍÉa-zěščřžýáíé]+$" id="kanoe_kamarad" >
      </div>
      <div class="form-group">
        <input class="form-control btn hover:bg-blue-800 bg-blue-900 text-white text-lg font-semibold"  type="submit" value="Poslat">
      </div>
      <div class="form-group">
        <a class="form-control btn btn-danger" href="index.php">Zpět</a>
      </div>
</form>

<div id="messages"></div>

<script>
  $("#searchForm").submit(function( event ) {
 
 // Stop form from submitting normally
 event.preventDefault();

 // Get some values from elements on the page:
 var $form = $( this ),
    nickprijmeniPattern = "^[A-ZĚŠČŘŽÝÁÍÉa-zěščřžýáíé]{1,20}$";
    kamaradPattern = "^[A-ZĚŠČŘŽÝÁÍÉa-zěščřžýáíé]+\s[A-ZĚŠČŘŽÝÁÍÉa-zěščřžýáíé]+$";
    nick = $form.find( "input[name='nick']" ).val(),
    prijmeni = $form.find( "input[name='prijmeni']" ).val(),
    trida = $form.find( "select[name='class']" ).val(),
    plavec = $form.find( "select[name='je_plavec']" ).val(),
    kamarad = $form.find( "input[name='kanoe_kamarad']" ).val(),
    url = $form.attr( "action" );


   if (nickprijmeniPattern.test(nick) == true && nickprijmeniPattern.test(prijmeni) == true && kamaradPattern.test() == true)
   {
    var posting = $.post( url, { nick: nick,prijmeni: prijmeni,trida:trida, je_plavec : plavec, kanoe_kamarad:kamarad, } );
    posting.done(function( data ) {
    alert("odeslano!");
    });
   }
 


 
});
</script>

</body>
</html>
