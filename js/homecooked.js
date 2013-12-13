
$("#newCommentTextArea").hide();
$(".adminSubPage:gt(0)").hide();

$(document).ready(function(){
	
	$(".removePost").click(function(){
		var postID = $(this).closest("#LatestPosts").data("postid");
		$(this).closest("#LatestPosts").remove();
		$.ajax({
			type: "post",
			url: "?a=removePost",
			data: {
				postID : "postID"
			},
			success: function(data){
				$("#vardumpTest").prepend(data);
			}
		});
	});
	
	$("#adminPosts").click(function(){
		$(".adminSubPage").hide().eq("0").show(); //!!Post page
		$(this).addClass("active").siblings().removeClass("active");
	});
	
	$("#adminDrafts").click(function(){
		if(!$("#draftPage").length){
			$.ajax({
				type: "post",
				url: "?a=adminDraftPage",
				success: function(data){
					$(".adminSubPage").eq("1").html(data);
					$(".adminSubPage").hide().eq("1").show();
					$(this).addClass("active").siblings().removeClass("active");
				}
			});
		} else {
			$(".adminSubPage").hide().eq("1").show();
			$(this).addClass("active").siblings().removeClass("active");
		}
	});
	
	$("#newPostClick").click(function(){
		if(!($("#newPostTextArea").length)){
			$(".adminSubPage").hide().eq("2").html('<div class="panel-body">'+ 
				'<div class="panel panel-primary" id="newPostTextArea">'+
					'<div class="panel-heading" style="height: 30px; padding: 2px;">'+
						'<button><b>B</b></button>'+
					'</div>'+
					'<div class="panel-body">'+
						'<input id="postTitle" class="form-control" type="text" placeholder="Title" maxlength="80" style="margin-bottom: 5px;">'+
						'<textarea placeholder="New post" class="form-control" row="10"></textarea>'+
						'<button id="publishPost" class="btn-primary pull-right" style="margin-top: 2px;"><b>Publish</b></button>'+
						'<button id="saveDraft" class="btn-primary pull-right" style="margin: 2px;"><b>Save draft</b></button>'+
					'</div>'+
				'</div>'+
			'</div>').show();
		} else {
			$(".adminSubPage").hide().eq("2").show();
		}
		$(this).addClass("active").siblings().removeClass("active");
	});
	
	$("#newComment").click(function(){
		$("#newCommentTextArea").toggle("slow");
	});
	
	$(document).on("click", "#publishPost", function(){
		var title = $.trim($("#postTitle").val());
		var post = $.trim($("#newPostTextArea textarea").val());
		if(!title.length){
			$("#postTitle").css("border-color", "red");
			return false;
		}
		if(!post.length){
			$("#newPostTextArea textarea").css("border-color", "red");
			return false;
		}
		$.ajax({
			type: 'POST',
			url: '?a=publishPost',
			data: {
				"title" : title,
				"post" : post
			},
			success: function(data){
				$("#LatestPosts").prepend(data);
				$("#postTitle").val("");
				$("#newPostTextArea textarea").val("");
				$("#newPostTextArea .panel-heading").append("<b style='margin-top: 3px;' class='pull-right'>Post has been published!</b>");
				$("#postTitle").css("border-color", "grey");
				$("#newPostTextArea textarea").css("border-color", "grey");
			}
		});
	});
	
	$(document).on("click","#saveDraft", function(){
		var title = $.trim($("#postTitle").val());
		var draft = $.trim($("#newPostTextArea textarea").val());
		if(!title.length){
			$("#postTitle").css("border-color", "red");
			return false;
		}
		if(!draft.length){
			$("#newPostTextArea textarea").css("border-color", "red");
			return false;
		}
		$.ajax({
			type: 'post',
			url: '?a=saveDraft',
			data: {
				"title" : title,
				"draft" : draft
			},
			success: function(){
				$("#postTitle").val("");
				$("#newPostTextArea textarea").val("");
				$("#newPostTextArea .panel-heading").append("<b style='margin-top: 3px;' class='pull-right'>Post has been saved!</b>");
				$("#postTitle").css("border-color", "grey");
				$("#newPostTextArea textarea").css("border-color", "grey");
			}
		});
	});
	
	$("#publishComment").click(function(){
		if(!$.trim($("#newCommentTextArea textarea").val())){
			return false;
		} else {
			var comment = $("#newCommentTextArea textarea").val();
			var postID = $(this).data("postid");
			$.ajax({
				type: 'post',
				url: '../SamGholizadeh/?a=postComment',
				data: {
					"comment" : comment,
					"postID" : postID
				},
				success : function(data){
					$("#commentField").prepend(data);
					$("#newCommentTextArea").toggle("slow");
					$("#newCommentTextArea textarea").val("");
				}
			});
		}
	});
	
	$("#loginButton").click(function(e){
		e.preventDefault();
		var email = $("#loginForm input[type='email']").val();
		var password = $("#loginForm input[type='password']").val();
		$.ajax({
			type: 'post',
			url: '?a=login',
			data: {
				"email" : email,
				"password" : password
			},
			success: function(data){
				var data = $.parseJSON(data);
				if(data.username == false){
					$("#loginForm").prepend("<span id='loginFailed'><b>Login attempt failed.</b></span");
				} else {
					$("#login").modal("hide");
					$("#login").on('hidden.bs.modal', function(){
						$("#panel").html(""+
						"<li class='dropdown'>"+
							"<a href='#' class='dropdown-toggle' data-toggle='dropdown'><b>"+data.username+"</b> <b class='caret'></b></a>"+
								"<ul class='dropdown-menu'>"+
									"<li><a href='?a=admin'>Dashboard</a></li>"+
									"<li><a href='?a=logout'>Logout</a></li>"+
								"</ul>"+
						"</li>");
					});
				}
			}
		});
	});
	
	$("#registerButton").click(function(e){
		e.preventDefault();
		var email = $("#registerForm input[type='email']").val();
		var username = $("#registerForm input[type='text']").val();
		var password = $("#registerForm input[type='password']").val();
		if((!$.trim(email)) || (!$.trim(username)) || (!$.trim(password)))
			return false;
		$.ajax({
			type: 'post',
			url: '?a=register',
			data: {
				"email" : email,
				"username" : username,
				"password" : password
			},
			success: function(data){
				var sessionID = $.parseJSON(data);
				$("#login").modal('hide');
				$("#login").on('hidden.bs.modal', function(){
					$("#panel").html(""+
					"<li class='dropdown'>"+
                        "<a href='#' class='dropdown-toggle' data-toggle='dropdown'><b>"+username+"</b> <b class='caret'></b></a>"+
							"<ul class='dropdown-menu'>"+
								"<li><a href='?a=admin'>Dashboard</a></li>"+
								"<li><a href='?a=logout'>Logout</a></li>"+
							"</ul>"+
                    "</li>")
				});
			}
		});
	});
	
	$("#publisEdit").click(function(){
		window.open("?a=previewEdit", "asda", "_blank");
	});
	
	$(".reply").click(function(){
		var commentid = $(this).closest(".media").data("commentid");
		alert(commentid);
		return false;
	});
	
	$("#java1").click(function(){
		$("#utbildningContent").html("<b>Java and technical environment</b><br><br>"+
		"Introductory course that spanned two weeks. The teachers went through Eclipse that is the"+
		" development environment we are using. We talked about what expectations we as students had on"+
		" the education and how the market for Java programmers look like. The university had arranged"+
		" study visits that we went to. It was a good experience since we had the possibility to see how"+
		" professional programmers worked and ask them questions."+
		" <br><br>"+
		" We also went through basic programming and network and the course ended with a small programming test"+
		" where you had to create a program that asked for an integer input and print out all the numbers"+
		" between the given input value and 20. I guess they just wanted to feel where the students where"+
		" programming wise.");
	});
	
	$("#java2").click(function(){
		$("#utbildningContent").html("<b>Objectoriented programming and Java</b><br><br>"+
		"This course spanned over 12 weeks with a four weeks break somewhere in the middle where we studied objectoriented analysis and design."+
		" During the first three weeks we went through programming bases such as data types, variables,"+
		" functions, loops, conditions, constructors etc. Then they continued with more object-oriented"+
		" aspects of programming such as classes, encapsulation, objects, inheritance, polymorphism amongst other things."+
		" <br><br> We learned how to usitilize Github when collaborating with other programmers on projects. It was fairly simple to understand and"+
		" use. It was a very welcomed feature I did not know how to use and it made managing my own projects much easier."+
		" We started to dig deeper into the Java API and worked with threads and threadhandling, I/O, GUI with Swing library amongst other things."+
		" Then we had our first written test. After it the OOP course took a break for four weeks and OOAD began. After OOAD we began with something"+
		" I've never worked with and that is network programming and I learned a lot. We also started unit testing our code with JUnit."+
		" The end of the course consisted of a big group assignment (programming a chat client), repetition and programming test."+
        " <br><br>We handed in three different assignments during the course and you can find the source files in the list to your right."+
		" <br><br>Littarature used: Herbert Schildt, 2011 - Java The Complete Reference, 8th Edition, ISBN: 978-0071606301."+
		" ")
	});

    $("#java2assign1").click(function(){
       $("#utbildningContent").html("<b>Simple calculator.</b><br><br>"+
       "In this first assignment we were given the task to create a small calculator that could handle"+
       " basic operators such as +, -, *, / that could be applied to two operands. It was a fairly easy project."+
       " Input and output should be console based and the program should continue until the users chooses to quit.<br><br>"+
       " <b>Approach</b><br><br>"+
	   " I created two classes. One that contains the logic to interact with the user and another one that calculates and returns the result and keeps track of the three latest results. Most of the program is a while loop. The main thread starts with declaration of essential variables, initialization of a Scanner and SimpleCalc object and a welcome message to the user. Then the program will continue by presenting three options to the user. The program will present the operators and ask the user to choose one and then input two operands. Very simple first project.<br><br>"+
	   " <a href='?a=downloadContent&file=OOPassign1.zip'><b>Download source code</b></a>")
    });

    $("#java2assign2").click(function(){
		$("#utbildningContent").html("<b>Inventory system.</b><br><br>"+
		"In this assignment we were supposed to build a program that keeps track of an inventory. The point of this assignment was to utilize inheritance, interfaces and collections. You had to create two base classes. One named Domestic and ther other one Food. You had to create classes that represented products and were subclasses to one of these two classes. Each subclass should also implement an interface that would decide if the class was edible and had an expire date or could be stored forever.<br><br> The program should create eight different products initially and let the an administrator check the inventory and add or delete a product from it. The entire program is console based.<br><br><b>Approach</b><br><br>I started by analyzing the requirements. I created seven classes and two interfaces. Commodity is the super class that both Food class and domestic class inherits from. It contains data like product name, price, amount and inventory location. I created sub classes of the Domestic class and Food class that also implemented either Fresh interface or/and Stock interface.<br><br>The Controller class contains the main thread and is placed in another package for exercise purposes. Its a console based program that beings with filling two ArrayLists with objects and display options such as viewing current inventory, adding/removing items etc. for the administrator.<br><br><a href='?a=downloadContent&file=OOPAssign2.zip'><b>Download source code</b></a>");
    });
	
	$("#java2assign3").click(function(){
		$("#utbildningContent").html("<b>Booking system</b><br><br>"+
		"We were assigned to create a booking system for a fictional hotell. The system should be able to show what rooms are available at a certain time and be able to book a room for a specific guest. The hotell rooms should be imported from a Java Property file for learning purposes.<br><br><b>Approach</b><br><br>I came to the conlusion that I needed five classes for this program: Hotell, Rum, Bokning, Gäst and FileHandler. The main thread is located inside the Hotell class. The interaction with the administrator is inside a while loop. Since we had a timelimit I focused on functionality rather ther looks and decided to make the program console based. The program starts by reading all the hotel rooms from a Java property file, instantiate a Room object, add ten randomly generated future dates to the bookinglist of that specific room. Finally it adds the instantiated room to an ArrayList that is an instance variable of the Hotell object.<br><br>The administrator is prompted to input a date with a speicif format and all the available rooms for that speicif date will be listed and he/she can book a room from that list.<br><br><a href='?a=downloadContent&file=OOPassign3.zip'><b>Download source code</b></a>")
	});
	
	
	/*
	$("#registerForm input[type='email']").blur(function(){
		alert($("#registerForm input[type='email']").val());
		$.ajax({
			type: "post",
			url: "?a=checkEmailAvail",
			data: {
				"email" : $("#registerForm input[type='email']").val()
			},
			success : function(data){
				alert("ghjgj");
				var successArray = $.parseJSON(data);
				alert(successArray[]);
				$("#registerForm input[type='email']").append("<span><b>ok</b></span>");
			}
		});
	}); */
	
});