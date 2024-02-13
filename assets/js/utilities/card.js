function createCard(data) {
    var productCard = document.createElement("div");
    productCard.className = "ext-center text-white product-card col-sm-6 col-xl-4 flex-row mt-6 mb-6 bg-gradient-success justify-content-center row mx-5 p-4";

    var header = document.createElement("div");
    header.className = "col-10 row flex-column align-items-center justify-content-between";

    var imgContainer = document.createElement("div");
    imgContainer.className = "img-container flex-column align-items-center justify-content-center col-12";

    var img = document.createElement("img");
    img.src = "../assets/img/bg3.jpg";
    imgContainer.appendChild(img);

    header.appendChild(imgContainer);

    var headerText = document.createElement("div");
    headerText.className = "text-center mt-3 text-white";

    var title = document.createElement("h3");
    title.innerText = data["nom_variete"];

    var p = document.createElement("p");
    p.innerText = data["numero_parcelle"];

    headerText.appendChild(title);
    headerText.appendChild(p);

    header.appendChild(headerText);

    productCard.appendChild(header);

    var surface = document.createElement("p"); surface.innerText = data["surface_hectare"] + " ha";
    var pieds = document.createElement("p"); pieds.innerText = "Nombre de pieds : " + data["nbPied"];
    var pRestant = document.createElement("p"); pRestant.innerText = "Poids the restant : " + data["poids_restant"]+ " kg";

    productCard.appendChild(surface);
    productCard.appendChild(pieds);
    productCard.appendChild(pRestant);

    return productCard;
}