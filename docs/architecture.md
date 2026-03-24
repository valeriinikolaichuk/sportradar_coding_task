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
- Transforms entities into DTOs before sending data to the view layer.
- Keeps the controller thin — it only receives input and delegates processing to the pipeline.
- Designed for extensibility: new filters or transformations can be added as separate pipeline steps without modifying existing logic.
- Supports both default and parameter-driven scenarios (e.g., ascending/descending sorting) in a unified flow.

|Component| Responsibility |
|----------|-----------|
|EventController|Acts as a thin layer that receives input (JSON request), invokes the pipeline, and returns rendered HTML|
