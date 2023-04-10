// assets/controllers/say-hello-controller.js
import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ['name', 'output']

    connect() {
        console.log('connect component say hello')
    }

    greet() {
        this.outputTarget.textContent = `Hello, ${this.nameTarget.value}!`
    }

    disconnect() {
        console.log('disconnect component say hello')
    }
}