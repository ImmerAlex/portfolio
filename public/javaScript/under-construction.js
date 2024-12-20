// Date au format MM-DD-YYYY UTC+1 00:00:00
const openDate = new Date('2025-01-31T00:00:00+01:00');

// Fonction qui calcule le temps restant avant la date d'ouverture
// (mois, jours, heures, minutes, secondes)
const calculateTime = () => {
    const now = new Date();
    const diff = openDate - now;
    
    const months = Math.floor(diff / (1000 * 60 * 60 * 24 * 30));
    const days = Math.floor(diff / (1000 * 60 * 60 * 24)) % 30;
    const hours = Math.floor(diff / (1000 * 60 * 60)) % 24;
    const minutes = Math.floor(diff / (1000 * 60)) % 60;
    const seconds = Math.floor(diff / 1000) % 60;
    return { months, days, hours, minutes, seconds };
}

// Fonction qui met à jour le contenu de la page
const updateContent = () => {
    const time = calculateTime();
    document.getElementById('months').innerText = time.months;
    document.getElementById('days').innerText = time.days;
    document.getElementById('hours').innerText = time.hours;
    document.getElementById('minutes').innerText = time.minutes;
    document.getElementById('seconds').innerText = time.seconds;
}

// Met à jour le contenu de la page toutes les secondes
setInterval(updateContent, 1000);
updateContent();