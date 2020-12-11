var list = [
	
];


//somando total
function getTotal(list){
	var total = 0;
	for(var key in list){
		total += list[key].value * list[key].amount;
	}
	document.getElementById("totalValue").innerHTML = formatValue(total);
}

//criando a tabela
function setList(list){
	var table = '<thead><tr><td>Produto</td><td>Qtd</td><td>Valor</td><td>Opções</td></tr></thead><tbody>';
	for(var key in list){
		table += '<tr><td>'+ formatDesc(list[key].desc) +'</td><td>'+ formatAmount(list[key].amount) +'</td><td>'+ formatValue(list[key].value) +'</td><td> <button class="btn btn-default" onclick="deleteData('+key+');">Retirar</button></td></tr>';
	}
	table += '</tbody>';

	document.getElementById('listTable').innerHTML = table;
	getTotal(list);
	saveListStorage(list);
}

//formatando o nome do produto
function formatDesc(desc){
	var str = desc.toLowerCase();
	str = str.charAt(0).toUpperCase() + str.slice(1);
	return str;
}

//formatando a quantidade
function formatAmount(amount){
	return parseInt(amount);
}

//formatando o preço
function formatValue(value){
	var str = parseFloat(value).toFixed(2) + "";
	str = str.replace(".",",");
	str = "$ " + str;
	return str;
}

//adicionar novo produto
function addData(){
	if(!validation()){
		return;
	}
	var desc = document.getElementById("desc").innerHTML;
	var amount = document.getElementById("amount").value;
	var value = document.getElementById("value").innerHTML;

	list.unshift({"desc":desc , "amount":amount , "value":value });
	setList(list);
	
}





//deletando os dados
function deleteData(id){
	if(confirm("Tem certeza que deseja retirar o item?")){
		if(id === list.length - 1){
			list.pop();
		}else if(id === 0){
			list.shift();
		}else{
			var arrAuxIni = list.slice(0,id);
			var arrAuxEnd = list.slice(id + 1);
			list = arrAuxIni.concat(arrAuxEnd);
		}
		setList(list);
	}
}

//validando e printando erros
function validation(){
	var desc = document.getElementById("desc").innerHTML;
	var amount = document.getElementById("amount").value;
	var value = document.getElementById("value").innerHTML;
	var errors = "";
	document.getElementById("errors").style.display = "none";

	if(desc === ""){
		errors += '<p>erro na desc</p>';
	}
	if(amount === ""){
		errors += '<p>erro na qtd</p>';
	}else if(amount != parseInt(amount)){
		errors += '<p>erro na qtd</p>';
	}
	if(value === ""){
		errors += '<p> 1 erro na preco</p>';
	}else if(value != parseFloat(value)){
		errors += '<p>erro na preco</p>';
	}

	if(errors != ""){
		document.getElementById("errors").style.display = "block";
		document.getElementById("errors").innerHTML = "<h3>Error:</h3>" + errors;
		return 0;
	}else{
		return 1;
	}
}



//salvando em storage
function saveListStorage(list){
	var jsonStr = JSON.stringify(list);
	localStorage.setItem("list",jsonStr);
}

//verifica se já tem algo salvo
function initListStorage(){
	var testList = localStorage.getItem("list");
	if(testList){
		list = JSON.parse(testList);
	}
	setList(list);
}

initListStorage();