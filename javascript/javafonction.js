function validateForm() {
  var x, text;

  // Get the value of the input field with id="numb"
  x = document.getElementById("vinnumber").value;

  // If x is Not a Number or less than one or greater than 10
  if (isNaN(x) || x.length < 11 || x.length > 17) {
    text = "Input not valid";
  } else {
    text = "Input OK";
  }
  document.getElementById("demo").innerHTML = text;
}
function slide()
{
   var elem=document.getElementById('myAnimation');
   var pos=0;
    var id = setInterval(frame, 10);
  function frame() {
    if (pos == 250) {
      clearInterval(id);
    } else {
      pos++; 
      elem.style.left = pos + 'px'; 
    }
  }
}

function display()
{
    
     var x = document.getElementById("show");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
 function displayNextImage() {
          x = (x === images.length - 1) ? 0 : x + 1;
          document.getElementById("contain").style.backgroundImage = images[x];
      }
      function changeImage() {
          setInterval(displayNextImage, 3000);
      }

      var images = [], x = -1;
      images[0] = "url('images/oilchange.jpg')"; 
      images[1] = "url('images/tirechange.jpg')";
      images[2] = "url('images/man2.jpg')";
      images[3]="url('images/nicecar.jpg')";
      //fetch an object
      function fetchSomething()
      {
          fetch("images/emaillogo.png").then(response=>{console.log(response);return response.blob();})
                  .then(blob=>{
                      console.log(blob);
          document.getElementById('email1').src=URL.createObjectURL(blob);
          }).catch (error=>{console.error(error);});          
      }
      //Async
      async function asyncMeth()
      {
          const response= await fetch('images/new.jpg');
          const blob=await response.blob();
          document.getElementById('logo').src=URL.createObjectURL(blob);
      }
      
      function validateVin()
      {
          var b=false;
          var x= document.getElementById("vinnumber").value;
          if(!(x.length>11 && x.length<18))
          {
              document.getElementByName("vin2").style.color=red;
          }
          else
          {
              document.getElementByName("vin2").style.color=blue;
          }
          
      }