document.addEventListener("DOMContentLoaded", () => {
    const weaponData = localStorage.getItem("selectedWeapon");
    const weaponDetailsContainer = document.getElementById("weaponDetails");

    if (weaponData) {
        const weapon = JSON.parse(weaponData);

        weaponDetailsContainer.innerHTML = `
            <h1>${weapon.name}</h1>
            <img src="${weapon.imgPath}" alt="${weapon.name}" class="weapon-image">
            <table class="weapon-details-table">
                <tr><th>Physical Attack</th><td>${weapon.physicalAtk || 'N/A'}</td></tr>
                <tr><th>Blood Attack</th><td>${weapon.bloodAtk || 'N/A'}</td></tr>
                <tr><th>Arcane Attack</th><td>${weapon.arcaneAtk || 'N/A'}</td></tr>
                <tr><th>Fire Attack</th><td>${weapon.fireAtk || 'N/A'}</td></tr>
                <tr><th>Bolt Attack</th><td>${weapon.boltAtk || 'N/A'}</td></tr>
                <tr><th>Bullet Use</th><td>${weapon.bulletUse || 'N/A'}</td></tr>
                <tr><th>Durability</th><td>${weapon.durability}</td></tr>
                <tr><th>Slow Poison</th><td>${weapon.slowPoison}</td></tr>
                <tr><th>Rapid Poison</th><td>${weapon.rapidPoison}</td></tr>
                <tr><th>Attack Vs. Kin</th><td>${weapon.atkVsKin}</td></tr>
                <tr><th>Attack Vs. Beasts</th><td>${weapon.atkVsBeasts}</td></tr>
                <tr><th>Strength Required</th><td>${weapon.strengthReq || 'N/A'}</td></tr>
                <tr><th>Skill Required</th><td>${weapon.skillReq || 'N/A'}</td></tr>
                <tr><th>Bloodtinge Required</th><td>${weapon.bloodtingeReq || 'N/A'}</td></tr>
                <tr><th>Arcane Required</th><td>${weapon.arcaneReq || 'N/A'}</td></tr>
                <tr><th>Weapon Type</th><td>${weapon.weaponType}</td></tr>
                <tr><th>Transform</th><td>${weapon.transform}</td></tr>
                <tr><th>Found</th><td>${weapon.found}</td></tr>
            </table>
        `;
    } else {
        weaponDetailsContainer.innerHTML = "<p>Weapon details not found.</p>";
    }
});
