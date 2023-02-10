/** @type {HTMLInputElement} */
const searchInput = document.getElementById("search_input");
/** @type {HTMLDivElement} */
const results = document.getElementById("results_container");

/** @type {HTMLButtonElement} */
const submit = document.getElementById("submit_button");

/** @type {HTMLFormElement} */
const filterForm = document.getElementById("filter_form");

adjustHeader();
fillSearchBar();

function createOffer(title, hourPrice, kgPrice, area, date, picture, diameter, printerType) {

    let offer = document.createElement("div");
    offer.classList.add("offer");

    let img = document.createElement("img");
    img.src = picture;
    img.srcset = "/public/resources/svg/sam_baines/981320_cartesian_enclosed_fdm_printer_icon.svg";

    let offer_info = document.createElement("div");
    offer_info.classList.add("offer-info");

    let top = document.createElement("div");
    top.classList.add("top");

    let offer_title = document.createElement("h2");
    offer_title.classList.add("offer-title");
    offer_title.innerText = title;

    let offer_pricing = document.createElement("p");
    offer_pricing.classList.add("offer-pricing");
    offer_pricing.innerText = `${kgPrice}zł/kg + ${hourPrice}zł/h`;
    
    let middle = document.createElement("div");
    
    let nozzle = document.createElement("p");
    nozzle.innerText = `średnica dyszy: ${diameter}`;

    let type = document.createElement("p");
    type.innerText = `typ drukarki: ${printerType}`;

    let bottom = document.createElement("div");
    bottom.classList.add("bottom");

    let offer_area = document.createElement("p");
    offer_area.classList.add("offer-area");
    offer_area.innerText = "Kraków";

    let offer_date = document.createElement("p");
    offer_date.classList.add("offer-date");
    offer_date.innerText = date.date;

    offer.appendChild(img);
    offer.appendChild(offer_info);

    offer_info.appendChild(top);
    offer_info.appendChild(middle);
    offer_info.appendChild(bottom);

    top.appendChild(offer_title);
    top.appendChild(offer_pricing);
    
    middle.appendChild(nozzle);
    middle.appendChild(type);

    bottom.appendChild(offer_area);
    bottom.appendChild(offer_date);

    return offer;
}

function performSearch() {
    let query = searchInput.value;
    let filters = new FormData(filterForm);

    filters.append("query", query);

    let searchResults = fetch("/search", {
        method: "POST",
        body: filters,
    }).then((r) => r.json())
        .then(loadSearchResults);
}

/**
 * 
 * @param {Array.<Object>} results 
 */
function loadSearchResults(searchResults) {
    results.innerHTML = "";

    for (offer of searchResults) {
        results.appendChild(
            createOffer(
                offer.title,
                offer.hour_price,
                offer.kg_price,
                offer.area,
                offer.date_added,
                offer.picture,
                offer.diameter,
                offer.printer_type
            ));
    }
}


function adjustHeader() {
    submit.type = "button";
    submit.onclick = performSearch;
    
    /**
     * @type {HTMLFormElement}
     */
    let form = document.getElementsByClassName("searchbar")[0];
    form.action = "javascript:performSearch();";
    filterForm.action = "javascript:performSearch();";
}

function fillSearchBar() {
    let url = new URL(document.URL);
    let query = url.searchParams.get("query");
    searchInput.value = query;
    if (query.length > 0)
        performSearch();
}