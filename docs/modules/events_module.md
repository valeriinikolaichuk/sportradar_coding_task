<pre>
     EventController
            ↓
  EventPipelineFactory 
            |
            ↓create()
       EventPipeline -----------------> [EventPipelineInterface steps]
            |                
            |--> EventProvider <------- EventRepository
            |
            |--> DefaultEventFilter
            |
          ? |- SortAscScenario
            |
          ? |- SortDescScenario
            |
            |- EventMapper ----> EventDTO
            |                       |- TeamDTO
            |                       |- ResultDTO
            |                       |- StageDTO
            ↓
    events/_table.html.twig
            ↓
    events_controller.js
            ↓
      index.html.twig
</pre>
