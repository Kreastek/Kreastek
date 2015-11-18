<?php
	header("Content-type: text/css; charset: UTF-8");

	$pageWidth = "1170px";
	$menuColor = "rgba(83, 81, 81, 1)";
?>

body {
    background-color: #EEE;
    margin: 0 0 100px; /* bottom = footer height */
    padding-top: 50px;
    padding-bottom: 20px;
}

.afrekenKnop {
	padding-top: 20px;
	padding-right: 0px !important;
}

.deleteX {
	color: red;
}

.deleteX:hover {
	color:
}

<!--wm = winkelmandje-->
.wmTable {
	width: 100%;
}

.wmImg {
	margin-bottom: 5px;
	height: 50px;
	float: right;
}

.wmTd {
	width: 24%;
	padding-left: 5px;
}

.wmPrijs {
	text-align: right;
	padding-right: 5px;
}

.wmTdStatus {
	color: green;
}

.wmTdRemove {
	width: 4%
}

.wmTrTotaal {
	border-top: 1px solid #000;
}

.wmTh {
	font-weight: bold;
	font-size: 16px;
	padding-left: 5px;
}

.container {
    margin-top: 56px;
	width: <?php echo $pageWidth;?> !important;
}

.productOverzichtPositioner {
    width: 33%;
    padding: 10px;
    float:left;
}
.productOverzichtContainer {
    width: 100%;
    height: 100%;
    border-radius: 10px;
    background-color: white;
    padding: 12px;
    border: 1px solid white;
}
.productOverzichtContainer:hover {
    cursor: pointer;
    border: 1px solid black;
}
.productOverzichtImg {
    width: 100%;
    height: 250px;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}
.productOverzichtTitle {
    width: 60%;
    float: left;
    font-size: 25px;
    text-decoration: underline;
    margin-top: 5px;
}
.productOverzichtPrijs {
    width: 40%;
    float: left;
    font-size: 25px;
    margin-top: 5px;
    text-align: right;
}
.productOverzichtBeschrijving {
    height: 100px;
    width: 100%;
    text-overflow: ellipsis;
    overflow: hidden;
}

.detailFotoImg {
    width: 40%;
    float:left;
    border: solid lightgrey 1px;
}
.detailFotoTitle {
    font-size: xx-large;
    text-decoration: underline;
    width: 100%;
}
.detailFotoPrijs {
    font-size: 25px;
    width: 100%;
    text-align: left;
    float:left;
    margin-bottom: 40px;
}
.detailBeschrijvingTitle {
    width: 100%;
    float: left;
    font-size: 25px;
    margin-bottom: 1px;
}
.detailBeschrijvingUnderline {
    margin-top: 0px;
    margin-bottom: 1px;
    width: 100%;
    height: 1px;
    float: left;
    background-color: black;
}
.detailBeschrijvingContainer {
    float:left;
    margin-top: 20px;
    width: 100%;
}
.detailRightContainer {
    width: 58%;
    margin-left: 2%;
    float:left;
}
.detailToelichtingText {
    color: green;
    font-size: 15px;
    margin: 0px;
}
.detailButton {
    margin-top: 180px;
}
.detailButton:hover {
    border-color: black;
    border-width: 1px;
}

.NoBlueA {
    color: #000000;
    text-decoration: none;
}
.NoBlueA:hover {
    color: #000000;
}

html {
    position: relative;
    min-height: 100%;
}

footer {
    position: absolute;
    left: 0;
    bottom: 0;
    height: 100px;
    width: 100%;
    text-align: center;
}

#menubalk {
	background-color: transparent !important;
	margin: auto;
	height: 100%;
	width: <?php echo $pageWidth;?> !important;
}

.navbar {
	background-color: <?php echo $menuColor;?> !important;
	background-image:none !important;
}

.navbar-collapse
{
	padding-top: 3px;
	padding-bottom: 3px !important
}

.dropdown-menu
{
	width: 300px;
	border-top: 0px;
	margin-top: 3px;
}

.dropdown-menu
.col-sm-12
{
	margin-bottom: 7px;
}

.dropdown-menu:after
{
    content: '';
    display: inline-block;
    border-left: 6px solid transparent;
    border-right: 6px solid transparent;
    border-bottom: 6px solid #ffffff;
    position: absolute;
    top: -6px;
    right: 10px;
}