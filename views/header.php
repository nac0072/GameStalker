<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<!--<script type="text/javascript" src="../jquery.js"></script>-->
		<script type="text/javascript" src="<?php echo URL ?>js/jquery-1.7.1.min.js"></script>
		<script type="text/javascript" src="<?php echo URL ?>js/jquery-ui-1.8.17.custom.min.js"></script>
		<script type="text/javascript" src="<?php echo URL ?>public/js/navi.js"></script>
		<link type="text/css" href="<?php echo URL ?>css/dark-hive/jquery-ui-1.8.17.custom.css" rel="stylesheet" />
		<script type="text/javascript">
					$(function() {
						function validate(info){
							console.log(info);
            $.ajax({
            type:'POST',
            url:'<?php echo URL ?>login/run',
            data: info,
            success: function(data){
            	console.log(data);
            }
            });
            
           }

    function setPageHandler(div) {
        div.each(function() {
            console.log($(this));
            $(this).click(function() {
                var name = $(this).attr('id');
                $('#contentBody').hide("blind", 1000, function() {
                    $('#contentBody').empty();
                    $('#contentBody').append('<p>' + name + '</p>');
                });
                $('#contentBody').show("blind", 1000);
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
                	var username = $('[name=username]').val();
                	var password = $('[name=password]').val();
                	var infobj=[username,password];
                	validate(infobj);
                enableNavi();
            },
            "Register": function() {
                $(this).dialog("close");
                enableNavi();
            },
            "Cancel": function() {
                $(this).dialog("close");
                enableNavi();
            }
        }
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

		</style>
	</head>
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
				</tr>
				<tr>
					<td>Password: </td>
					<td>
					<input type="password" name="password"/>
					</td>
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
