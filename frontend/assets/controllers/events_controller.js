import { Controller } from "@hotwired/stimulus";

export default class extends Controller {
    connect() {
        this.load();
    }

    sortAsc() {
//        this.load({ sort: "asc" });
        this.load();
    }

    sortDesc() {
        this.load({ sort: "desc" });
    }

    stageUp() {
        this.load({ sort: "stage_up" });
    }

    stageDown() {
        this.load({ sort: "stage_down" });
    }

    load(params) {
        fetch('/events', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(params)
        })
        .then(res => res.text())
        .then(html => {
            document.getElementById('events-container').innerHTML = html;
        });
    }

    loadOne(id) {
        fetch(`/event/${id}`)
            .then(res => res.json())
            .then(data => {
                const eventDTO = data.data;
                document.getElementById('event-modal-body').innerHTML = `
                    <p><strong>Date:</strong> ${eventDTO.date}</p>
                    <p><strong>Time:</strong> ${eventDTO.time}</p>
                    <p><strong>Competition:</strong> ${eventDTO.competition}</p>
                    <p><strong>Stage:</strong> ${eventDTO.stage?.name ?? '-'}</p>
                    <p><strong>Teams:</strong> ${eventDTO.homeTeam?.name ?? '-'} vs ${eventDTO.awayTeam?.name ?? '-'}</p>
                    <p><strong>Result:</strong> ${eventDTO.result?.homeGoals ?? '-'} : ${eventDTO.result?.awayGoals ?? '-'}</p>
                `;
                const modal = new bootstrap.Modal(document.getElementById('event-modal'));
                modal.show();
            });
    }

    createEvent(data) {
        fetch('/new_event', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
        .then(res => res.json())
        .then(data => {

            if (data.errors) {
                console.log('Validation errors:', data.errors);
                return;
            }

            if (data.reloadUrl) {
                this.load();
            }
        });
    }
}