var dictee= "Un souper imparfait";

// chargement de la voix

   console.log(window.speechSynthesis.getVoices());

// stoi chargement de la voix

function comparer(texte)
{

	var compteur,dictee_tab,texte_tab,regexp;
	regexp= new RegExp("[ !?,;\.]+", "g");
	dictee=dictee.toString();
	dictee=dictee.toLowerCase();
	texte=texte.value;
	texte=texte.toString();
	texte=texte.toLowerCase();
	texte=texte.trim();//enleve les espaces au debut et à la fin parce que sinon ça casse tout
	dictee_tab=dictee.split(regexp); //separe selon la regexp et met tout dans un tableau
	texte_tab=texte.split(regexp);//separe selon la regexp et met tout dans un tableau
	//comparaison des 2 tableaux
	if (dictee_tab.length>texte_tab.length)
	{
		alert("T as oublié un ou plusieurs, sois attentif un peu !");
	}
	else if (dictee_tab.length<texte_tab.length)
	{
		alert("T as ajouté un ou plusieurs, sois attentif un peu !");
	}
	else
	{
		compteur=0;
	for (i=0;i<=dictee.length;i++)
	{
		if (dictee_tab[i]!=texte_tab[i])
		{
			compteur++;
		}
	}
	//Nombre de fautes
	alert("tu as fait "+compteur+" faute(s)");
	}	
	
}

function load_home(){
            document.getElementById("dictee").innerHTML='<object type="text/html" data="html/accueil.html" ></object>';
  }

