<pre>
        AddEventController
            ↓
    SerializerInterface
            ↓
      CreateEventDTO
            ↓
    ValidatorInterface
            |
        .------ Symfony Validation System ----.
        ↓                                     ↓
Assert (NotBlank)                       Constraint (UniqueEvent ?)
        ↓                                     ↓
      error ?                           UniqueEventValidator
                                              ↓
                                          EventRepository
    .-----------------------------------------'     ↑
    ↓                   ↓                           |
  error ?         AddEventService ------------------'
   _________________________________________________
                            ↓
                          JSON
                            ↓
                     events_controller
                            ↓
                    EventController (Event Module)
</pre>