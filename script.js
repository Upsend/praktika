window.onload = function (){
	document.getElementsByClassName('autos')[0].style.display = 'block';
}
//-------------open----------------
document.getElementById('auto').onclick = function(){
	document.getElementsByClassName('user')[0].style.display = 'none';
	document.getElementsByClassName('drivers')[0].style.display = 'none';
	document.getElementsByClassName('autos')[0].style.display = 'block';
	document.getElementsByClassName('objectss')[0].style.display = 'none';
}
document.getElementById('sprav').onclick = function(){
	document.getElementsByClassName('user')[0].style.display = 'none';
	document.getElementsByClassName('autos')[0].style.display = 'none';
	document.getElementsByClassName('drivers')[0].style.display = 'block';
	document.getElementsByClassName('objectss')[0].style.display = 'none';
}
document.getElementById('user').onclick = function(){
	document.getElementsByClassName('drivers')[0].style.display = 'none';
	document.getElementsByClassName('autos')[0].style.display = 'none';
	document.getElementsByClassName('user')[0].style.display = 'block';
	document.getElementsByClassName('objectss')[0].style.display = 'none';
}
document.getElementById('obj').onclick = function(){
	document.getElementsByClassName('drivers')[0].style.display = 'none';
	document.getElementsByClassName('autos')[0].style.display = 'none';
	document.getElementsByClassName('user')[0].style.display = 'none';
	document.getElementsByClassName('objectss')[0].style.display = 'block';
}


//------------------------------

// ------------------closing----------------
document.getElementById('close3').onclick = function(){
	document.getElementsByClassName('user')[0].style.display = 'none';
}
document.getElementById('close1').onclick = function(){
	document.getElementsByClassName('drivers')[0].style.display = 'none';
}
document.getElementById('close4').onclick = function(){
	document.getElementsByClassName('autos')[0].style.display = 'none';

}
document.getElementById('close2').onclick = function(){
	document.getElementsByClassName('objectss')[0].style.display = 'none';
}
//-------------------------------