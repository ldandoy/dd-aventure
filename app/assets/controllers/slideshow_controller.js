import { Controller } from "@hotwired/stimulus"

export default class extends Controller {
    static targets = [ "slide" ]
    static values = { index: Number, default: 2 }

    next() {
        this.indexValue++
    }

    previous() {
        this.indexValue--
    }

    indexValueChanged() {
        this.showCurrentSlide()
    }

    showCurrentSlide() {
        this.slideTargets.forEach((element, index) => {
            element.hidden = index !== this.indexValue
        })
    }
}