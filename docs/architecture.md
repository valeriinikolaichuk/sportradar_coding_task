## Architecture Overview
This document describes the **backend architecture** of the project  

### Main Module  
**Role:**
- Provides the entry point of the application.
- Renders the base page with a navigation bar and a container for events, which will later be populated dynamically via **Turbo/Stimulus**.  

**Notes:**
- All event-related logic (fetching, sorting, filtering) is handled in a separate modules.
- This module serves purely as the static layout and entry point, suitable for server-driven dynamic updates via **Turbo**.

|Component| Responsibility |
|----------|-----------|
|MainController.php|Defines the / route. Renders `index.html.twig`. Does not handle events or business logic.|
|index.html.twig|Contains a navigation bar with placeholder links. Includes a `<turbo-frame>` container for dynamic event content|

---

### Event Module  
**Role:**
- Handles retrieval, processing, and presentation of event data.
- Acts as the core module responsible for delivering event listings to the frontend.
- Provides data dynamically based on client-side requests (e.g., sorting, filtering) via **Turbo/Stimulus**.

**Notes:**
- Follows a **Pipeline architecture**, where data is processed step-by-step through independent components.
- Uses a single repository for data access, ensuring consistency across all scenarios.
- Applies business logic (default selection, sorting) through dedicated pipeline steps rather than controllers.
- Transforms entities into **DTO**s before sending data to the view layer.
- Keeps the controller thin — it only receives input and delegates processing to the pipeline.
- Designed for extensibility: new filters or transformations can be added as separate pipeline steps without modifying existing logic.
- Supports both default and parameter-driven scenarios (e.g., ascending/descending sorting) in a unified flow.

|Component| Responsibility |
|----------|-----------|
|EventController|Entry point for `/events` endpoint. Acts as a layer that receives request and returns rendered HTML|
|EventPipelineFactory|Assembles ordered pipeline steps and returns configured EventPipeline instance|
|EventPipeline|Executes all processing steps sequentially using `supports()` and `process()`|
|EventPipelineInterface|Defines a contract for all **pipeline** steps. Ensures consistent structure for processing event data|
|EventProvider|Fetches events from database via `EventRepository`|
|DefaultEventFilter|Splits events into past and future, applies limits|
|SortAscScenario|Sorts events by datetime ascending|
|SortDescScenario|Sorts events by datetime descending|
|EventMapper	|Transforms `Event` entities into DTO objects for presentation|
|EventDTO	|Main data structure for UI (date, time, teams, result, competition, etc.)|
|TeamDTO	|Represents team-related data (name, slug, country code, etc.)|
|ResultDTO	|Encapsulates match result (scores, winner, metadata)|
|StageDTO	|Represents competition stage information|
|events_controller.js|**Stimulus** controller responsible for loading and updating event table|
