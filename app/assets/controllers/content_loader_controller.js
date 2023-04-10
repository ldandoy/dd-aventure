// src/controllers/content_loader_controller.js
import { Controller } from "@hotwired/stimulus"

export default class extends Controller {
    static values = { url: String }

    connect() {
        this.load({ params: {url: this.urlValue }})
    }

    load({ params: { url } }) {
        fetch(url)
            .then(response => response.text())
            .then(html => this.element.innerHTML = html)
    }
}