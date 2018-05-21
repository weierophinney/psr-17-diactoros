# PSR-17 &lt;-&gt; Diactoros implementation

This is a sandbox for developing the PSR-17 interfaces, and seeing how
implementations might be created, using Diactoros as the underlying PSR-7
implementation for generated instances.

Interfaces are in the [interfaces tree](src/interfaces/).

Currently, it describes four possible implementations:

- [decorated](src/decoration/): This approach has any implementation of an
  interface that extends other interfaces _compose_ the collaborators, and act
  as a _proxy_ to those collaborators via the implementation methods.

- [duplicated](src/duplicated/): This approach has any implementation of an
  interface that extends other interfaces fully define all methods _in situ_
  (and thus _duplicating_ logic).

- [static factories](src/static/): This approach uses abstract static factories
  to define reusable factories for any interfaces that may be re-used/extended.
  Implementations then proxy to the static methods.

- [traits](src/trait/): This approach is similar to the static approach, but
  instead defines PHP traits; implementations compose these in order to provide
  implementations.
