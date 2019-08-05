window.addEventListener("DOMContentLoaded", init, false);

function init(){
    document.getElementById("formInscription").addEventListener('submit', validerFormulaire, false);

}

function validerFormulaire(e){
    let erreur = false; 
    let nomUtilisateur = document.getElementById("txtUtilisateur").value;
    let motDePasse = document.getElementById("txtMotDePasse").value;
    let motDePasseRep = document.getElementById("txtMotDePasseRep").value;
    let prenom = document.getElementById("txtPrenom").value;
    let nom = document.getElementById("txtNom").value;
    let courriel = document.getElementById("txtCourriel").value;
    let courrielRegex = /^[a-z][a-z0-9\._\-]+@[a-z][a-z0-9\.\-]+\.[a-z]{2,11}$/i;
    let dateNaissance = document.getElementById("dateNaissance").value;
    let dateRegex = /^\d{4}-\d{2}-\d{2}$/;
    // source : https://stackoverflow.com/questions/18758772/how-do-i-validate-a-date-in-this-format-yyyy-mm-dd-using-jquery

    if ( nomUtilisateur.length == 0 ){ 
        document.getElementById("errUtilisateur").innerText = "*Ce champ ne doit pas être vide";
        erreur = true;
    }
    else{
        document.getElementById("errUtilisateur").innerText = "";
    }
    if ( motDePasse.length == 0 ){ 
        document.getElementById("errMotDePasse").innerText = "*Ce champ ne doit pas être vide";
        erreur = true;
    }
    else{
        document.getElementById("errMotDePasse").innerText = "";
    }
    if ( motDePasseRep.length == 0 ){ 
        document.getElementById("errMotDePasseRep").innerText = "*Ce champ ne doit pas être vide";
        erreur = true;
    }
    else if( !(motDePasse == motDePasseRep) ){
        document.getElementById("errMotDePasseRep").innerText = "*Les deux mots de passe ne sont pas identiques";
        erreur = true;
    }
    else{
        document.getElementById("errMotDePasseRep").innerText = "";
    }
    if ( prenom.length == 0 ){ 
        document.getElementById("errPrenom").innerText = "*Ce champ ne doit pas être vide";
        erreur = true;
    }
    else{
        document.getElementById("errPrenom").innerText = "";
    }
    if ( nom.length == 0 ){ 
        document.getElementById("errNom").innerText = "*Ce champ ne doit pas être vide";
        erreur = true;
    }
    else{
        document.getElementById("errNom").innerText = "";
    }
    if ( courriel.length == 0 ){ 
        document.getElementById("errCourriel").innerText = "*Ce champ ne doit pas être vide";
        erreur = true;
    }
    else if( !courrielRegex.test(courriel) ){
        document.getElementById("errCourriel").innerText = "*L'adresse courriel n'est pas valide";
        erreur = true;
    }
    else{
        document.getElementById("errCourriel").innerText = "";       
    }
    if( dateNaissance.length == 0){
        document.getElementById("errNaissance").innerText = "*Vous devez entrer une date (format : aaaa-mm-jj)";
        erreur = true;
    }
    else{
        // source : https://stackoverflow.com/questions/18758772/how-do-i-validate-a-date-in-this-format-yyyy-mm-dd-using-jquery
        if( dateNaissance.match(dateRegex) ){
            let date = new Date(dateNaissance);
            let dNum = date.getTime();

            if( !dNum && dNum !== 0 ){ // NaN value, Invalid date
                document.getElementById("errNaissance").innerText = "La date entrée n'existe pas";
                erreur = true;
            }
            else{
                if( dateNaissance > dateAujourdhui() ){
                    document.getElementById("errNaissance").innerText = "La date est dans le futur, go home time-traveler ;)";
                    erreur = true;
                }
                else{
                    document.getElementById("errNaissance").innerText = "";
                }
            }
        }
        else{
            document.getElementById("errNaissance").innerText = "Le format n'est pas valide, utilisez aaaa-mm-jj";
            erreur = true; 
        }
    }
    if ( compterCheckBoxes() == 0 ){
        document.getElementById("errInterets").innerText = "*Vous devez choisir au moins un élément";
        erreur = true;
    }
    else if ( compterCheckBoxes() > 2 ){
        document.getElementById("errInterets").innerText = "*Vous ne pouvez pas choisir plus de deux éléments";
        erreur = true;
    }
    else{
        document.getElementById("errInterets").innerText = "";
    }

    if ( erreur ){
        e.preventDefault(); 
    }
}
//https://hype.codes/how-get-current-date-javascript
function dateAujourdhui(){
    let aujourdhui = new Date();
    let jour = aujourdhui.getDate();
    let mois = aujourdhui.getMonth() + 1; 
    let annee = aujourdhui.getFullYear();

    if( jour < 10 ) {
        jour = '0' + jour;
    } 

    if( mois < 10 ) {
        mois = '0' + mois;
    } 
    aujourdhui = annee + '-' + mois + '-' + jour;
    return aujourdhui;
}
function compterCheckBoxes(){
    let total = 0;
    let groupeCheckbox = document.getElementById("interetsCheckboxes");
    groupeCheckbox = groupeCheckbox.getElementsByTagName("input");

    for(let i = 0 ; i < groupeCheckbox.length; i++) {
        if(groupeCheckbox[i].checked == true){
            total++;
        }
    }
    return total;
}
