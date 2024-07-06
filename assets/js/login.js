$(document).ready(function(){
    //called when key is pressed in textbox
   const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

   $("#name").on("focusout", function (e) {
       //if the letter is not digit then display error and don't type anything
       //console.log(e.target.value);
    if(e.target.value.match(emailPattern)) {
          //console.log("Match");
          $(".invalid-feedback").fadeOut("slow");
        return true;
      }else{
        //display error message
        //console.log("Not Match");
        $(".invalid-feedback").html("Email is not valid").show();
        return false;
      }        
  });
});