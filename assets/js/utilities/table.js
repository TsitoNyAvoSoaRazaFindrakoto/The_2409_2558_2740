function createTable(headers, data) {
    var table = document.createElement("table");
    table.className = "table align-items-center mb-0";

    var thead = document.createElement("thead");
    var headerRow = document.createElement("tr");
    headers.forEach(header => {
        var th = document.createElement("th");
        th.className = "text-uppercase text-primary text-sm font-weight-bolder";

        var texte = document.createTextNode(header);
        
        th.appendChild(texte);
        headerRow.appendChild(th);
    });

    thead.appendChild(headerRow);
    table.appendChild(thead);

    var tbody = document.createElement("tbody");
    data.forEach(row => {
        // console.log(row);
        var tr = document.createElement("tr");

        row.forEach(dataCell => {
            var td = document.createElement("td");
            var texte = document.createTextNode(dataCell);
            td.appendChild(texte);
            tr.appendChild(td);
        });

        tbody.appendChild(tr);
    });
    table.appendChild(tbody);

    return table;
}