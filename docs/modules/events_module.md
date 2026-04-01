<pre>
     EventController
            ↓
  EventPipelineFactory 
            |
            ↓create()
       EventPipeline -----------------> [EventPipelineInterface steps]
            |                
            |--> DefaultEventFilter <------- EventRepository
            |
          ? |--> SortDescScenario 
            |
          ? |--> SortByStageAsc
            |
          ? |--> SortByStageDesc
            |
            |--> EventMapper ----> EventDTO
            |                         |- TeamDTO
            |                         |- ResultDTO
            |                         |- StageDTO
            ↓
    events/_table.html.twig
            ↓
    events_controller.js
            ↓
      index.html.twig
</pre>
