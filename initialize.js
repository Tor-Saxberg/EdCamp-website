function login(){

	document.getElementById('form-login').style.display = 'inline-block';
	document.getElementById('form-create').style.display = 'none';
}
function create(){

	document.getElementById('form-login').style.display = 'none';
	document.getElementById('form-create').style.display = 'inline-block';
}
function anotherCamp(){
	document.getElementById('form-register').style.display = 'block';
	document.getElementById('logged-in').style.display = "block";
	document.getElementById('message').style.display = "none";
	document.getElementById('button-anotherCamp').style.display = 'none';
	document.getElementById('drop').setAttribute("value", 0);
}
function anotherItem(){
	document.getElementById('form-register').style.display = 'block';
	document.getElementById('logged-in').style.display = "block";
	document.getElementById('message').style.display = "none";
	document.getElementById('button-anotherItem').style.display = 'none';
	document.getElementById('dropping').style.display = "inline-block";
	document.getElementById('drop').setAttribute("value", 0);

}
function anotherChild(){
			location.reload(true);
	
}
function droppingCamp(){
	document.getElementById('drop').setAttribute("value", 1);
	document.getElementById('message').innerHTML = "deregister from which camp?";
	document.getElementById('message').style.display = "block";
	document.getElementById('dropping').style.display = "none";
	document.getElementById('button-anotherCamp').style.display = "inline-block";
	document.getElementById('form-register').style.display = 'block';
	document.getElementById()

}
function droppingItem(){
	document.getElementById('drop').setAttribute("value", 1);
	document.getElementById('message').innerHTML = "drop  which item?";
	document.getElementById('message').style.display = "block";
	document.getElementById('dropping').style.display = "none";
	document.getElementById('button-anotherItem').style.display = "inline-block";
	document.getElementById('form-register').style.display = 'block';
}
function selectCamp(e){

    var target = getAncestor(event.target, "camp-ul");
	var name = target.getElementsByClassName('name')[0].innerHTML;
	document.getElementById('input-camp').setAttribute("value",name);
	var price = target.getElementsByClassName('price')[0].innerHTML;
	document.getElementById('price').setAttribute("value", price);
}
function selectItem(e){
    var target = getAncestor(event.target, "item-list-ul");
	var name = target.getElementsByClassName('item-name')[0].innerHTML;
	document.getElementById('input-item').setAttribute("value",name);
	var price = target.getElementsByClassName('item-fee')[0].innerHTML;
	document.getElementById('price').setAttribute("value", price);
}
function getAncestor(node, cl) {
    while (node) {
        if (node.nodeType == 1 && node.parentNode.className == cl) {
            return node;
        }
        node = node.parentNode;
    }
    return null;
}
function registerEvents(){
	document.getElementById('button-login').addEventListener('click', function(){ login() }, 'false');
	document.getElementById('button-create').addEventListener('click', function(){ create() }, 'false');
	var list;
		// set listeners for camp list
	if( list = document.querySelectorAll(".camp-list") ){
		for (var i = 0; i < list.length; i++) {
			list[i].addEventListener('click', function(){ selectCamp() }, 'false');
		}
	}
		// set listeners for item list
	if(list = document.querySelectorAll(".item-list") ){
		for (var i = 0; i < list.length; i++) {
			list[i].addEventListener('click', function(){ selectItem() }, 'false');
		}
	}
	return;
}