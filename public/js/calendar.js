document.addEventListener('DOMContentLoaded', function () {
    const calendarEl = document.getElementById('calendar');

    // Função para gerar um calendário simples de 30 dias
    function createCalendar(events) {
        for (let day = 1; day <= 30; day++) {
            const dayEl = document.createElement('div');
            dayEl.classList.add('day');
            dayEl.textContent = day;

            // Verificar se há eventos no dia atual
            const event = events.find(e => new Date(e.event_date).getDate() === day);
            if (event) {
                const eventEl = document.createElement('div');
                eventEl.classList.add('event');
                eventEl.textContent = event.title;
                dayEl.appendChild(eventEl);
            }

            calendarEl.appendChild(dayEl);
        }
    }

    // Função para buscar eventos do PHP (banco de dados)
    function fetchEvents() {
        fetch('get_events.php')
            .then(response => response.json())
            .then(events => {
                createCalendar(events);
            })
            .catch(error => {
                console.error('Erro ao carregar os eventos:', error);
            });
    }

    fetchEvents();
});
