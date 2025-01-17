document.addEventListener("DOMContentLoaded", async () => {
    const bossesGrid = document.getElementById("bossesGrid");

    async function fetchBosses() {
        try {
            const response = await fetch("/api/get-bosses");
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            const data = await response.json();
            return data.data;
        } catch (error) {
            console.error("Failed to fetch bosses:", error);
            return [];
        }
    }

    function renderBosses(bosses) {
        bosses.forEach((boss) => {
            const bossCard = document.createElement("div");
            bossCard.classList.add("boss-card");

            const bossLink = document.createElement("a");
            bossLink.href = `/bosses/details`;
            bossLink.addEventListener("click", () => {
                localStorage.setItem("selectedBoss", JSON.stringify(boss));
            });

            const bossImage = document.createElement("img");
            bossImage.src = boss.imgPath;
            bossImage.alt = boss.name;

            const bossName = document.createElement("p");
            bossName.classList.add("boss-name");
            bossName.textContent = boss.name;

            bossLink.appendChild(bossImage);
            bossLink.appendChild(bossName);
            bossCard.appendChild(bossLink);
            bossesGrid.appendChild(bossCard);
        });
    }

    const bosses = await fetchBosses();
    renderBosses(bosses);
});
