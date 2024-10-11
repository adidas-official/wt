$(document).ready(function() {
// from locally stored javascript object
    $ (function() {

        const names = [
            "Alice",
            "Benjamin",
            "Catherine",
            "Daniel",
            "Edward",
            "Fiona",
            "George",
            "Hannah",
            "Isabelle",
            "Jack",
            "Katherine",
            "Liam",
            "Michael",
            "Natalie",
            "Oliver",
            "Peter",
            "Quinn",
            "Rachel",
            "Samuel",
            "Victoria"
        ];

        $('#names').autocomplete({
            source: names,
            autoFocus: true
        });

    });

    $('#names_db').autocomplete({
        source: "search.php",
    });



});
