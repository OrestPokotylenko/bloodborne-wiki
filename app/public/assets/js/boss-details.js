document.addEventListener("DOMContentLoaded", () => {
    const bossData = localStorage.getItem("selectedBoss");
    const bossDetailsContainer = document.getElementById("bossDetails");

    if (bossData) {
        const boss = JSON.parse(bossData);

        bossDetailsContainer.innerHTML = `
            <h1>${boss.name}</h1>
            <p><strong>Location:</strong> ${boss.location}</p>
            <p><strong>Affiliation:</strong> ${boss.affiliation}</p>
            <img src="${boss.imgPath}" alt="${boss.name}" class="boss-image">
            <p class="boss-description">${boss.description}</p>
            <p class="boss-lore"><strong>Lore:</strong> ${boss.lore}</p>
            <table class="boss-details-table">
                <tr><th>Health</th><td>${boss.health}</td></tr>
                <tr><th>Blood Echoes</th><td>${boss.bloodEchoes}</td></tr>
                <tr><th>Loot</th><td>${boss.loot}</td></tr>
                <tr><th>Physical Defence</th><td>${boss.physicalDefence}</td></tr>
                <tr><th>Blunt Defence</th><td>${boss.bluntDefence}</td></tr>
                <tr><th>Thrust Defence</th><td>${boss.thrustDefence}</td></tr>
                <tr><th>Bolt Defence</th><td>${boss.boltDefence}</td></tr>
                <tr><th>Fire Defence</th><td>${boss.fireDefence}</td></tr>
                <tr><th>Blood Defence</th><td>${boss.bloodDefence}</td></tr>
                <tr><th>Arcane Defence</th><td>${boss.arcaneDefence}</td></tr>
                <tr><th>Slow Poison Defence</th><td>${boss.slowPoisonDefence}</td></tr>
                <tr><th>Rapid Poison Defence</th><td>${boss.rapidPoisonDefence}</td></tr>
            </table>
        `;
    } else {
        bossDetailsContainer.innerHTML = "<p>Boss details not found.</p>";
    }
});
