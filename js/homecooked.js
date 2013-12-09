
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