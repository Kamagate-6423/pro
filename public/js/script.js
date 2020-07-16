$(function(){
	
	//Permettre d'ajouter des produits dans le panier
			$(".ajoutPanier").click(function(event){
				event.preventDefault();
				url=$(this).attr('href');
				$.get(url,{},function(data){
					if(data.message){
							//alertify.success(data.message);
					alertify.notify(data.message, 'success', 4, function(){  console.log('dismissed'); });
							$("#total").empty().append(data.total);
							$("#compt").empty().append(data.compt);
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

			
	//Pour alerter un stock epuisé
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
						$(".panierVide").css("display","block");
					}
				},"json");
				return false;
			});
			
			
	// la validation de commande
		if($('.compt').text()==0){
			$(".comVal").attr("disabled","disabled");
			$(".comVal").attr("class","btn btn-default");	
		}
		
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
				$('#passCliDifferent').css('display','block');
			}else {
				$('#passCliDifferent').css('display','none');
			}
		})
		
		$('#passe3').blur(function(){
			
			var passe2= $('#passe2').val();
			var passe3= $('#passe3').val();
			if( passe2 !== passe3 ){
				$('#passe2DifPasse3').css('display','block');
			}else {
				$('#passe2DifPasse3').css('display','none');
			}
		})
		
		// alert pour les champs non renseignés de la connexion
		$('.connexion1').on('click', function(){
			
			if($('#telCli1').val()==""){
			$('.telCli1').text("Ce champ ne doit pas être vide").css('color','red');
			}else{
				$('.telCli1').text("");
			}
			
			if($('#passCli1').val()==""){
			$('.passCli1').text("Ce champ ne doit pas être vide").css('color','red');
			}else{
				$('.passCli1').text("");
			}
		})
		
		// alert mot de passe oublier
		$('.passOublier').on('click', function(){
			
			if($('#nom').val()==""){
			$('.nom').text("Ce champ ne doit pas être vide").css('color','red');
			}else{
				$('.nom').text("");
			}
			
			if($('#tel').val()==""){
			$('.tel').text("Ce champ ne doit pas être vide").css('color','red');
			}else{
				$('.tel').text("");
			}
		})
		
		// alert modifier mot de passe
		$('.passChange').on('click', function(){
			
			if($('#tel1').val()==""){
			$('.tel1').text("Ce champ ne doit pas être vide").css('color','red');
			}else{
				$('.tel1').text("");
			}
			
			if($('#passe1').val()==""){
			$('.passe1').text("Ce champ ne doit pas être vide").css('color','red');
			}else{
				$('.passe1').text("");
			}
			
			if($('#passe2').val()==""){
			$('.passe2').text("Ce champ ne doit pas être vide").css('color','red');
			}else{
				$('.passe2').text("");
			}
			
			if($('#passe3').val()==""){
			$('.passe3').text("Ce champ ne doit pas être vide").css('color','red');
			}else{
				$('.passe3').text("");
			}
		})
		
		// verifier si le numero d'inscription est au bon format de CI
		$('.inscrireTel').blur(function(){
			var verifie = /^\+?[0-9]{8,13}$/;
			var telCli = $('.inscrireTel').val();
			
			if(telCli==""){
				$('.telCli').text("Ce champ ne doit pas être vide").css('color','red');
				$('.inscrireSubmit').prop("disabled", false);
			}else{
				if(verifie.test(telCli)){
					$('.telCli').text("");
					telCli="";
					$('.inscrireSubmit').prop("disabled", false);
				}else{
					$('.telCli').text("Votre numero n'est pas au bon format de la Côte d'Ivoire").css('color','orange');
					$('.inscrireSubmit').attr('disabled','disabled');
				}
			}
		}
		)
		
		// alert pour les champs non renseignés de l'inscription
		$('.inscrireSubmit').on('click', function(){
			
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
			
			var verifie = /^\+?[0-9]{8,13}$/;
			var telCli = $('#telCli').val();
			
			if(telCli==""){
			$('.telCli').text("Ce champ ne doit pas être vide").css('color','red');
			}else{
				if(verifie.test(telCli)){
					$('.telCli').text("");
					telCli="";
				}else{
					$('.telCli').text("Votre numero n'est pas au bon format de la Côte d'Ivoire").css('color','orange');
				}
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
		
		// alert pour les champs non renseignés lors de la validation de la commande
		
		$('#comVal').on('click', function(){
			
			if($('#lieux').val()==""){
			$('.lieuxCom').text(" Ce champ ne doit pas être vide").css('color','red');
			}else{
				$('.lieuxCom').text("");
			}
			
			if($('#date').val()==""){
			$('.dateCom').text(" Ce champ ne doit pas être vide").css('color','red');
			}else{
				$('.dateCom').text("");
			}
			
			if($('#heure').val()==""){
			$('.heureCom').text(" Ce champ ne doit pas être vide").css('color','red');
			}else{
				$('.heureCom').text("");
			}
		})
		
		//Mot de passe oublier
		$(".ouvrePassOublier").click(function(){
			$(".motDePassOubli").css("display","block");
		})
		$(".fermer").click(function(){
			$(".motDePassOubli").css("display","none");
		})
		
		$(".ouvrePassChanger").click(function(){
			$(".motDePassChanger").css("display","block");
		})
		$(".fermer1").click(function(){
			$(".motDePassChanger").css("display","none");
		})
		
		
		////admin////
		
		$('.adminPro a').click(function(event){
			event.preventDefault();
		})
		$("#adminAlert1").click(function(){
			$(".adminAlert1").css("display","none");
		})
		
		
		
		});