window.addEventListener("DOMContentLoaded", init, false);
let imageQuantity = 4;
var numeroImage = 0;
let listeImages;
let VisionneuseAllume=false;

function init()
{
    listeImages = document.getElementById("thumbnails").getElementsByTagName("img");
    for (let i = 0;i < listeImages.length; i++)
    {
        listeImages[i].addEventListener("click",chargerImage,false);
    }   
    document.getElementById("visionneuse").addEventListener("click",visionneuse,false);
    document.getElementById("imagePrecedante").addEventListener("click",reculer,false);
	document.getElementById("imageProchaine").addEventListener("click",avancer,false);
    visionneuse();
    ((document.getElementsByClassName("selection")[0].src).substring(
        (document.getElementsByClassName("selection")[0].src).lastIndexOf("/")+1,
        (document.getElementsByClassName("selection")[0].src).lastIndexOf(".")));
}



function chargerImage(e)
{
    decadrage();
    e.target.className="selection";
    
    numeroImage=((document.getElementsByClassName("selection")[0].src).substring(
        (document.getElementsByClassName("selection")[0].src).lastIndexOf("/")+1 ,
        (document.getElementsByClassName("selection")[0].src).lastIndexOf("."))) ;
        document.getElementById("imageGrande").src = "images/" + numeroImage + ".png";
        reinitialisationMinuterie()
        
}

function decadrage(){
    highlighted = document.getElementsByClassName("selection")[0];
    highlighted.className="";
}

function reinitialisationMinuterie(){
    if (VisionneuseAllume) {
        clearInterval(visionneuseInterval);
        visionneuseInterval = setInterval(avancer, 4000);
    }
}


function avancer() 
{
    avancerIndexes();
    reinitialisationMinuterie()
    decadrage();
    document.getElementById("imageGrande").src = "images/" + numeroImage + ".png";
    listeImages[numeroImage].className="selection";
    
}

function reculer()
{
    reculerIndexes()
    reinitialisationMinuterie()
    decadrage();
    document.getElementById("imageGrande").src = "images/" + numeroImage + ".png";
    listeImages[numeroImage].className="selection";
}

function visionneuse()
{
    VisionneuseAllume= !VisionneuseAllume;
    if (VisionneuseAllume){
        visionneuseInterval = setInterval(avancer, 4000);
        document.getElementById("visionneuse").innerText = "Arreter la Visionneuse";
    }
    else{
        clearInterval(visionneuseInterval);
        document.getElementById("visionneuse").innerText = "Démarrer la Visionneuse";
    } 
}


function avancerIndexes() 
{
    numeroImage++;
	if (numeroImage == imageQuantity){
		numeroImage = 0;
	}
}

function reculerIndexes() 
{
    numeroImage--;
	if (numeroImage < 0){
		numeroImage = imageQuantity;
	}
}