function setbackground()
{
window.setTimeout( "setbackground()", 7000); // 5000 milliseconds delay

var index = Math.round(Math.random() * 3);

var ImagePath = "Stylesheet/Afbeeldingen/Profile/Random1.png"; // default image

if(index == 1)
ImagePath = "Stylesheet/Afbeeldingen/Profile/Random1.png"; 
if(index == 2)
ImagePath = "Stylesheet/Afbeeldingen/Profile/Random2.png";
if(index == 3)
ImagePath = "Stylesheet/Afbeeldingen/Profile/Random3.png"; 
document.getElementsByClassName("sitebutton")[0].style.backgroundImage="url('"+ ImagePath+ "')";
    
}
