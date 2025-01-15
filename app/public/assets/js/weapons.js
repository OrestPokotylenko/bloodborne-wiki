document.addEventListener("DOMContentLoaded", async () => {
    const weaponGrid = document.getElementById("weaponGrid");

    async function fetchWeapons() {
        try {
            const response = await fetch("/api/get-weapons");
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            const data = await response.json();
            return data.data;
        } catch (error) {
            console.error("Failed to fetch weapons:", error);
            return [];
        }
    }

    function renderWeapons(weapons) {
        const weaponGrid = document.getElementById("weaponGrid");
    
        weapons.forEach((weapon) => {
            const weaponCard = document.createElement("div");
            weaponCard.classList.add("weapon-card");
    
            const weaponLink = document.createElement("a");
            weaponLink.href = `/weapons/details`;
            weaponLink.addEventListener("click", () => {
                localStorage.setItem("selectedWeapon", JSON.stringify(weapon));
            });
    
            const weaponImage = document.createElement("img");
            weaponImage.src = weapon.imgPath;
            weaponImage.alt = weapon.name;
    
            const weaponName = document.createElement("p");
            weaponName.classList.add("weapon-name");
            weaponName.textContent = weapon.name;
    
            weaponLink.appendChild(weaponImage);
            weaponLink.appendChild(weaponName);
            weaponCard.appendChild(weaponLink);
            weaponGrid.appendChild(weaponCard);
        });
    }
    
    const weapons = await fetchWeapons();
    renderWeapons(weapons);
});