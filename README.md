# PSR-17 &lt;-&gt; Diactoros implementation

This is a sandbox for developing the PSR-17 interfaces, and seeing how
implementations might be created, using Diactoros as the underlying PSR-7
implementation for generated instances.

> ### PROPOSED CHANGES
>
> This branch provides some proposed changes. Instead of using inheritance
> everywhere, this branch proposes:
>
> - Base interfaces: no inheritance
> - Union type/Collaborators interfaces: extend multiple interfaces in order to
>   provide factories for all collaborators.
>
> The idea is to provide a compromise: for DX purposes, users can typehint
> against the union type/collaborators interfaces. Otherwise, developers of
> implementations can still provide single-purpose implementations.
>
> Unlike the [feature/no-inheritance branch](https://github.com/weierophinney/psr-17-diactoros/tree/feature/no-inheritance),
> this branch creates a discrete version of each of the base factories, and then
> discrete union type factories; these latter compose the former and proxy to
> their methods.

Interfaces are in the [interfaces tree](src/interfaces/).

Implementation is in the [implementation tree](src/implementation/).
