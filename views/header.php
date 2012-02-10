<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>Game Stalker</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<script type="text/javascript" src="<?php echo URL ?>jquery.js"></script>
		<script type="text/javascript" src="<?php echo URL ?>js/jquery-1.7.1.min.js"></script>
		<script type="text/javascript" src="<?php echo URL ?>js/jquery-ui-1.8.17.custom.min.js"></script>
		<script type="text/javascript" src="<?php echo URL ?>public/js/navi.js"></script>
		<script type="text/javascript" src="<?php echo URL ?>public/js/json2.js"></script>
		<link type="text/css" href="<?php echo URL ?>css/dark-hive/jquery-ui-1.8.17.custom.css" rel="stylesheet" />
		<script type="text/javascript">
					$(function() {
						function validate(info){
            $.ajax({
            type:'POST',
            url:'login/run',
            data: $.param(info),
            success: function(data){
            	console.log(data);
            	if(data != ""){
            		$('#loginD').dialog("close");
            		$('#ux').hide();
            		$('#px').hide();
            	}
            	else{
            		$('#ux').show("explode",50);
            		$('#px').show("explode",50);
            		$('#loginD').effect("shake", {times : 3}, 100);
            	}
            }
            });
           }

    function setPageHandler(div) {
        div.each(function() {
            console.log($(this));
            $(this).click(function() {
                var name = $(this).attr('id');
                $('#contentBody').hide("clip",{direction: "vertical"}, 1000, function() {
                    $('#contentBody').empty();
                    $('#contentBody').append('<p>' + name + '</p>');
                });
                $('#contentBody').show("clip",{direction: "vertical"}, 1000);
            });
        });
    }
    setPageHandler($('#navi > li > a'));

    function enableNavi() {
        $('#navi a').stop().animate({
            'marginLeft': '-85px'
        }, 1000);
        $('#navi > li > a').hover(

        function() {
            $('a', $(this).parent()).stop().animate({
                'marginLeft': '-2px'
            }, 200);
        }, function() {
            $('a', $(this).parent()).stop().animate({
                'marginLeft': '-85px'
            }, 200);
        });
    }

    function disableNavi() {
        $('#navi a').stop().animate();
        $('#navi > li > a').hover(

        function() {
            $('a', $(this).parent()).stop().animate();
        }, function() {
            $('a', $(this).parent()).stop().animate();
        });
    }
    $('#loginD').dialog({
        autoOpen: false,
        width: 360,
        modal: true,
        buttons: {
            "Login": function() {
            	var obj = {};
            	obj.username = $('[name=username]').val();
            	obj.password = $('[name=password]').val();
					validate(obj);       	
            },
            "Register": function() {
                $(this).dialog("close");
            },
            "Cancel": function() {
                $(this).dialog("close");
            }
        },
       close: function(e,u){
       	enableNavi();
       },
       
    });
    $('#login').click(function() {
        $('#loginD').dialog('open');
        disableNavi();
        return false;
    });
});
</script>
		<link rel="stylesheet" type="text/css" href="<?php echo URL ?>/public/css/navi.css"/>
		<style>
		ul#navi .home a{
    background-image: url(<?php echo URL ?>public/imgs/home.png);
    background-size: 50px 50px;
}
ul#navi .xbox a      {
	background-color: #008000;
    background-image: url(<?php echo URL ?>public/imgs/xbox.png);
    background-size: 50px 50px;
}
ul#navi .psn a      {
	background-color: #551A8B;
    background-image: url(<?php echo URL ?>public/imgs/psn.png);
    background-size: 90px 50px;
}
ul#navi .steam a      {
	background-color: #1F1F1F;
    background-image: url(<?php echo URL ?>public/imgs/Steam.png);
    background-size: 70px 70px;
}
ul#navi .login a      {
    background-image: url(<?php echo URL ?>public/imgs/Login.png);
    background-position:right; 
}
			body {
				background-image: url('<?php echo URL ?>/public/imgs/black.jpg');
				width: 99%;
				height: 100%;
			}
			#banner {
				width: 99%;
				height: 90px;
				top: 3px;
				background-color: gray;
				border-radius: 10px;
			}
			#banner p {
				text-align: center;
				font-family: georgia, serif;
				color: #FFFFFF;
				font-size: 20px;
				margin: 10px;
				padding: 10px;
				top: 40px;
			}
			#contentBody {
				position: absolute;
				border-radius: 20px;
				border: 2px solid #4E4E4E;
				left: 25px;
				top: 108px;
				width: 97%;
				height: 550px;
				background-color: #3a3a3a;
			}
			.ui-dialog .ui-dialog-titlebar {
				padding: 0em;
			}
			.ui-dialog .ui-dialog-buttonpane {
				margin: 0px;
				padding: 0em;
			}
			.ui-button-text-only .ui-button-text {
				padding: 0em 0.4em;
			}
			.content-con{
				border: 1px solid white;
				border-radius:5px;
				float:left;
				padding: 5px;
				margin: 20px;
			}
			#avatar{
				width:20%;
				height:200px;
				margin-left:30px;
			}
			#feed{
				width:71%;
				height:250px;
				float:right;
							}
			#friends{
				margin-left:30px;
				width:20%;
				height:250px;
			}
			#games{
				float:right;
				width: 71%;
				height:200px;
				
			}
			.ximg{
				width:12px;
				height:12px;
			}
			.ui-dialog .ui-dialog-content{
				padding:.5em;
			}

		</style>
	</head>
	<?php Session::init(); ?>
	<body>
		<div id="banner">
			<p>
				Game Stalker
			</p>
		</div>
		<ul id="navi">
			<li class="home">
				<a id="home"></a>
			</li>
			<li class="xbox">
				<a id="xbox"></a>
			</li>
			<li class="psn">
				<a id="psn"></a>
			</li>
			<li class="steam">
				<a id="steam"></a>
			</li>
			<li class="login">
				<a id="login" ></a>
			</li>
		</ul>
		<div id="loginD" >
			<table>
				<tr>
					<td>Username: </td>
					<td>
					<input type="text" name="username" />
					</td>
					<td class="ximg" id="ux" style="display:none"><img src="public/imgs/x.png" /></td>
				</tr>
				<tr>
					<td>Password: </td>
					<td>
					<input type="password" name="password"/>
					</td>
					<td class="ximg" id="px" style="display:none"><img src="public/imgs/x.png" /></td>
				</tr>
			</table>
		</div>
		<div id="contentBody" style="color:white">
			<div class="content-con" id="avatar">AVATAR</div>
			<div class="content-con" id="feed">FEED</div>
			<div class="content-con" id="friends">FREINDS</div>
			<div class="content-con" id="games">GAMES</div>
			
		</div>
	</body>
</html>
