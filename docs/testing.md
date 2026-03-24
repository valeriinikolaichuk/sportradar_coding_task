## Tests

### Purpose
The tests demonstrate:  
- Correct interaction with dependencies (repository mocking)
- Stability of filtering and sorting logic
- Proper mapping from entities to **DTO**s

### Running Tests

Execute all tests using:
- php bin/phpunit

### Notes:
- Tests use mock objects to isolate components
- Focus is on unit-level validation, not full integration
- Designed as lightweight **examples** to validate pipeline behavior

|Component| Responsibility |
|----------|-----------|
|EventProviderTest	|Verifies that events are correctly fetched from the repository|
|DefaultEventFilterTest	|Ensures filtering and basic sorting logic does not break|
|EventMapperTest	|Validates transformation of Event entities into DTO objects|

### Summary
The test suite provides a **minimal** but structured foundation for validating the `Events module` and demonstrates how **pipeline-based logic** can be tested in isolation.
