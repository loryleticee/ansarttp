/**
 * Connection ajax
 * @returns {ActiveXObject|XMLHttpRequest|Boolean}
 * @author LETICEE Lory <loryleticee@gmail.com>
 */
function getXhr(){
                                var xhr = null; 
				if(window.XMLHttpRequest) 
				   xhr = new XMLHttpRequest(); 
				else if(window.ActiveXObject){ 
				   try {
			                xhr = new ActiveXObject("Msxml2.XMLHTTP");
			            } catch (e) {
			                xhr = new ActiveXObject("Microsoft.XMLHTTP");
			            }
				}
				else { 
				   alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest..."); 
				   xhr = false; 
				} 
                                return xhr;
			}

			function alterMat(i){
				var xhr = getXhr();
				xhr.onreadystatechange = function(){
					if(xhr.readyState == 4 && xhr.status == 200){
						leselect = xhr.responseText;
						document.getElementById('resultat').innerHTML = leselect;
					}
				}
				id = document.getElementById('id'+i).value;
				nom = document.getElementById('nomMat'+i).value;
				num = document.getElementById('numMat'+i).value;
				xhr.open("POST","vues/ajax/v_modifierMat.php",true);
				xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
				
				xhr.send("id="+id+"."+nom+"."+num);
                                           
			}

			function delMat(i){
				var xhr = getXhr();
				xhr.onreadystatechange = function(){
					if(xhr.readyState == 4 && xhr.status == 200){
						leselect = xhr.responseText;
						document.getElementById('resultat').innerHTML = leselect;
					}
				}
				if (confirm("Vous allez bientôt supprimer un engin...")) { // Clic sur OK supprimerSal(sal);}
					id = document.getElementById('id'+i).value;
					num = document.getElementById('numMat'+i).value;
					xhr.open("POST","vues/ajax/v_deleteMat.php",true);
					xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
					id = document.getElementById('id'+i).value;
					xhr.send("id="+id+'.'+num);
				}
            }

			function alterSalarie(i){
				var xhr = getXhr();
				xhr.onreadystatechange = function(){
					if(xhr.readyState == 4 && xhr.status == 200){
						leselect = xhr.responseText;
						document.getElementById('resultat').innerHTML = leselect;
					}
				}
				id = document.getElementById('id'+i).value;
				nom = document.getElementById('nom'+i).value;
				prenom = document.getElementById('prenom'+i).value;
				xhr.open("POST","vues/ajax/v_modifierSal.php",true);
				xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

				xhr.send("id="+id+"."+nom+"."+prenom);
                                           
			}

			function delSal(i){
				var xhr = getXhr();
				xhr.onreadystatechange = function(){
					if(xhr.readyState == 4 && xhr.status == 200){
						leselect = xhr.responseText;
						document.getElementById('resultat').innerHTML = leselect;
					}
				}
				if (confirm("Vous allez bientôt supprimer un salarié...")) { // Clic sur OK supprimerSal(sal);}
									
					xhr.open("POST","vues/ajax/v_deleteSal.php",true);
					xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
					id = document.getElementById('id'+i).value;
					xhr.send("id="+id);
				}
            }
                           			function alterTheme(i){
				var xhr = getXhr();
				xhr.onreadystatechange = function(){
					if(xhr.readyState == 4 && xhr.status == 200){
						leselect = xhr.responseText;
						document.getElementById('resultat').innerHTML = leselect;
					}
				}
				id = document.getElementById('id'+i).value;
				nom = document.getElementById('nomTheme'+i).value;
				xhr.open("POST","vues/ajax/v_modifierTheme.php",true);
				xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

				xhr.send("id="+id+"."+nom);
                                           
			}

			function delTheme(i){
				var xhr = getXhr();
				xhr.onreadystatechange = function(){
					if(xhr.readyState == 4 && xhr.status == 200){
						leselect = xhr.responseText;
						document.getElementById('resultat').innerHTML = leselect;
					}
				}
				if (confirm("Vous allez bientôt supprimer un theme...")) { // Clic sur OK supprimerSal(sal);}
									
					xhr.open("POST","vues/ajax/v_deleteTheme.php",true);
					xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
					id = document.getElementById('id'+i).value;
					xhr.send("id="+id);
				}
            }
			function alterDoc(i){
				var xhr = getXhr();
				xhr.onreadystatechange = function(){
					if(xhr.readyState == 4 && xhr.status == 200){
						leselect = xhr.responseText;
						document.getElementById('resultat').innerHTML = leselect;
					}
				}
				id = document.getElementById('id'+i).value;
				nom = document.getElementById('nomDoc'+i).value;
				xhr.open("POST","vues/ajax/v_modifierDoc.php",true);
				xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

				xhr.send("id="+id+"."+nom);
                                           
			}
			function delDoc(i){
				var xhr = getXhr();
				xhr.onreadystatechange = function(){
					if(xhr.readyState == 4 && xhr.status == 200){
						leselect = xhr.responseText;
						document.getElementById('resultat').innerHTML = leselect;
					}
				}
				if (confirm("Vous allez bientôt supprimer un document...")) { // Clic sur OK supprimerSal(sal);}
									
					xhr.open("POST","vues/ajax/v_deleteDoc.php",true);
					xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
					id = document.getElementById('id'+i).value;
					xhr.send("id="+id);
				}
            }
            			function alterGroup(i){
				var xhr = getXhr();
				xhr.onreadystatechange = function(){
					if(xhr.readyState == 4 && xhr.status == 200){
						leselect = xhr.responseText;
						document.getElementById('resultat').innerHTML = leselect;
					}
				}
				id = document.getElementById('id'+i).value;
				nom = document.getElementById('nomGroup'+i).value;
				xhr.open("POST","vues/ajax/v_modifierGroup.php",true);
				xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

				xhr.send("id="+id+"."+nom);
                                           
			}
			function delGroup(i){
				var xhr = getXhr();
				xhr.onreadystatechange = function(){
					if(xhr.readyState == 4 && xhr.status == 200){
						leselect = xhr.responseText;
						document.getElementById('resultat').innerHTML = leselect;
					}
				}
				if (confirm("Vous allez bientôt supprimer une entreprise...")) { // Clic sur OK supprimerSal(sal);}
									
					xhr.open("POST","vues/ajax/v_deleteGroup.php",true);
					xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
					id = document.getElementById('id'+i).value;
					xhr.send("id="+id);
				}
            }

			function delChant(i){
				var xhr = getXhr();
				xhr.onreadystatechange = function(){
					if(xhr.readyState == 4 && xhr.status == 200){
						leselect = xhr.responseText;
						document.getElementById('resultat').innerHTML = leselect;
					}
				}
				if (confirm("Vous allez bientôt supprimer un chantier...")) { // Clic sur OK supprimerSal(sal);}
				
					xhr.open("POST","vues/ajax/v_deleteChantier.php",true);
					xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
					id = document.getElementById('id'+i).value;
					xhr.send("id="+id);
				}
            }
                           function comfirmChant(idSal){
                           		if (confirm("Vous allez bientôt supprimer un salarié...")) { // Clic sur OK supprimerSal(sal);}
									supprimerChant(idSal);
								}
							}
      		function VerifForm(formulaire){
				adresse = formulaire.email.value;
				var place = adresse.indexOf("@",1);
				var point = adresse.indexOf(".",place+1);
				if ((place > -1)&&(adresse.length >2)&&(point > 1)){
					formulaire.submit();
					return(true);
				}
				else{
					alert('Entrez une adresse e-mail valide');
					return(false);
				}
			}
   
  			 function validation(f) {
 				 if (f.mdp.value == '' || f.mdp1.value == '') {
    				alert('Tous les champs ne sont pas remplis');
    				f.mdp.focus();
    				return false;
  				 }
  				else if (f.mdp.value != f.mdp1.value) {
    				alert('Ce ne sont pas les mêmes mots de passe!');
    				f.mdp.focus();
    				return false;
    			}
  				else if (f.mdp.value == f.mdp1.value) {
    				return true;
    			}
  				else {
    				f.mdp.focus();
    				return false;
    			}
  			}
       		function comfirmerOut() {
       			var xhr = getXhr();
				xhr.onreadystatechange = function(){
					if(xhr.readyState == 4 && xhr.status == 200){
						leselect = xhr.responseText;
						document.getElementById('contenu').innerHTML = leselect;
					}
				}
       			if (confirm("Voulez-vous vraiment quitter ?")) { 
      				deconnection();
      			 }
      		}
      		function deconnection(){
				var xhr = getXhr();
				xhr.onreadystatechange = function(){
					if(xhr.readyState == 4 && xhr.status == 200){
						leselect = xhr.responseText;
						document.getElementById('page').innerHTML = leselect;
					}
				}
				xhr.open("POST","vues/ajax/v_deconnexion.php",true);
				xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
				xhr.send();
            }
            

			  			function searchOuvrier(debut){
				var xhr = getXhr();
				xhr.onreadystatechange = function(){
					if(xhr.readyState == 4 && xhr.status == 200){
						leselect = xhr.responseText;
						document.getElementById('res').innerHTML = leselect;
					}
				}
				xhr.open("POST","vues/ajax/v_search_ouvrier.php",true);
				xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
				letta = debut;
				xhr.send("letta="+letta);
            }
            	function searchOuvrierAccueil(debut){
				var xhr = getXhr();
				xhr.onreadystatechange = function(){
					if(xhr.readyState == 4 && xhr.status == 200){
						leselect = xhr.responseText;
						document.getElementById('resAccueil').innerHTML = leselect;
					}
				}
				xhr.open("POST","vues/ajax/v_search_ouvrierAcceuil.php",true);
				xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
				letta = debut;
				xhr.send("letta="+letta);
            }
            			  		
            function dater(heure){
				var xhr = getXhr();
				xhr.onreadystatechange = function(){
					if(xhr.readyState == 4 && xhr.status == 200){
						leselect = xhr.responseText;
						document.getElementById('dater').innerHTML = leselect;
					}
				}
				xhr.open("POST","vues/ajax/v_dater.php",true);
				xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
				hour = heure;
				xhr.send("jour="+hour);
            }
           
            	function searchChantier(chantier){
				var xhr = getXhr();
				xhr.onreadystatechange = function(){
					if(xhr.readyState == 4 && xhr.status == 200){
						leselect = xhr.responseText;
						document.getElementById('chantier').innerHTML = leselect;
					}
				}
				xhr.open("POST","vues/ajax/v_search_chantier.php",true);
				xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
				lieu = chantier;
				xhr.send("lieu="+lieu);
            }
            function sendMail(m){
				var xhr = getXhr();
				xhr.onreadystatechange = function(){
					if(xhr.readyState == 4 && xhr.status == 200){
						leselect = xhr.responseText;
						document.getElementById('resultat').innerHTML = leselect;
					}
				}
				xhr.open("POST","vues/ajax/v_mail.php",true);
				xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
				msg = m;
				xhr.send("msg="+msg);
            }
            function addSalAccueil(idSal){
				var xhr = getXhr();
				xhr.onreadystatechange = function(){
					if(xhr.readyState == 4 && xhr.status == 200){
						leselect = xhr.responseText;
						document.getElementById('resultat').innerHTML = leselect;
					}
				}
				xhr.open("POST","vues/ajax/v_addSalAcc.php",true);
				xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
				id = idSal;
				xhr.send("id="+id);
            }
            function  changeListSal(idChant){
				var xhr = getXhr();
				xhr.onreadystatechange = function(){
					if(xhr.readyState == 4 && xhr.status == 200){
						leselect = xhr.responseText;
						document.getElementById('myAccueil').innerHTML = leselect;
					}
				}
				xhr.open("POST","vues/ajax/v_accuelListSal.php",true);
				xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
				id = idChant;
				xhr.send("id="+id);
            }
                        function getIdFiche(){
				var xhr = getXhr();
				xhr.onreadystatechange = function(){
					if(xhr.readyState == 4 && xhr.status == 200){
						leselect = xhr.responseText;
						document.getElementById('fiche').innerHTML = leselect;
					}
				}
				idChant=document.getElementById('listChantier').value;
				xhr.open("POST","vues/ajax/v_getIdFiche.php",true);
				xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
				id = idChant;
				xhr.send("id="+id);
            }
            function alterChant(i){
				var xhr = getXhr();
				xhr.onreadystatechange = function(){
					if(xhr.readyState == 4 && xhr.status == 200){
						leselect = xhr.responseText;
						document.getElementById('resultat').innerHTML = leselect;
					}
				}
				xhr.open("POST","vues/ajax/v_modifChantier.php",true);
				xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
				id = document.getElementById('id'+i).value;
				nom = document.getElementById('nomChant'+i).value;
				num = document.getElementById('numChant'+i).value;
				xhr.send("id="+id+'.'+nom+'.'+num);
                                           
			}
           function montrerChampPass(){
				var xhr = getXhr();
				xhr.onreadystatechange = function(){
					if(xhr.readyState == 4 && xhr.status == 200){
						leselect = xhr.responseText;
						document.getElementById('logOn').innerHTML = leselect;
					}
				}
				libelle = document.getElementById('type').value;
				alert(libelle);
				xhr.open("POST","vues/ajax/v_logOn.php",true);
				xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
				xhr.send();

           }
            function showMonth(){
				var xhr = getXhr();
				xhr.onreadystatechange = function(){
					if(xhr.readyState == 4 && xhr.status == 200){
						leselect = xhr.responseText;
						document.getElementById('lstMounth').innerHTML = leselect;
					}
				}
				idF=document.getElementById('listYear').value;
				xhr.open("POST","vues/ajax/v_month.php",true);
				xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
				xhr.send("idF="+idF);
           }
            function showNum(){
				var xhr = getXhr();
				xhr.onreadystatechange = function(){
					if(xhr.readyState == 4 && xhr.status == 200){
						leselect = xhr.responseText;
						document.getElementById('listFiche').innerHTML = leselect;
					}
				}
				mois=document.getElementById('listDate').value;
				xhr.open("POST","vues/ajax/v_day.php",true);
				xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
				xhr.send("mois="+mois);
           }
           function showFiche(){
				var xhr = getXhr();
				xhr.onreadystatechange = function(){
					if(xhr.readyState == 4 && xhr.status == 200){
						leselect = xhr.responseText;
						document.getElementById('listShowFiche').innerHTML = leselect;
					}
				}
				numFicheAS=document.getElementById('listNum').value;
				xhr.open("POST","vues/ajax/v_showFiche.php",true);
				xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
				xhr.send("nFAS="+numFicheAS);
           }
           
            function supSalToAsc(i){
				var xhr = getXhr();
				xhr.onreadystatechange = function(){
					if(xhr.readyState === 4 && xhr.status === 200){
						leselect = xhr.responseText;
						document.getElementById('answaSupSal').innerHTML = leselect;
					}
				}
				ficheAsc=document.getElementById('ficheAsc').value;
				nomSal=document.getElementById('nomSal'+i).value;
				prenomSal=document.getElementById('prenomSal'+i).value;
				dateAsc=document.getElementById('dateAsc').value;
				if (confirm("Vous allez bientôt supprimer "+nomSal+' '+prenomSal+"...")) {			
					xhr.open("POST","vues/ajax/v_deleteSalToAsc.php",true);
					xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
					xhr.send("nomSal="+nomSal+'.'+ficheAsc+'.'+prenomSal+'.'+dateAsc);
				}
           }

            function saveSign(o){
				var xhr = getXhr();
                xhr.onreadystatechange = function(){
                    if(xhr.readyState === 4 && xhr.status === 200){
                        leselect = xhr.responseText;
                        document.getElementById('resultat').innerHTML = leselect;
                    }
                }
                ////la chaine o sera envoyé sans les signe plus qui la contient 
		//Il faudra explosé la chaine au espace vide et y rajouter les plus manquant
		visa = o;//le contenu en base 64 de l'image png de a signature
		xhr.open("POST","vues/ajax/v_addSignature.php",true);
		xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		xhr.send("visa="+visa);				
           }
             function sureName(v){
				var xhr = getXhr();
				xhr.onreadystatechange = function(){
					if(xhr.readyState == 4 && xhr.status == 200){
						leselect = xhr.responseText;
						document.getElementById('resultat').innerHTML = leselect;
					}
				}
					xhr.open("POST","vues/ajax/v_changeUser.php",true);
					xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
					xhr.send("user="+v);				
            }
            function createSessionChantier(v){
				var xhr = getXhr();
				xhr.onreadystatechange = function(){
					if(xhr.readyState == 4 && xhr.status == 200){
						leselect = xhr.responseText;
						document.getElementById('resultat').innerHTML = leselect;
					}
				}
					xhr.open("POST","vues/ajax/v_sessionChantier.php",true);
					xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
					xhr.send("chant="+v);				
            }
            function addOdaSal(){
				var xhr = getXhr();
				xhr.onreadystatechange = function(){
					if(xhr.readyState == 4 && xhr.status == 200){
						leselect = xhr.responseText;
						document.getElementById('resAccueil').innerHTML = leselect;
					}
				}
					xhr.open("POST","vues/ajax/v_addOdaSal.php",true);
					xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
					xhr.send();				
            }
            function createSDate(date){
				var xhr = getXhr();
				xhr.onreadystatechange = function(){
					if(xhr.readyState == 4 && xhr.status == 200){
						leselect = xhr.responseText;
						document.getElementById('resultat').innerHTML = leselect;
					}
				}
					xhr.open("POST","vues/ajax/v_createDate.php",true);
					xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
					xhr.send("date="+date);				
            }