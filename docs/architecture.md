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
