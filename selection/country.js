$( document ).ready(function() {
	var dataType = "";
	$("#country").on("focus", function() {
		dataType = "country";
	});
	$("#state").on("focus", function() {
		dataType = "state";
	});
	$("#city").on("focus", function() {
		dataType = "city";
	});
	$(".dataFloat").hover( function() {
		$(".dataLabel").removeClass("itemhover");
	});
	$("#country").focus();
	$("#country").on("input", function() {
		if($("#country").val() == ""){
			$("#dataCountry").hide();
		} else {
			$("#dataCountry").show();
			var getText = $("#country").val();
			$.ajax({
				type : 'post',
				url : 'get_country.php',
				data: { country: getText }
			})
			.done(function( msg ) {
				$("#dataCountry").html( msg );
			});
		}
	});

	$("#country").on("dblclick", function() {
		$("#dataCountry").show();
		var getText = $("#country").val();
		$.ajax({
			type : 'post',
			url : 'get_country.php',
			data: { country: getText }
		})
		.done(function( msg ) {
			$("#dataCountry").html( msg );
		});
	});

	$("#state").on("dblclick", function() {
		$("#dataState").show();
		var getText = $("#country").val();
		var getState = $("#state").val();
		$.ajax({
			type : 'post',
			url : 'get_states.php',
			data: { state: getState, country: getText }
		})
		.done(function( msg ) {
			$("#dataState").html( msg );
		});
	});

	$("#city").on("dblclick", function() {
		$("#dataCity").show();
		var getText = $("#country").val();
		var getState = $("#state").val();
		var getCity = $("#city").val();
		$.ajax({
			type : 'post',
			url : 'get_city.php',
			data: { state: getState, country: getText, city: getCity }
		})
		.done(function( msg ) {
			$("#dataCity").html( msg );
		});
	});

	$("#country").on("click", function() {
		if($("#country").val() == ""){
			$("#dataCountry").hide();
		}
	});

	$("#state").on("click", function() {
		if($("#state").val() == ""){
			$("#dataState").hide();
		}
	});

	$("#city").on("click", function() {
		if($("#city").val() == ""){
			$("#dataCity").hide();
		}
	});

	$("#state").on("input", function() {
		if($("#state").val() == ""){
			$("#dataState").hide();
		} else {
			$("#dataState").show();
			var getText = $("#country").val();
			var getState = $("#state").val();
			$.ajax({
				type : 'post',
				url : 'get_states.php',
				data: { state: getState, country: getText }
			})
			.done(function( msg ) {
				$("#dataState").html( msg );
			});
		}
	});

	$("#city").on("input", function() {
		if($("#city").val() == ""){
			$("#dataCity").hide();
		} else {
			$("#dataCity").show();
			var getText = $("#country").val();
			var getState = $("#state").val();
			var getCity = $("#city").val();
			$.ajax({
				type : 'post',
				url : 'get_city.php',
				data: { state: getState, country: getText, city: getCity }
			})
			.done(function( msg ) {
				if (msg.indexOf("has no states") > -1){
					insertValState("");
				}
				if (msg == "No State"){
					insertValState("");
				}
				$("#dataCity").html( msg );
			});
		}
	});

	$(document).keypress(function(e) {
		switch(e.keyCode) {
			case 38:
				navigate('up');
				break;
			case 40:
				navigate('down');
				break;
			case 13:
				if(currentData != '' && dataType != '') {
					if(dataType == "country"){
						insertValCountry(currentData);
						currentSelection = -1;
					} else if(dataType == "state"){
						insertValState(currentData);
						currentSelection = -1;
					} else if(dataType == "city"){
						insertValCity(currentData);
						currentSelection = -1;
					}
				}
				break;
		}
	});
});

var currentSelection = -1;
var scroll = 0;

function navigate(direction) {
	if($(".dataLabel").lenth == 0) {
		currentSelection = -1;
	}

	if(direction == 'up' && currentSelection != -1) {
		if(currentSelection != 0) {
			currentSelection--;
			if(scroll > 0){
				scroll-=21;
			}
		}
	} else if (direction == 'down') {
		if(currentSelection != $(".dataLabel").length -1) {
			if(currentSelection > 7){
				scroll+=21;
			}
			currentSelection++;
		}
	}
	setSelected(currentSelection);
}

function setSelected(menuitem) {
	$(".dataLabel").removeClass("itemhover");
	$(".dataLabel").eq(menuitem).addClass("itemhover");
	currentData = $(".dataLabel").eq(menuitem).text();
	$(".dataFloat").scrollTop(scroll);
}

function insertValCountry(myVal){
	$("#country").val(myVal);
	$("#dataCountry").html("");
	$("#dataCountry").hide();
	$("#country").attr("disabled", "disabled");
	$("#country").css("background-color", "#39db00");
	$(".state").show();
	$("#delCountry").show();
}

function insertValState(myVal){
	$("#state").val(myVal);
	$("#dataState").html("");
	$("#dataState").hide();
	$("#state").attr("disabled", "disabled");
	$("#state").css("background-color", "#39db00");
	$(".city").show();
	$("#delState").show();
}

function insertValCity(myVal){
	$("#city").val(myVal);
	$("#dataCity").html("");
	$("#dataCity").hide();
	$("#city").attr("disabled", "disabled");
	$("#city").css("background-color", "#39db00");
	$("#delCity").show();
	showData();
}

function delCountry(){
	$("#country").val("");
	$("#state").val("");
	$("#city").val("");
	$("#country").removeAttr("disabled");
	$("#state").removeAttr("disabled");
	$("#city").removeAttr("disabled");
	$("#country").css("background-color", "#fff");
	$("#state").css("background-color", "#fff");
	$("#city").css("background-color", "#fff");
	$(".state").hide();
	$(".city").hide();
	$("#delCountry").hide();
	$("#delState").hide();
	$("#delCity").hide();
	$(".dataFloat").html("");
	$(".dataFloat").hide();
	$(".showData").html("");
	$(".showData").hide();
	$("#country").focus();
}

function delState(){
	$("#state").val("");
	$("#city").val("");
	$("#state").removeAttr("disabled");
	$("#city").removeAttr("disabled");
	$("#state").css("background-color", "#fff");
	$("#city").css("background-color", "#fff");
	$(".city").hide();
	$("#delState").hide();
	$("#delCity").hide();
	$(".dataFloat").html("");
	$(".dataFloat").hide();
	$(".showData").html("");
	$(".showData").hide();
	$("#state").focus();
}

function delCity(){
	$("#city").val("");
	$("#city").removeAttr("disabled");
	$("#city").css("background-color", "#fff");
	$("#delCity").hide();
	$(".dataFloat").html("");
	$(".dataFloat").hide();
	$(".showData").html("");
	$(".showData").hide();
	$("#city").focus();
}

function showData(){
	$(".showData").show();
	var getText = $("#country").val();
	var getState = $("#state").val();
	var getCity = $("#city").val();
	$.ajax({
		type : 'post',
		url : 'get_data.php',
		data: { state: getState, country: getText, city: getCity }
	})
	.done(function( msg ) {
		$(".showData").html( msg );
	});
}