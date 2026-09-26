Q1: You added a second filter without adding a single route. Explain why no new route was needed. Your answer should say something about what the router actually looks at.

A1: The router only matches on the path and the HTTP method, it doesn't look at the query string at all when deciding which route handles the request. So /medicines?type=Tablet and /medicines?type=Tablet&stock=Full both still hit the same medicines.index route since the path never changed. Adding stock as a second filter just meant reading one more value off the request in the controller, routing had already finished its job before that even happens.

Q2: Suppose you had built both filters as route parameters instead. Describe what the URL for 'year 4 only, no course filter' would have to look like, and why.

A2: Route parameters are positions in the path, so the router expects something sitting in every slot unless you specifically mark it optional. For year 4 with no course filter the URL would have to be something like /medicines/4/all, using a placeholder value instead of just leaving the course slot empty. That's the opposite of query strings where you can just not include a parameter you don't need, which is basically why query strings are the better for optional filters.

Q3: Your navigation link stays marked on a detail page and also when a filter is applied. Only one of those two needed a change to your pattern. Say which one, and why the other needed nothing.

A3: The detail page needed no change because request()->is('medicines') is an exact match on the path, so a detail page like /medicines/5 already fails that check on its own since the path is longer. The filter case did need a change because /medicines?type=Tablet has the exact same path as /medicines, so is() can't tell those two apart no matter how the pattern is written. That's why I had to add a separate has() check for the query string, since is() was never going to see it.

Q4: You deleted your old filter method but kept the empty store and update methods, even though none of the three can be reached by a URL. Explain the difference between them.

A4: The old filter method is fully gone now, so a route pointing at it would just error, nothing's left to call. Store and update are still real methods sitting in the controller, just not wired to a route yet. The rule is that keep code that isn't finished yet, delete code that's been replaced, store and update are work still coming later.