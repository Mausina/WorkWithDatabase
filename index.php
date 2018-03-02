<!-- <?php 
require_once 'time.php';
require_once 'indclude/database.php';
require_once 'indclude/function.php';
// 

 ?> -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<title>Document</title>
</head>
<body>
	<a href="TestPage.php">TestPage</a>
		<form>
				<label>ФИО:</label><br>
				<input id="fio" type="text" name="fio" required="" placeholder="Копыл Александр Евгеньевичь"><br>
				<label>Телефон:</label><br>
				<input id="tel" type="text" name="tel" required="" placeholder="+38(063)067-44-53"><br>
				<label>E-mail:</label><br>
				<input id="email" type="text" name="email" required="" placeholder="Kopul@ua.fm"><br>
				<input id="submit" type="submit" name="submit" value="Отправить">
		</form>
				
				<?php $info = get_categories(); ?>
				
			<div class="information">
				
				<?php foreach ($info as $inf ):  ?>
				<ul>
					<li><?=$inf['fio']?></li>
					<li><?=$inf['tel']?></li>
					<li><?=$inf['email']?></li>
				</ul>
				<?php endforeach; ?>
			
			
			</div>
			<img id="upload"style="width: 100px; height: 100px; display: none;" src="image_upload.gif" alt="">
			<script src="jquery-3.3.1.min.js"></script>
			<script src="jquery.maskedinput.js"></script>
			
			<script>
				
				$("#tel").mask("+38(099) 999-9999");
				$(document).ready(function(){
					$('#submit').bind("click", function(e){
						e.preventDefault();
						var fio = $('#fio')[0].value;
						var tel = $('#tel')[0].value;
						var email = $('#email')[0].value;
				
						 
						$.ajax({
							url: 'content.php',
							type: 'POST',
							data: ({ fio: fio, tel: tel, email: email }),
							dataType: 'html',
							beforeSend: funcBefore,
							success: function(data){
								console.log(data);
								$('img').hide();
									// $(".information").html(data)
								}
						})
						.done(function() {
							console.log("success");
						})
						.fail(function() {
							console.log("error");
						})
						.always(function() {
							console.log("complete");
						});

					});
				});
				function funcBefore(){
					$('img').show(),
					$(".information").text('Ожидание данных...')
				}
				function show()  
        {  
            $.ajax({  
                url: "time.php",  
                cache: false,  
                success: function(html){  
                    $(".information").html(html);  
                }  
            });  
        }  
      
        $(document).ready(function(){  
            show();  
            setInterval('show()',1000);  
        });  
			</script>

</body>
</html>