
<style media="screen">
/* Coded with love by Mutiullah Samim */
body,
html {
  margin: 0;
  padding: 0;
  height: 100%;
  background-image: url(<?=base_url('assets/img/31799.jpg')?>);
}

.user_card {
  height: 380px;
  width: 370px;
  margin-top: auto;
  margin-bottom: auto;
  background: #1E90FF;
  position: relative;
  display: flex;
  justify-content: center;
  flex-direction: column;
  padding: 10px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  -moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  border-radius: 5px;

}
.brand_logo_container {
  position: absolute;
  height: 190px;
  width: 200px;
  top: -90px;
  border-radius: 50%;
  background: #1E90FF;
  padding: 10px;
  text-align: center;
}
.brand_logo {
  height: 170px;
  width: 180px;
  border-radius: 50%;
  border: 5px solid #716f6f;
}
.form_container {
  margin-top: 90px;
}
.login_btn {
  width: 100%;
  background: #716f6f !important;
  color: white !important;
}
.login_btn:focus {
  box-shadow: none !important;
  outline: 0px !important;
}
.login_container {
  padding: 0 2rem;
}
.input-group-text {
  background: #716f6f !important;
  color: white !important;
  border: 0 !important;
  border-radius: 0.25rem 0 0 0.25rem !important;
}
.input_user,
.input_pass:focus {
  box-shadow: none !important;
  outline: 0px !important;
  background-color: #1E90FF;
}
.custom-checkbox .custom-control-input:checked~.custom-control-label::before {
  background-color: #716f6f !important;
}
</style>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>

<head>
	<title>G.A | Se connecter</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
</head>
<!--Coded with love by Mutiullah Samim-->
<body>
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="<?=base_url('assets/img/Logo_ofppt.png')?>" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form id="form_login">
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" id="formLogin_email" class="form-control input_user" value="" placeholder="Email" required autocomplete="off">
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" id="formLogin_passe" class="form-control input_pass" value="" placeholder="Mot de passe" required autocomplete="off">
						</div>
						<div class="d-flex justify-content-center mt-3 login_container">
    				 	<button type="submit" name="button" class="btn login_btn">Se connecter</button>
  				  </div>
					</form>
				</div>
        <div class="">
					<div class="d-flex justify-content-center ">
						<span id="resultLogin_span"></span>
					</div>
				</div>
        <div class="">
					<div class="d-flex justify-content-center ">
						<a href="#" style="color:black;">Mot de passe oublié?</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

<script>
  var base_url = '<?= base_url() ?>';
  var site_url = '<?= site_url() ?>';
  $("#form_login").on("submit",function() {
    var username  = $("#formLogin_email").val();
    var passeword = $("#formLogin_passe").val();

    $.ajax({
       type: 'POST',
       url: base_url + 'login/ajax/login',
       dataType: "JSON",
       data : {passeword:passeword,username:username},
       cache:false,
       success: function(msg){
         if(msg.status == '1'){
           $("#creer_stagiaire").trigger("reset");
           $("#resultLogin_span").css("color","lime");
           $("#resultLogin_span").html(msg.message);
           window.location.href = base_url + msg.url;
         }else if(msg.status == '0'){
           $("#resultLogin_span").css("color","red");
           $("#resultLogin_span").html(msg.message);
         }
       },
       error: function(dataR){
         $("#resultLogin_span").css("color","red");
         $("#resultLogin_span").text("Erreur de connection !");
       }
    });
    return false;
  });

</script>
</html>
