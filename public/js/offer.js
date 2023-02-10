document.getElementById("offer_title").innerText      = offer.title;
document.getElementById("offer_pricing").innerText    = `${offer.kg_price}/kg + ${offer.hour_price}/h`;
document.getElementById("offer_diameter").innerText   = `średnica dyszy: ${offer.diameter}`;
document.getElementById("offer_type").innerText       = `typ drukarki: ${offer.printer_type}`;
document.getElementById("offer_area").innerText       = "Kraków";
document.getElementById("offer_date").innerText       = offer.date_added.date;

document.getElementById("picture").src = offer.picture;