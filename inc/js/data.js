function navigator() {
	var xhr;
	try { xhr = new ActiveXObject('Msxml2.XMLHTTP'); }
	catch (e) {
		try { xhr = new ActiveXObject('Microsoft.XMLHTTP'); }
		catch (e2) {
			try { xhr = new XMLHttpRequest(); }
			catch (e3) {
				xhr = false;
				console.log(e3-- > getMessage());
			}
		}
	}
	return xhr;
}


// data sending 



function fetch(href,/* data */) {
	return new Promise((resolve, reject) => {
		// var formData = new FormData();
		// formData.append("action", data);
		var xhr = new XMLHttpRequest();

		xhr.onreadystatechange = function () {
			if (xhr.readyState == 4) {
				if (xhr.status == 200) {
					var retour = xhr.responseText;
					resolve(retour);
				} else {
					reject(new Error("Error: " + xhr.status));
				}
			}
		};

		xhr.open("GET", href);
		xhr.send();
	});
}

/**
 * 
 * @param {string} herf lien 
 * @param {string} data valeur
 * @param {string} name cle
 * @param {string} method POST ou GET
 * @returns 
 */
function send(href, data, name,method) {
	return new Promise((resolve, reject) => {
		var formData = new FormData();
		formData.append(name, data);
		var xhr = new XMLHttpRequest();

		xhr.onreadystatechange = function () {
			if (xhr.readyState == 4) {
				if (xhr.status == 200) {
					var retour = xhr.responseText;
					resolve(retour);
				} else {
					reject(new Error("Error: " + xhr.status));
				}
			}
		};

		xhr.open(method, href);
		xhr.send(formData);
	});

}

/**
 * 
 * @param {string} href lien 
 * @param {string} idForm id du formulaire
 * @param {string} method POST ou GET
 */
function submit(href, idForm, method) {
	return new Promise((resolve, reject) => {
		var formData = new FormData(document.getElementById(idForm));
		console.log(formData);
		var xhr = navigator();

		xhr.onreadystatechange = function () {
			if (xhr.readyState == 4) {
				if (xhr.status == 200) {
					var retour = xhr.responseText;
					resolve(retour);
				} else {
					reject(new Error("Error: " + xhr.status));
				}
			}
		};

		xhr.open(method, href,true);
		xhr.send(formData);
	});
};

/**
 * 
 * la meme chose mais on utilise @function execute.php
 */
function sendExecute(data, name,method) {
	return send("traitement/execute.php", data, name,method);

}
function submitFormExecute(idForm, method) {
	return submit("traitement/execute.php", idForm, method);

}

//data fetch

function fetchData(name) {
	return fetch("traitement/fetch.php?action="+name);
}

function sendFetch(data, name,method) {
	return send("traitement/fetch.php", data, name,method);

}
function submitFormFetch(idForm, method) {
	return submit("traitement/fetch.php", idForm, method);
}

function send_or_fetch_FormData(href,form,method){
	return new Promise((resolve, reject) => {
		
		var xhr = navigator();

		xhr.onreadystatechange = function () {
			if (xhr.readyState == 4) {
				if (xhr.status == 200) {
					var retour = xhr.responseText;
					resolve(retour);
				} else {
					reject(new Error("Error: " + xhr.status));
				}
			}
		};

		xhr.open(method, href,true);
		xhr.send(form);
	});
}

// Exemple utilisation

// document.getElementById("hehehe").addEventListener("click", function () {
// 			var result = document.getElementById("result");

// 			fetchData("addition&n1=23&n2=32")
// 				.then((resultat) => {
// 					console.log(resultat); // Log the resolved value
// 					result.innerHTML = resultat.result;
// 				})
// 				.catch((err) => {
// 					console.error(err);
// 				});
// 		});