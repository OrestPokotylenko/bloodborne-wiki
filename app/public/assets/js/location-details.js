document.addEventListener("DOMContentLoaded", () => {
    const locationData = localStorage.getItem("selectedLocation");
    const locationDetailsContainer = document.getElementById("locationDetails");

    if (locationData) {
        const location = JSON.parse(locationData);

        locationDetailsContainer.innerHTML = `
            <h1>${location.name}</h1>
            <img src="${location.imgPath}" alt="${location.name}" class="location-image">
            <table class="location-details-table">
                <tr><th>After</th><td>${location.after || 'N/A'}</td></tr>
                <tr><th>Leads To</th><td>${location.leadsTo || 'N/A'}</td></tr>
                <tr><th>Description</th><td>${location.description}</td></tr>
                <tr><th>Bosses</th><td>${location.bosses || 'None'}</td></tr>
            </table>
        `;
    } else {
        locationDetailsContainer.innerHTML = "<p>Location details not found.</p>";
    }
});