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
		<script type="text/javascript" src="<?php echo URL ?>public/js/plugins/isotope/isotope.js"></script>
		<script type="text/javascript" src="<?php echo URL ?>public/js/plugins/isotope/centeredMasonry.js"></script>
		<link type="text/css" href="<?php echo URL ?>css/dark-hive/jquery-ui-1.8.17.custom.css" rel="stylesheet" />
		<link type="text/css" href="<?php echo URL ?>public/css/isotope/isotope.css" rel="stylesheet" />
		<script type="text/javascript">
		// needs to seperate jquery ui and isotope, and make them work with $.noconfict(function(){})
		
					$(function() {	
		var $container = $('#isoParent');
						$container.isotope({
							itemSelector : '.item',
							layoutMode: 'masonry',
							masonry:{
								columnWidth: 60,
								gutterWidth:10,
							},
							filter: '.main'
						},ranLay());
			function getthird(){
				console.log($('#CB').width());
				return Math.floor($('#CB').width()/3.08);
			}
			function addPlats(){
				$('.login').hide();
				
				$('.logout').click(function(){
					$container.isotope({filter:'.main'},ranLay());
					//AJAX to kill session
					$('.login').show();
				});
				$container.isotope({filter:'.home'},ranLay());	
			}
			
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
            		addPlats();
            	}
            	else{
            		$('#ux').show("explode",50);
            		$('#px').show("explode",50);
            		$('#loginD').effect("shake", {times : 3}, 100);
            	}
            }
            });
           }
           function ranLay(){
          $container.isotope({sortBy: 'random'});
          }
          function growglow(){
           $.each($('.contentBox'),function(){
           var w = $(this).width();
           	var h = $(this).height();
            $(this).hover(
           	function(){
           	$(this).css('cursor', 'pointer');
           	//make this with animate
           	$(this).stop(true,true).animate({
           		width: '+=5',
           		height: '+=5'
           	}, 200);
           	var color = $(this).css('color');
           	$(this).css("text-shadow", "0px 0px 15px " + color);
           	},
           	function(){
           		$(this).stop(true,true).animate({
           		width: '-=5',
           		height: '-=5'
           	},200);
           	$(this).css("text-shadow","");	
           	}
           	);
           	});
           }
	growglow();
           

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
    //Nick Added Register here 
    $('#RegD').dialog({
    	autoOpen: false,
    	width: 450,
    	modal: true,
		buttons: {
            "Login": function() {
            $(this).dialog("close");   	
            },
            "Cancel": function() {
                $(this).dialog("close");
            }
        }
    });
    $('.reg').click(function() {
        $('#RegD').dialog('open');
        disableNavi();
        return false;
    });
    //Nick Ended Register here 
    $('#loginD').dialog({
        autoOpen: false,
        width: 360,
        modal: true,
        resizable: false,
        buttons: {
            "Login1": function() {
            	var obj = {};
            	obj.username = $('[name=username]').val();
            	obj.password = $('[name=password]').val();
					validate(obj);       	
            },
            "Cancel": function() {
                $(this).dialog("close");
            }
        },
       close: function(e,u){
       	enableNavi();
       },
       
    });
    $('.login').click(function() {
        $('#loginD').dialog('open');
        disableNavi();
        return false;
    });
    $('#rand').click(function(){
    	console.log("HERE");
    	$container.isotope({sortBy: 'random'});
    	 return false;
    });
});
</script>
		<link rel="stylesheet" type="text/css" href="<?php echo URL ?>/public/css/navi.css"/>
		<style>
		html,body {
  height: 98;
  overflow-x:hidden;
}
ul#navi .home a{
    background-image: url(<?php echo URL ?>public/imgs/home.png);
    background-size: 50px 50px;
    
}
#xbox{
	background-color: #008000;
    background-image: url(<?php echo URL ?>public/imgs/xbox.png);
    background-size: 50px 50px;
    background-repeat:no-repeat;
    background-position:center; 
}
#psn{
	background-color: #551A8B;
    background-image: url(<?php echo URL ?>public/imgs/psn.png);
    background-size: 90px 50px;
    background-repeat:no-repeat;
    background-position:center; 
}
#steam{
	background-color: #1F1F1F;
    background-image: url(<?php echo URL ?>public/imgs/Steam.png);
    background-repeat:no-repeat;
    background-size: 70px 70px;
    background-position:center; 
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
			.topleftbar{
				left: 15px;
    			position: absolute;
    			top: 20px;
    			z-index: 3;
			}
			.toprightbar{
				float: right;
    			left: 5px;
   			 	position: relative;
    			top: 55px;
				
			}
			#banner{
				text-align: center;
				font-family: georgia, serif;
				color: white;
				font-size: 20px;
				margin: 0 auto 10px;
				padding: 10px;
				top: 40px;
				width:500px;
			}
			#isoParent {
				margin:0 auto;
				border: 2px solid #4E4E4E;
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
				margin: 10px;
			}
			#avatar{
				width:200px;
				height:200px;
			}
			#feed{
				width:500px;
				height:250px;
							}
			#friends{
				width:200px;
				height:300px;
			}
			#games{
				width: 500px;
				height:200px;
				
			}
			.ximg{
				width:12px;
				height:12px;
			}
			.ui-dialog .ui-dialog-content{
				padding:.5em;
			}
			.topbar{
				background-color:#777777;
			}
			.contentBox{
				border:2px solid white;
				border-radius:10px;
				box-shadow: 10px 10px 5px #333;
				background-color:#555555;
				margin: 10px;
			}
			.login{
				/* for W3C-compliant browsers 
background-image: linear-gradient(top, rgba(125,126,125,255) 0%, rgba(69,70,69,255) 61%, rgba(14,14,14,255) 100%);
background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, rgba(125,126,125,255)), color-stop(0.6098097, rgba(69,70,69,255)), color-stop(1, rgba(14,14,14,255)));
background-image: -moz-linear-gradient(top, rgba(125,126,125,255) 0%, rgba(69,70,69,255) 61%, rgba(14,14,14,255) 100%);
background-image: -o-linear-gradient(top, rgba(125,126,125,255) 0%, rgba(69,70,69,255) 61%, rgba(14,14,14,255) 100%);
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#7d7e7d', endColorstr='#454645'endColorstr='#0e0e0e');*/
	padding:2px;
				width:60px;
				height:40px;
				color:white;
				font-size:15px;
				float:right;
			}
			.toolEle{
				top:-10px;
				position:relative;
		border-left: 1px solid black;
		border-right: 1px solid black;
			}
			div.toolEle:hover{
				cursor:pointer;
				/* for W3C-compliant browsers */
background-image: linear-gradient(top, rgba(125,126,125,255) 0%, rgba(89,89,89,255) 61%, rgba(53,53,53,255) 100%);
/* for Safari 5.03+ and Chrome 7+ */
background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, rgba(125,126,125,255)), color-stop(0.6098097, rgba(89,89,89,255)), color-stop(1, rgba(53,53,53,255)));
/* for Firefox 3.6+ */
background-image: -moz-linear-gradient(top, rgba(125,126,125,255) 0%, rgba(89,89,89,255) 61%, rgba(53,53,53,255) 100%);
/* for Opera 11.1+ */
background-image: -o-linear-gradient(top, rgba(125,126,125,255) 0%, rgba(89,89,89,255) 61%, rgba(53,53,53,255) 100%);
/* for IE */
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#7d7e7d', endColorstr='#595959'endColorstr='#353535');
			}
			div.toolElem:active{
				/* for W3C-compliant browsers */
background-image: linear-gradient(top, rgba(125,126,125,255) 0%, rgba(117,117,117,255) 61%, rgba(109,109,109,255) 100%);
/* for Safari 5.03+ and Chrome 7+ */
background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, rgba(125,126,125,255)), color-stop(0.6098097, rgba(117,117,117,255)), color-stop(1, rgba(109,109,109,255)));
/* for Firefox 3.6+ */
background-image: -moz-linear-gradient(top, rgba(125,126,125,255) 0%, rgba(117,117,117,255) 61%, rgba(109,109,109,255) 100%);
/* for Opera 11.1+ */
background-image: -o-linear-gradient(top, rgba(125,126,125,255) 0%, rgba(117,117,117,255) 61%, rgba(109,109,109,255) 100%);
/* for IE */
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#7d7e7d', endColorstr='#757575'endColorstr='#6d6d6d');
			}
			.login p{
				font-size:15px;
				text-align:center;
				font-family:Verdana, Tahoma, Geneva, sans-serif;
				text-decoration:none;
				position: relative;
				top: -6px;

			}
			.reg{
				width:200px;
				height:100px;
				background-color:#555555;
				color:white;
			}
			.reg p{
				font-size:31px;
				text-align:center;
				font-family:Verdana, Tahoma, Geneva, sans-serif;
				text-decoration:none;
			}
			.about{
				width:200px;
				height:100px;
				background-color:white;
				color:black;
				border:2px solid black;
			}
			.about p{ 
				font-size:31px;
				text-align:center;
				font-family:Verdana, Tahoma, Geneva, sans-serif;
				text-decoration:none;
				
			}
			.logout{
				width:200px;
				height:100px;
				background-color:#808080;
				color:white;
			}
			.logout p{
				font-size:31px;
				text-align:center;
				font-family:Verdana, Tahoma, Geneva, sans-serif;
				text-decoration:none;
			}
			.toolbar{
				width:100%
				/* for W3C-compliant browsers */
background-image: linear-gradient(top, rgba(45,46,45,255) 0%, rgba(31,31,31,255) 61%, rgba(17,17,17,255) 100%);
/* for Safari 5.03+ and Chrome 7+ */
background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, rgba(45,46,45,255)), color-stop(0.6098097, rgba(31,31,31,255)), color-stop(1, rgba(17,17,17,255)));
/* for Firefox 3.6+ */
background-image: -moz-linear-gradient(top, rgba(45,46,45,255) 0%, rgba(31,31,31,255) 61%, rgba(17,17,17,255) 100%);
/* for Opera 11.1+ */
background-image: -o-linear-gradient(top, rgba(45,46,45,255) 0%, rgba(31,31,31,255) 61%, rgba(17,17,17,255) 100%);
/* for IE */
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#2d2e2d', endColorstr='#1f1f1f'endColorstr='#111111');
			}
		/* selectors for filtering*/
			.main .home{}
		</style>
	</head>
	<?php Session::init(); ?>
	<body>
		<div class="toolbar">
		<div id="banner">
			GameStalker
			<div class="login toolEle"><p>Login</p></div>
		</div>
		</div>
			<div id="isoParent" style="padding:10px">
			<div  class="contentBox logout item home" ><p>LogOut</p></div>
			<div  class="contentBox reg item main"><p>Register</p></div>
			<div  class="contentBox about item main home"><p>About</p></div>
			<div id="xbox" style="width:100px;height:100px" class="item contentBox home"></div>
			<div id="psn" style="width:100px;height:100px" class="item contentBox home"></div>
			<div id="steam" style="width:100px;height:100px" class="item contentBox home"></div>
			</div>
		<!--<ul id="navi">
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
		</ul>-->
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
		<div id="RegD" >
			<table>
				<tr>
					<td>Username: </td>
					<td>
					<input type="text" name="newusername" />
					</td>
					<td class="ximg" id="ux" style="display:none"><img src="public/imgs/x.png" /></td>
				</tr>
				<tr>
					<td>Password: </td>
					<td>
					<input type="text" name="confirmpassword1"/>
					</td>
					<td class="ximg" id="px" style="display:none"><img src="public/imgs/x.png" /></td>
				</tr>
				<tr>
					<td>Confirm Password: </td>
					<td>
					<input type="text" name="confirmpassword2"/>
					</td>
					<td class="ximg" id="px" style="display:none"><img src="public/imgs/x.png" /></td>
				</tr>
				<tr>
					<td>Email: </td>
					<td>
					<input type="text" name="Email"/>
					</td>
					<td class="ximg" id="px" style="display:none"><img src="public/imgs/x.png" /></td>
				</tr>
				<tr>
					<td>PSN Username:  </td>
					<td>
					<input type="text" name="PSNUsername"/>
					</td>
					<td class="ximg" id="px" style="display:none"><img src="public/imgs/x.png" /></td>
				</tr>
				<tr>
					<td>Xbox Live Gamertag: </td>
					<td>
					<input type="text" name="XboxName"/>
					</td>
					<td class="ximg" id="px" style="display:none"><img src="public/imgs/x.png" /></td>
				</tr>
				<!--<tr>
					<td>Steam ID: </td>
					<td>
					<input type="text" name="SteamID"/>
					</td>
					<td class="ximg" id="px" style="display:none"><img src="public/imgs/x.png" /></td>
				</tr>-->
			</table>
		</div>
		<!--<div style="color:white" id="contentBody" >
			<div id="cB" style=";margin: 0px auto;">
			<div class="content-con item" id="avatar"></div>
			<div class="content-con item" id="friends"></div>
			<div class="content-con item" id="feed"></div>
			<div class="content-con item" id="games"></div>
			</div>-->
			
		</div>
	</body>
</html>
