# Laugh Mail

Proof-of-concept for a custom (non-framework) PHP application. Premise is the application is for a new business to send daily jokes printed on premium dye-free cardstock via snail mail to subscribers. 

The default ("/") route shows a basic browser view (HTML-only) describing the service, with an example of one random joke.

The API route ("/api/jokes") returns a JSON list of jokes drawn from [wocka.com](http://http://wocka.com/) via scraped datasets I found in the [taivop/joke-dataset](https://github.com/taivop/joke-dataset) repository on GitHub. Optionally, send a "count" query param to retrieve a limited set of jokes (e.g., "/api/jokes?count=5"). The total count of jokes available at present is 75, so queries for a count > 75 will only return the complete (75 joke) dataset.

#### Note on Jokes

Though I took some time to groom the jokes dataset, many remain that are inappropriate or, at a minimum, insensitive. Please realize that inclusion of these jokes does not constitute endorsement!

## License

Laugh Mail is open-sourced software copyright by [Robert Pratt](mailto:bpong@v8ch.com) and licensed under the [MIT license](https://opensource.org/licenses/MIT).
