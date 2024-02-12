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
					var retour = JSON.parse(xhr.responseText);
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
					var retour = JSON.parse(xhr.responseText);
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
		var xhr = new XMLHttpRequest();

		xhr.onreadystatechange = function () {
			if (xhr.readyState == 4) {
				if (xhr.status == 200) {
					var retour = JSON.parse(xhr.responseText);
					resolve(retour);
				} else {
					reject(new Error("Error: " + xhr.status));
				}
			}
		};

		xhr.open(method, href);
		xhr.send(formData);
	});
};

/**
 * 
 * la meme chose mais on utilise @function execute.php
 */
function sendOne(data, name) {
	return send("traitement/execute.php", data, name)

}
function submitForm(idForm, method) {
	return submit("traitement/execute.php", idForm, method);

}

//data fetch

function fetchData(name) {
	return fetch("traitement/fetch.php?action="+name);

}