$(document).ready(function(){
   const FloatWithTwoDecimalPlaces = /[0-9\.]/;
   const OnlyLetters = /^[a-zA-Z.\s ]+$/;
   const LettersAndNumbers = /^[a-zA-Z0-9-\s]+$/;

   /********* EDUCATOR *********/
   $("#educFirstname").on("focusout", function (e) {
    if(e.target.value.match(OnlyLetters)) {
          //console.log("Match");
          e.target.classList.remove('is-invalid');
          e.target.classList.add('is-valid');
          $(".firstname").fadeOut("slow");
        return true;
    }else{
        e.target.classList.remove('is-valid');
        e.target.classList.add('is-invalid');
        $(".firstname").html("Invalid Firstname.").show();
        return false;
    }        
    });

    $("#educLastname").on("focusout", function (e) {    
    if(e.target.value.match(OnlyLetters)) {
       //console.log("Match");
        e.target.classList.remove('is-invalid');
        e.target.classList.add('is-valid');
       $(".lastname").fadeOut("slow");
        return true;
    }else{
        e.target.classList.remove('is-valid');
        e.target.classList.add('is-invalid');
        $(".lastname").html("Invalid Lastname.").show();
        return false;
    }        
    });

    $("#editEducFirstname").on("focusout", function (e) {
        if(e.target.value.match(OnlyLetters)) {
              //console.log("Match");
              e.target.classList.remove('is-invalid');
              e.target.classList.add('is-valid');
              $(".firstname").fadeOut("slow");
            return true;
            }else{
                e.target.classList.remove('is-valid');
                e.target.classList.add('is-invalid');
                $(".firstname").html("Invalid Firstname.").show();
                return false;
            }        
        });
    
        $("#editEducLastname").on("focusout", function (e) {        
        if(e.target.value.match(OnlyLetters)) {
           //console.log("Match");
            e.target.classList.remove('is-invalid');
            e.target.classList.add('is-valid');
            $(".lastname").fadeOut("slow");
            return true;
            }else{
                e.target.classList.remove('is-valid');
                e.target.classList.add('is-invalid');
                $(".lastname").html("Invalid Lastname.").show();
                return false;
            }        
        });

        $("#educFirstname").keypress(function(event) {
        var char = event.key;
        if (!(OnlyLetters.test(char))) {
            event.preventDefault();
            }
        });

        $("#educLastname").keypress(function(event) {
        var char = event.key;
        if (!(OnlyLetters.test(char))) {
            event.preventDefault();
            }
        });

        $("#editEducFirstname").keypress(function(event) {
            var char = event.key;
            if (!(OnlyLetters.test(char))) {
                event.preventDefault();
                }
            });
    
        $("#editEducLastname").keypress(function(event) {
        var char = event.key;
        if (!(OnlyLetters.test(char))) {
            event.preventDefault();
            }
        });

  /********* EDUCATOR *********/

  /********* COURSE *********/
    $("#courseCode").on("focusout", function (e) {
    if(e.target.value.match(LettersAndNumbers)) {
        //console.log("Match");
        e.target.classList.remove('is-invalid');
        e.target.classList.add('is-valid');
        $(".course-code").fadeOut("slow");
        return true;
    }else{
        e.target.classList.remove('is-valid');
        e.target.classList.add('is-invalid');
        $(".course-code").html("Invalid Course Code.").show();
        return false;
    }        
    });

    $("#courseDesc").on("focusout", function (e) {
    if(e.target.value.match(LettersAndNumbers)) {
        //console.log("Match");
        e.target.classList.remove('is-invalid');
        e.target.classList.add('is-valid');
        $(".course-desc").fadeOut("slow");
    return true;
    }else{
        e.target.classList.remove('is-valid');
        e.target.classList.add('is-invalid');
        $(".course-desc").html("Invalid Course Description.").show();
        return false;
    }        
    });

    $("#editCourseCode").on("focusout", function (e) {
        if(e.target.value.match(LettersAndNumbers)) {
            //console.log("Match");
            e.target.classList.remove('is-invalid');
            e.target.classList.add('is-valid');
            $(".course-code").fadeOut("slow");
            return true;
        }else{
            e.target.classList.remove('is-valid');
            e.target.classList.add('is-invalid');
            $(".course-code").html("Invalid Course Code.").show();
            return false;
        }        
        });
    
        $("#editCourseDesc").on("focusout", function (e) {
        if(e.target.value.match(LettersAndNumbers)) {
            //console.log("Match");
            e.target.classList.remove('is-invalid');
            e.target.classList.add('is-valid');
            $(".course-desc").fadeOut("slow");
        return true;
        }else{
            e.target.classList.remove('is-valid');
            e.target.classList.add('is-invalid');
            $(".course-desc").html("Invalid Course Description.").show();
            return false;
        }        
        });

        $("#courseCode").keypress(function(event) {
        var char = event.key;
        if (!(LettersAndNumbers.test(char))) {
            event.preventDefault();
            }
        });

        $("#courseDesc").keypress(function(event) {
        var char = event.key;
        if (!(LettersAndNumbers.test(char))) {
            event.preventDefault();
            }
        });

        $("#editCourseCode").keypress(function(event) {
        var char = event.key;
        if (!(LettersAndNumbers.test(char))) {
            event.preventDefault();
            }
        });

        $("#editCourseDesc").keypress(function(event) {
        var char = event.key;
        if (!(LettersAndNumbers.test(char))) {
            event.preventDefault();
            }
        });

    /********* COURSE *********/

    /********* ROOM *********/

    $("#roomNum").on("focusout", function (e) {
    if(e.target.value.match(LettersAndNumbers)) {
        //console.log("Match");
        e.target.classList.remove('is-invalid');
        e.target.classList.add('is-valid');
        $(".room-num").fadeOut("slow");
    return true;
    }else{
        e.target.classList.remove('is-valid');
        e.target.classList.add('is-invalid');
        $(".room-num").html("Invalid Room Number.").show();
        return false;
    }        
    });

    $("#roomName").on("focusout", function (e) {
     if(e.target.value.match(LettersAndNumbers)) {
           //console.log("Match");
           e.target.classList.remove('is-invalid');
           e.target.classList.add('is-valid');
           $(".room-name").fadeOut("slow");
         return true;
         }else{
            e.target.classList.remove('is-valid');
            e.target.classList.add('is-invalid');
            $(".room-name").html("Invalid Room Description.").show();
            return false;
         }        
     });

     $("#flrArea").on("focusout", function (e) {
        if(e.target.value.match(FloatWithTwoDecimalPlaces)) {
           //console.log("Match");
           e.target.classList.remove('is-invalid');
           e.target.classList.add('is-valid');
           $(".flrArea").fadeOut("slow");
         return true;
         }else{
            e.target.classList.remove('is-valid');
            e.target.classList.add('is-invalid');
            $(".flrArea").html("Invalid Floor Area.").show();
            return false;
         }        
     });

     $("#editRoomNum").on("focusout", function (e) {
        if(e.target.value.match(LettersAndNumbers)) {
            //console.log("Match");
            e.target.classList.remove('is-invalid');
            e.target.classList.add('is-valid');
            $(".room-num").fadeOut("slow");
        return true;
        }else{
            e.target.classList.remove('is-valid');
            e.target.classList.add('is-invalid');
            $(".room-num").html("Invalid Room Number.").show();
            return false;
        }        
        });
    
        $("#editRoomName").on("focusout", function (e) {     
         if(e.target.value.match(LettersAndNumbers)) {
               //console.log("Match");
               e.target.classList.remove('is-invalid');
               e.target.classList.add('is-valid');
               $(".room-name").fadeOut("slow");
             return true;
             }else{
                e.target.classList.remove('is-valid');
                e.target.classList.add('is-invalid');
                $(".room-name").html("Invalid Room Description.").show();
                return false;
             }        
         });
    
         $("#editFlrArea").on("focusout", function (e) {     
         if(e.target.value.match(FloatWithTwoDecimalPlaces)) {
               //console.log("Match");
               e.target.classList.remove('is-invalid');
               e.target.classList.add('is-valid');
               $(".flrArea").fadeOut("slow");
             return true;
             }else{
                e.target.classList.remove('is-valid');
                e.target.classList.add('is-invalid');
                $(".flrArea").html("Invalid Floor Area.").show();
                return false;
             }        
         });

        $("#roomNum").keypress(function(event) {
        var char = event.key;
        if (!(LettersAndNumbers.test(char))) {
            event.preventDefault();
            }
        });

        $("#roomName").keypress(function(event) {
        var char = event.key;
        if (!(LettersAndNumbers.test(char))) {
            event.preventDefault();
            }
        });

        $("#flrArea").keypress(function(event) {
        var char = event.key;
        if (!(FloatWithTwoDecimalPlaces.test(char))) {
            event.preventDefault();
            }
        });

        $("#editRoomNum").keypress(function(event) {
        var char = event.key;
        if (!(LettersAndNumbers.test(char))) {
            event.preventDefault();
            }
        });

        $("#editRoomName").keypress(function(event) {
        var char = event.key;
        if (!(LettersAndNumbers.test(char))) {
            event.preventDefault();
            }
        });

        $("#editFlrArea").keypress(function(event) {
        var char = event.key;
        if (!(FloatWithTwoDecimalPlaces.test(char))) {
            event.preventDefault();
            }
        });

    /********* ROOM *********/
});