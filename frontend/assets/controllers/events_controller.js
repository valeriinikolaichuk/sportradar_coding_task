import { Controller } from "@hotwired/stimulus";

export default class extends Controller {
    connect() {
        this.load();
    }

    sortAsc() {
        this.load({ sort: "asc" });
    }

    sortDesc() {
        this.load({ sort: "desc" });
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
}