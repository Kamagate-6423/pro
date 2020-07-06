$(function(){
	
	//Permettre d'ajouter des produits dans le panier
			$(".ajoutPanier").click(function(event){
				event.preventDefault();
				url=$(this).attr('href');
				$.get(url,{},function(data){
					if(data.message){
							//alertify.success(data.message);
					alertify.notify(data.message, 'success', 4, function(){  console.log('dismissed'); });
						//if(confirm(data.message+ ". Voulez vous consulter votre panier?")){
						//	location.href='../view/panier.php';
						//}else{
							$("#total").empty().append(data.total);
							$("#compt").empty().append(data.compt);
						//}
					}
				},"json");
				return false;
			});
			
	// Actualisation du panier
		$(".inputPanier").change(function(){
			$(".actualise").css('display','block');
			$(".confirmePanier").attr('disabled', 'disabled').css('background-color', 'red');
			$(".dePanier").removeAttr("href");
			$(".confirmPanier").text("actualiser d'abord");
		});
		
	// Supprimer la commander
	$(".annuleCom").on('click',function(event){
		if(confirm("Souhaitez vous annuler votre commande?")){
			location.href='../index.php';
		}else{
			event.preventDefault();
		}
	})
		

			
	//Pour alerter une stock epuisé
			$(".ajoutPanierNon").click(function(event){
				event.preventDefault();
					alertify.alert('Le stock est epuisé.')
				return false;
			});
			
			
	//pour alerter que votre panier est vide
			$(".dePanier").click(function(event){
				event.preventDefault();
				url=$(this).attr('href');
				$.get(url,{},function(data){
					if(data.compt>0){
						location.href='../view/commander.php';
					}else{
						alertify.alert("Votre panier est vide");
					}
				},"json");
				return false;
			});
			
			
			$(".comVal").on('submit',function(event){
					alert('Votre commande a bien été enregistré');
				//return false;
			});
			
		// Pour vider votre panier une fois deconnecter
		
		$('.deconnecter').on('click',function(){
			$('#total').text("");
			$('#compt').text("");
		});
		
		///////La partie formulaire//////
		
		$('.field').focusin(function(){
			$(this).css('background-color', 'RGBa(24,242,16,0.4)');
		});
		$('.field').focusout(function(){
			$(this).css('background-color', 'RGBa(24,242,16,0.2)');
		})
		$('input').blur(function(){
			if($(this).val()==''){
				$(this).css('border','2px solid red');
			}else{
				$(this).css('border','1px solid #BBBBBB');
			}
		});
		
		
		
		// Verifier si les mots de passes sont identiques///
		$('.pass2').blur(function(){
			
			var pass1= $('.pass1').val();
			var pass2= $('.pass2').val();
			if( pass1 !== pass2 ){
				$('.passDifferent').css('display','block');
			}else {
				$('.passDifferent').css('display','none');
			}
		})
		
		// alert pour les champs non renseignés de la connexion
		$('.connexion1').on('click', function(){
			
			if($('#telCli1').val()==""){
			$('.telCli').text("Ce champ ne doit pas être vide").css('color','red');
			}else{
				$('.telCli').text("");
			}
			
			if($('#passCli1').val()==""){
			$('.passCli').text("Ce champ ne doit pas être vide").css('color','red');
			}else{
				$('.passCli').text("");
			}
		})
		
		// alert pour les champs non renseignés de l'inscription
		$('.inscription1').on('click', function(){
			
			if($('#nomCli').val()==""){
			$('.nomCli').text("Ce champ ne doit pas être vide").css('color','red');
			}else{
				$('.nomCli').text("");
			}
			
			if($('#prenomCli').val()==""){
			$('.prenomCli').text("Ce champ ne doit pas être vide").css('color','red');
			}else{
				$('.prenomCli').text("");
			}
			
			if($('#emailCli').val()==""){
			$('.emailCli').text("Ce champ ne doit pas être vide").css('color','red');
			}else{
				$('.emailCli').text("");
			}
			
			if($('#telCli').val()==""){
			$('.telCli').text("Ce champ ne doit pas être vide").css('color','red');
			}else{
				$('.telCli').text("");
			}
			
			if($('#passCli').val()==""){
			$('.passCli').text("Ce champ ne doit pas être vide").css('color','red');
			}else{
				$('.passCli').text("");
			}
			
			if($('#passCliConf').val()==""){
			$('.pass2Cli').text("Ce champ ne doit pas être vide").css('color','red');
			}else{
				$('.pass2Cli').text("");
			}
			
			if($('#adresseCli').val()==""){
			$('.adresseCli').text("Ce champ ne doit pas être vide").css('color','red');
			}else{
				$('.adresseCli').text("");
			}
		})
		
		////admin////
		
		$('.adminPro a').click(function(event){
			event.preventDefault();
		})
		
		});