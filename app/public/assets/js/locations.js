document.addEventListener("DOMContentLoaded", async () => {
    const locationsGrid = document.getElementById("locationsGrid");

    async function fetchLocations() {
        try {
            const response = await fetch("/api/get-locations");
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            const data = await response.json();
            return data.data;
        } catch (error) {
            console.error("Failed to fetch locations:", error);
            return [];
        }
    }

    function renderLocations(locations) {
        locations.forEach((location) => {
            const locationCard = document.createElement("div");
            locationCard.classList.add("location-card");

            const locationLink = document.createElement("a");
            locationLink.href = `/locations/details`;
            locationLink.addEventListener("click", () => {
                localStorage.setItem("selectedLocation", JSON.stringify(location));
            });

            const locationImage = document.createElement("img");
            locationImage.src = location.imgPath;
            locationImage.alt = location.name;

            const locationName = document.createElement("p");
            locationName.classList.add("location-name");
            locationName.textContent = location.name;

            locationLink.appendChild(locationImage);
            locationLink.appendChild(locationName);
            locationCard.appendChild(locationLink);
            locationsGrid.appendChild(locationCard);
        });
    }

    const locations = await fetchLocations();
    renderLocations(locations);
});