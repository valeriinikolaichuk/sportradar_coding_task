import { Turbo } from "@hotwired/turbo"
import { Application } from "@hotwired/stimulus"
import EventsController from "./controllers/events_controller.js"

const application = Application.start()
application.register("events", EventsController)