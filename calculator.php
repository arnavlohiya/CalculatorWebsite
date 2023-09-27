

<html>

<head>
	<title>untitled</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.38" />
	<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>


<style>
.calculator{
	background: grey;
	width: auto;
	height: auto;
	margin: 20% 30%;
	border-radius: 25px;
	box-shadow: 7px 7px 5px 5px;
	
	}

.calculator p{
	text-align: center;
	}

.calculator .row{
	margin-left: 5%;
	}
.calculator .row .button{
	display: inline-block ;
	margin: 4% 1% ;
	border: 2px solid black;
	border-radius: 3px;
	box-shadow: 3px 3px;
	padding: 2% 2% 2% 2%;
	min-width: 20px;
	text-align: center;
	}
	
.calculator .mainScreen{
	background: white;
	border: 1px solid black;
	border-radius: 4px;
	height: 20%;
	width: 85%;
	text-align: left;
	font-size: 200%;
	margin-left: 7%;
	margin-top: 0px;
	font-family: georgia;
	margin-bottom: 10%;
	
	}
	
.calculator .row .equal{
	width:30%;
	}
.babyScreen{
	text-align: right;

	font-size: 75%;
	font-family: georgia;
	
	
	}
</style>


	
</head>



<body>
	
	<div class="calculator">
	<p>This is a calculator</p>
		<div class="mainScreen">
		<div class="screen">
			0
		</div>
		<div class="babyScreen">0</div>
		
		</div>
		<div class="row">
		<div class="button del">DEL</div> <div class="button AC">AC</div> <div class="button back">Back</div> <div class="button plusMinus">+/-</div> <div class="button remainder">%</div>
		</div>
		
		<div class="row">
		<div class="button">7</div> <div class="button">8</div> <div class="button">9</div> <div class="button divide">/</div> <div class="button sqrt">sqrt</div>
		</div>
		
		<div class="row">
		<div class="button four">4</div> <div class="button">5</div> <div class="button">6</div> <div class="button">*</div> <div class="button reciprocal">1/x</div>
		</div>
		
		<div class="row">
		<div class="button">1</div> <div class="button">2</div> <div class="button">3</div> <div class="button subtract">-</div> <div class="button pi">pi</div>
		</div>
		
		<div class="row">
		<div class="button">0</div> <div class="button">.</div> <div class="button add">+</div> <div class="button equal">=</div>
		</div>
	
	
	</div>
	

<div>
	<input type="button" value="45" style="color:red" id="popup">
</div>
</body>
<script>
$("#popup").click(function(){
	$("#popup").tooltip({
		content:"hello"
		})
	
	});	
	
	
isNumber = function (value){
	return !isNaN(value) || value=="."
	}

isOperator= function(value){
	return value==="/" || value==="*" || value==="+" || value==="-" ;
} 

giveAnswer= function(part1, oe, part2) {
	p1= parseInt(part1)
	p2= parseInt(part2)
	
	
	if (oe=="*"){
		console.log("a")
		return p1*p2
		}
	else if(oe=="+"){
		console.log("aa")
		return p1+p2
		}
	else if(oe=="-"){
		console.log("aqq")
		return p1-p2
		}
	else{
		console.log("aqqq")
		return p1/p2
	}
		
	
	//console.log(typeof(parseInt(p1)),typeof(oe),typeof(p2))
	//console.log(parseInt(p1))
	}

//console.log(giveAnswer("10","/","19"))
var operation="";
var mostRecentCalc=0
var mostRecentCalcAnswer=0
$(".button").click(function(){
	
	var currentEntry= $(this).html()
	var currentEntryUpdated = $(".calculator .screen").html() + currentEntry
	if($(".babyScreen").html()==0){
	if (isNumber(currentEntry)){
		if ($(".calculator .screen").html()==0){
			$(".calculator .screen").html(currentEntry)
			}
		else{
			$(".calculator .screen").html(currentEntryUpdated)
			}
		
	}
	else if (isOperator(currentEntry)){
		if(isOperator($(".calculator .screen").html().slice(-1))){
			console.log("can't use two continuous operators.")
			}else{
				$(".calculator .screen").html(currentEntryUpdated)
				operation= currentEntry
				}
		
		}
		
		//console.log(operation)
	}else{
		
		$(".screen").html($(".babyScreen").html()+currentEntry)
		$(".babyScreen").html("0")
		}
});

$(".AC").click(function(){
	$(".screen").html(0)
	$(".babyScreen").html(0)
	
	})

equalFunc= function(){
	console.log("hi = has been clicked")
	var screen = $(".calculator .screen").html();
	mostRecentCalc=screen
	if (screen.includes('*')){
		var values=screen.split("*")
		mostRecentCalcAnswer=values[0]*values[1]
		$(".calculator .babyScreen").html(mostRecentCalcAnswer)
		}
	if(screen.includes('/')){
		var values=screen.split("/")
		mostRecentCalcAnswer=(values[0]/values[1]).toFixed(2)
		$(".calculator .babyScreen").html(mostRecentCalcAnswer)
		}
	if(screen.includes('+')){
		var values=screen.split("/")
		mostRecentCalcAnswer=(values[0]+values[1])
		$(".calculator .babyScreen").html(mostRecentCalcAnswer)
		}
	if(screen.includes('-')){
		var values=screen.split("-")
		mostRecentCalcAnswer=(values[0]-values[1])
		$(".calculator .babyScreen").html(mostRecentCalcAnswer)
		}
	
	
	}

$(".equal").click(equalFunc);
$("body").keypress(equalFunc);

$(".back").click(function (){
	
	$(".screen").html(mostRecentCalc)
	$(".babyScreen").html(mostRecentCalcAnswer)
	})
$(".del").click(function(){
	var screenTemp=$(".screen").html()
	if ($(".screen").html().length>1){
	$(".screen").html(screenTemp.slice(0,-1))
	}else{
		$(".screen").html(0)
		}
	})
$(".plusMinus").click(function() {
	$(".babyScreen").html(-parseInt($(".screen").html()))
	
	})

</html>
