### Q1. Explain the order you placed your featured route and your detail route in, and what would happen if you swapped them.

I put `/movies/featured` before `/movies/{id}` in my `routes/web.php`. I did this because Laravel checks the routes from top to bottom. So when I go to `/movies/featured`, Laravel will use the featured route first.

If I put `/movies/{id}` first, Laravel might think that `featured` is the ID. Since I don't have a movie with that ID, it would give me a 404 error instead of showing the featured page.

### Q2. What happens when someone visits an id that does not exist in your data, and what did you write to make that happen?

If someone goes to an ID that is not in my data, like `/movies/99`, my `show()` method checks if the ID exists first.

I used `if (!isset($items[$id])) { abort(404); }`. If the ID is not found, Laravel stops the request and shows the 404 page. This also prevents the program from trying to get data that does not exist.

### Q3. Why do your links use route names instead of typed URLs? Give one concrete thing that would break if they did not.

I used route names like `route('movies.show', $item['id'])` instead of directly typing the URL. I think this is better because I can change the URL later without changing every link.

For example, if I change `/movies` to `/films`, the links using `route()` can follow the new route. But if I used the hard-coded URLs, I would have to change the links manually in my Blade files.
# itrackb4-la3-Rima-Keyan-Jaoric
# itrackb4-la4-Rima-Keyan-Jaoric

## Lab Activity 6 — Two Filters, One Route

### Q1. You added a second filter without adding a single route. Explain why no new route was needed. Your answer should say something about what the router actually looks at.

The router only looks at the path, not the query string. My route is just `/movies`, so `?genre=Action`, `?year=2010`, or both are still the same route to Laravel. I read the values with `$request->query()` inside the controller, so one route handles all four URLs.

### Q2. Suppose you had built both filters as route parameters instead. Describe what the URL for 'year 4 only, no course filter' would have to look like, and why.

It would have to look something like `/movies/_/2010`. Route parameters are positional, so I'd still need to fill the genre slot with a placeholder even when I don't want to filter by genre. Query strings let me just leave a key out completely, which is why they fit this better.

### Q3. Your navigation link stays marked on a detail page and also when a filter is applied. Only one of those two needed a change to your pattern. Say which one, and why the other needed nothing.

The detail page needed a change — I changed the check to a wildcard, `request()->is('movies*')`, so it also matches `/movies/5`. The filter needed nothing, because `?genre=Action` is a query string, not a path, and `request()->is()` only checks the path.

### Q4. You deleted your old filter method but kept the empty store and update methods, even though none of the three can be reached by a URL. Explain the difference between them.

`store()` and `update()` are empty because I haven't built them yet — they're for later weeks. My old `filter()` method was different: it was finished, and I replaced it with a better way of filtering. So I kept the unfinished ones and deleted the one that was already replaced.
