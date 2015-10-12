<?php
/*** set the content type header ***/
/*** Without this header, it wont work ***/
header("Content-type: text/css");
?>



#bg-img {

	background: url("bg.jpg") no-repeat center center fixed; 
	background-size: cover;

	position: fixed;
	left: 0;
	right: 0;
	z-index: 1;

	  display: block;
	  margin-top: -10px;
	  width: 100%;
	  height: 120%;

}


h1 {
	font-family: "Impact";
	font-size: 30pt;
	color: #444;	
}

.title-text {
	font-family: "Serif";
	font-size: 60pt;
	color: #444;
}

.subtitle-text {
	font-family: "Helvetica";
	font-size: 20pt;
	color: #555555;	
}

#main-container {
	position: fixed;
	left: 50%;
	top: 50%;

	z-index: 999;
	width: 500px;
	height: 300px;
	text-align: center;
	padding-top: 50px;
	border: 0px dotted #000;
	background: rgba(100, 100, 150, 0);
	margin: -200px 0 0 -250px;

}

#main-container-alt {
	position: fixed;
	left: 50%;
	top: 25%;

	z-index: 999;
	width: 500px;
	height: 300px;
	text-align: center;
	padding-top: 50px;
	border: 0px dotted #000;
	background: rgba(100, 100, 150, 0);
	margin: -200px 0 0 -250px;

}


#button-container {
	width: 500px;
	margin-left: auto;
	margin-right: auto;
}

body {
	width: 100%;
	height: 100%;
	text-align: center;
	align: center;

}


#qcteam-add-form-container {
	font-family: "Arial", "Helvetica", "sans-serif";
	background: #ddd;
	width: 100%;
	height: 55%;
	text-align: right;
	padding-top: 20px;


}

#qcteam-add-form input[type="text"] {
	background: #eee;
	width: 190px;
	height: 25px;
	padding-left: 5px;
	padding-right: 5px;
	font-size: 12px;
	
}

#button-rows {
	height: 60px;
	text-align: center;
}

#db-table-view {
	padding: 5px;
	background: white;
}


#qcteam-add-form #button-rows input {
	margin-top: 20px;
	border: 1px solid #aaa;
	height: 30px;
	width: 80px;
	background: #fff;
	font-size: 14pt;
	border-radius: 10px;

}
#qcteam-add-form #button-rows input:hover {

	background-color: #ddd;

}

.button-style {

	border: 1px solid #aaa;
	height: 33px;
	width: 240px;
	background: #eeb;
	font-size: 12pt;
	border-radius: 10px;
	margin: 2px;
}
.button-style:hover {
	background: #ffa;
}


button {
	margin-top: 20px;
	border: 1px solid #aaa;
	height: 40px;
	width: 250px;
	background: #de2;
	font-size: 14pt;
	border-radius: 10px;
}

button:hover {
	background: #ee1;
}

#login-form {
	background: #ddd;
	width: 360px;
	height: 130px;
	margin-top: 20px;
	margin-left: auto;
	margin-right: auto;
	padding-top: 20px;
	padding-bottom: 15px;
	background-color: rgba(100, 100, 150, 0.1);
}

form input {
	background-color: #fff;
	width: 180px;
	height: 29px;
	padding: 0px 5px 0px 5px;
	font-size: 110%;
}

form input[type="submit"] {
	margin: 10px;
	height: 30px;
	border: 1px solid #aaa;
	background: #ace;
}