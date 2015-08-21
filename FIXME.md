Suggested items to fix:

- Can we split runtime and migration database credentials? It's ideal to use a runtime user that only grants the minimum necessary permissions, without the ability to drop databases and create tables etc.

- Download any fonts required (e.g. Lato) so that functional tests do not have Google as a network dependency.
